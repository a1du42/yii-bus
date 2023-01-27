<?php

namespace app\commands\messages;

use app\interfaces\WorkerInterface;

class Send implements WorkerInterface
{
  public function execute($message): void
  {
    echo "Routed to Send: " . $message . "\n";
  }
}