<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Departments;

/**
 * DepartmentsFilter represents the model behind the search form of `app\models\tables\Departments`.
 */
class DepartmentsFilter extends Departments {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['name', 'rank'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $id = null) {
        $query = Departments::find();

        if ($id) {
            $dataProvider = new ActiveDataProvider([
                'query' => $query->where('task_id = '.$id),
                'pagination' => [
                    'pageSize' => '4',
                ]
            ]);
        }
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => '4',
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        return $dataProvider;
    }

}
