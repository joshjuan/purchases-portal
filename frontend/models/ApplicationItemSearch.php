<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ApplicationItem;

/**
 * ApplicationItemSearch represents the model behind the search form of `frontend\models\ApplicationItem`.
 */
class ApplicationItemSearch extends ApplicationItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'qty', 'app_id', 'app_status'], 'integer'],
            [['price', 'total', 'tax_amount', 'discount_amount'], 'number'],
            [['maker_id', 'maker_time', 'discount_maker', 'product_changer', 'changed_date'], 'safe'],
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
        $query = ApplicationItem::find();

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
            'product_id' => $this->product_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'total' => $this->total,
            'tax_amount' => $this->tax_amount,
            'app_id' => $this->app_id,
            'app_status' => $this->app_status,
            'maker_time' => $this->maker_time,
            'discount_amount' => $this->discount_amount,
            'changed_date' => $this->changed_date,
        ]);

        $query->andFilterWhere(['like', 'maker_id', $this->maker_id])
            ->andFilterWhere(['like', 'discount_maker', $this->discount_maker])
            ->andFilterWhere(['like', 'product_changer', $this->product_changer]);

        return $dataProvider;
    }
}
