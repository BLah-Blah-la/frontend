<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "client_client".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $age
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
        ];
    }
}
