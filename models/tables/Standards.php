<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "standards".
 *
 * @property int $id
 * @property string $name
 * @property string $measure_unit
 *
 * @property Results[] $results
 */
class Standards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'standards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'measure_unit'], 'required'],
            [['name'], 'string'],
            [['measure_unit'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование показателя',
            'measure_unit' => 'Ед. изм.',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Results::className(), ['stand_id' => 'id']);
    }
}
