<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $full_name
 * @property string $username
 * @property string|null $email
 * @property string|null $user_signature
 * @property int|null $branch_id
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $PIN
 * @property int|null $emp_id
 * @property int|null $agent_id
 * @property string|null $role
 * @property int $user_type
 * @property int $customer_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class User extends \common\models\User
{
    public  $password;
    public  $repassword;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
         //   [['full_name', 'username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['password','repassword'], 'required'],
            ['repassword', 'compare', 'compareAttribute' => 'password'],
            [['user_signature'], 'string'],
            [['branch_id', 'emp_id', 'agent_id', 'user_type', 'status', 'created_at', 'updated_at','customer_id'], 'integer'],
            [['full_name', 'role'], 'string', 'max' => 200],
            [['username', 'email', 'password_hash', 'password_reset_token', 'PIN'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['password'], 'string', 'min' => 6, 'max' => 30],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'username' => 'Username',
            'email' => 'Email',
            'user_signature' => 'User Signature',
            'branch_id' => 'Branch ID',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'PIN' => 'Pin',
            'emp_id' => 'Emp ID',
            'agent_id' => 'Agent ID',
            'role' => 'Role',
            'user_type' => 'User Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
