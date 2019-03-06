<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Results;

/**
 * ResultsFilter represents the model behind the search form of `app\models\tables\Results`.
 */
class ResultsFilter extends Results {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'stand_id', 'dept_id'], 'integer'],
            [['month', 'goal', 'required', 'actual'], 'safe'],
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
    public function search($params, $month = null) {
        $query = Results::find();

//        if ($month) {
//            $dataProvider = new ActiveDataProvider([
//                'query' => $query->where('month = '.$month),
//                'pagination' => [
//                    'pageSize' => '4',
//                ]
//            ]);
//        }
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => '24',
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
