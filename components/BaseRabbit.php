<?php

namespace app\components;

use app\commands\messages\Send;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class BaseRabbit
{
  private string $exchange;
  private string $queue;

  public function __construct($queue)
  {
    $this->exchange = \Yii::$app->id;
    $this->queue    = $queue;
  }

  /**
   * @throws \Exception
   */
  public function start(): void
  {
    $queueName = $this->exchange . "." . $this->queue;

    $connection = new AMQPStreamConnection('192.168.1.2', 5672, 'root', 'root');
    $channel    = $connection->channel();
    $channel->exchange_declare($this->exchange, 'topic', false, true, false);
    $channel->queue_declare($queueName, false, true, false, false);
    $channel->queue_bind($queueName, $this->exchange, $this->queue . ".#");

    $callback = function ($msg) {
      $routingKey = str_replace('.', '\\', $msg->delivery_info['routing_key']);
      $this->routeMessage($routingKey, $msg->body);
    };

    $channel->basic_consume($queueName, '', false, true, false, false, $callback);

    while (count($channel->callbacks)) {
      $channel->wait();
    }
  }

  private function routeMessage($routingKey, $message)
  {
    $className = preg_replace_callback(
      '/\\\\([a-z]+)$/',
      function ($matches) {
        return '\\' . ucfirst($matches[1]);
      },
      "\\app\\commands\\" . $routingKey
    );

    if (class_exists($className)) {
      /** @var $class Send */
      $class = new $className();
      $class->execute($message);
    }
  }
}