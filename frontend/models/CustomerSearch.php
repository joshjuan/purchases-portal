<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `frontend\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tin_number', 'customer_type', 'in_contract', 'branch_id', 'status'], 'integer'],
            [['name', 'phone_number', 'phone_number2', 'vrn', 'street', 'plot_no', 'house_no', 'applicant_title', 'business_type', 'representative_name', 'address', 'tax_regional', 'email', 'maker_id', 'maker_time'], 'safe'],
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
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tin_number' => $this->tin_number,
            'customer_type' => $this->customer_type,
            'in_contract' => $this->in_contract,
            'branch_id' => $this->branch_id,
            'maker_time' => $this->maker_time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'phone_number2', $this->phone_number2])
            ->andFilterWhere(['like', 'vrn', $this->vrn])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'plot_no', $this->plot_no])
            ->andFilterWhere(['like', 'house_no', $this->house_no])
            ->andFilterWhere(['like', 'applicant_title', $this->applicant_title])
            ->andFilterWhere(['like', 'business_type', $this->business_type])
            ->andFilterWhere(['like', 'representative_name', $this->representative_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'tax_regional', $this->tax_regional])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'maker_id', $this->maker_id]);

        return $dataProvider;
    }
}
