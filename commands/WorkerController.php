<?php
namespace app\commands;

use app\components\BaseRabbit;
use yii\console\Controller;

class WorkerController extends Controller
{
  /**
   * @param $exchange
   * @return string
   * @throws \Exception
   */
  public function actionIndex($queue): string
  {
    $baseRabbit = new BaseRabbit($queue);
    $baseRabbit->start();
  }
}

