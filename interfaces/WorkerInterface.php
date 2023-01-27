<?php

namespace app\interfaces;

interface WorkerInterface
{
  public function execute($message): void;
}