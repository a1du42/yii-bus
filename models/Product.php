<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
  public static function tableName()
  {
    return 'product';
  }

  public function rules()
  {
    return [
      [['name', 'desc', 'type'], 'required'],
      [['create_at', 'last_at'], 'safe'],
    ];
  }
}