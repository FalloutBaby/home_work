<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property int $id
 * @property int $month
 * @property decimal $goal
 * @property decimal $required
 * @property decimal $actual
 * @property int $stand_id
 * @property int $dept_id
 *
 * @property Departments $dept
 * @property Standards $stand
 */
class Results extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stand_id', 'dept_id'], 'integer'],
            [['goal', 'required', 'actual'], 'decimal'],
            [['dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['dept_id' => 'id']],
            [['stand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Standards::className(), 'targetAttribute' => ['stand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'month' => 'Месяц',
            'goal' => 'целевое значение',
            'required' => 'обязат. знач.',
            'actual' => 'факт',
            'stand_id' => 'Stand ID',
            'dept_id' => 'Dept ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Departments::className(), ['id' => 'dept_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStand()
    {
        return $this->hasOne(Standards::className(), ['id' => 'stand_id']);
    }
    
    public function getAvg($deptId, $standId)
    {
        $query = $this->find()->where('dept_id = :dept_id')->andWhere('stand_id = :stand_id')->addParams([':dept_id' => $deptId, ':stand_id' => $standId])->asArray()->select('actual')->all();
        foreach ($query as $value) {
            is_null($value['actual']) ?  true : $actual[] = $value['actual'];
        }
        if(is_null($actual)) {
            return '-';
        }
        $average = array_sum($actual)/count($actual);
        return $average;
    }
    
    public function getColor($actual, $required)
    {
        if(!$actual) {
            return 'white';
        }
        if($actual >= $required) {
            $color = $actual > $required ? 'info table-info' : 'success table-success';
        } elseif (is_null ($actual)) {
            $color = 'white';
        } else {
            $color = $actual >= $required*0.9 ? 'warning table-warning' : 'danger table-danger';
        }
        
        return $color;
    }
    
    public function getCurrentMonth($deptId, $standId, $current)
    {
        $query = $this->find()->where('dept_id = :dept_id')->andWhere('stand_id = :stand_id')->addParams([':dept_id' => $deptId, ':stand_id' => $standId])->asArray()->select('actual, goal, required')->all();
        foreach ($query as $value) {
            is_null($value['actual']) ? $actual : $actual = $value[$current];
        }
        if(is_null($actual)) {
            return '-';
        }
        return $actual;
    }
    
    public function getMonthName($month)
    {
        $months = [
            '1' => 'Январь',
            '2' => 'Февраль',
            '3' => 'Март',
            '4' => 'Апрель',
            '5' => 'Май',
            '6' => 'Июнь',
            '7' => 'Июль',
            '8' => 'Август',
            '9' => 'Сентябрь',
            '10' => 'Октябрь',
            '11' => 'Ноябрь',
            '12' => 'Декабрь'
        ];
        
        return $months[$month];
    }
    
    public function getReached($deptId, $standId)
    {
        $required = $this->getCurrentMonth($deptId, $standId, 'required');
        $goal = $this->getCurrentMonth($deptId, $standId, 'goal');
        if($required == '-' || $goal == '-') {
            return '-';
        }
       return round($required/$goal, 2);
    }
}
