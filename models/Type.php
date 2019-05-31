<?php
namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Type extends ActiveRecord
{
    public $id;
    public $pid;
    public $newtype;
    public $name;

    public function attributeLabels()
    {
        return [
            'name' => 'Your name',
            'email' => 'Your email address',
            'subject' => 'Subject',
            'body' => 'Content',
        ];
    }
}