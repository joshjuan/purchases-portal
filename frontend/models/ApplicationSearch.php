<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Application;

/**
 * ApplicationSearch represents the model behind the search form of `frontend\models\Application`.
 */
class ApplicationSearch extends Application
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'branch_id', 'agent_id', 'status', 'invoice_status', 'realocation', 'send_tra', 'processed_by'], 'integer'],
            [['app_ref_number', 'app_dt', 'technician_approval', 'accountant_approval', 'invoice', 'receipt_number', 'attachments_comments', 'invoice_maker', 'invoice_maker_time', 'user_identification_no', 'maker_id', 'maker_time', 'maker_id1', 'maker_time1', 'auth_status', 'check_id', 'checker_time', 'assigned_to', 'payment_confirm', 'confirm_date', 'tra_comment', 'fiscal_code'], 'safe'],
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
        if (!Yii::$app->user->isGuest) {
            $query = Application::find();
            $query->where(['customer_id'=>Yii::$app->user->identity->getId()]);

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
                'app_dt' => $this->app_dt,
                'customer_id' => $this->customer_id,
                'branch_id' => $this->branch_id,
                'agent_id' => $this->agent_id,
                'status' => $this->status,
                'invoice_status' => $this->invoice_status,
                'invoice_maker_time' => $this->invoice_maker_time,
                'maker_time' => $this->maker_time,
                'maker_time1' => $this->maker_time1,
                'checker_time' => $this->checker_time,
                'confirm_date' => $this->confirm_date,
                'realocation' => $this->realocation,
                'send_tra' => $this->send_tra,
                'processed_by' => $this->processed_by,
            ]);

            $query->andFilterWhere(['like', 'app_ref_number', $this->app_ref_number])
                ->andFilterWhere(['like', 'technician_approval', $this->technician_approval])
                ->andFilterWhere(['like', 'accountant_approval', $this->accountant_approval])
                ->andFilterWhere(['like', 'invoice', $this->invoice])
                ->andFilterWhere(['like', 'receipt_number', $this->receipt_number])
                ->andFilterWhere(['like', 'attachments_comments', $this->attachments_comments])
                ->andFilterWhere(['like', 'invoice_maker', $this->invoice_maker])
                ->andFilterWhere(['like', 'user_identification_no', $this->user_identification_no])
                ->andFilterWhere(['like', 'maker_id', $this->maker_id])
                ->andFilterWhere(['like', 'maker_id1', $this->maker_id1])
                ->andFilterWhere(['like', 'auth_status', $this->auth_status])
                ->andFilterWhere(['like', 'check_id', $this->check_id])
                ->andFilterWhere(['like', 'assigned_to', $this->assigned_to])
                ->andFilterWhere(['like', 'payment_confirm', $this->payment_confirm])
                ->andFilterWhere(['like', 'tra_comment', $this->tra_comment])
                ->andFilterWhere(['like', 'fiscal_code', $this->fiscal_code]);

            return $dataProvider;
        }

    }
}
