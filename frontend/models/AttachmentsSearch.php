<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Attachments;

/**
 * AttachmentsSearch represents the model behind the search form of `frontend\models\Attachments`.
 */
class AttachmentsSearch extends Attachments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'branch_id'], 'integer'],
            [['business_licence', 'identification', 'tax_identification', 'uin', 'representative_id', 'app_letter', 'created_by', 'created_at'], 'safe'],
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
        $query = Attachments::find();
        $query->where(['customer_id'=>\Yii::$app->user->identity->getId()]);

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
            'customer_id' => $this->customer_id,
            'branch_id' => $this->branch_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'business_licence', $this->business_licence])
            ->andFilterWhere(['like', 'identification', $this->identification])
            ->andFilterWhere(['like', 'tax_identification', $this->tax_identification])
            ->andFilterWhere(['like', 'uin', $this->uin])
            ->andFilterWhere(['like', 'representative_id', $this->representative_id])
            ->andFilterWhere(['like', 'app_letter', $this->app_letter])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
