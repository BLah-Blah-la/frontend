<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "clinet_phone".
 *
 * @property int $id
 * @property int $client_id
 * @property string $phone_digital
 *
 * @property ClientClient $client
 */
class Phones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Phones';
    }

    /**
     * @inheritdoc
     */
/*     public function rules()
    {
        return [
            [['id', 'client_id', 'phone_digital'], 'required'],
            [['id', 'client_id'], 'integer'],
            [['phone_digital'], 'string', 'max' => 10],
            [['id'], 'unique'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    } */

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'phone_digital' => 'Phone Digital',
        ];
    }
}
?>