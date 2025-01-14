<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Position;
use PHPUnit\Framework\Constraint\IsNull;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

/**
 * PositionSearch represents the model behind the search form of `app\models\Position`.
 */
class PositionSearch extends Position
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['status'], 'boolean'],
            [['name', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Position::find();
        // add conditions that should always apply here

        // dd();
        
        // dd($params['PositionSearch']['status']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // if (!empty($this->status)) {
        //     $this->status = ($this->status == 'aktif') ? 1 : (($this->status == 'tidak aktif') ? 0 : null);
        // }
        // $this->setAttribute()
        // $this->
        // dd($this->status);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status == 'aktif' ? 1 : (($this->status == 'tidak aktif') ? 0 : $this->status),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
