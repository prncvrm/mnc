<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property integer $id
 * @property string $email_id
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $name
 * @property string $photo
 * @property string $location
 * @property integer $contact
 * @property integer $dob
 * @property string $gender
 * @property string $marital_status
 * @property string $complete_address
 * @property string $hobbies
 * @property string $interest_zone
 * @property string $identification
 * @property string $identification_image
 * @property string $category
 * @property string $physically_challenged
 * @property string $disability_description
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email_id', 'password_hash', 'name', 'location', 'contact', 'dob', 'gender', 'marital_status', 'complete_address', 'category'], 'required'],
            [['location', 'gender', 'marital_status', 'hobbies', 'interest_zone', 'category', 'physically_challenged'], 'string'],
            [['contact'], 'integer'],
			[['dob'],'integer'],
			[['email_id'],'email'],
            [['password_hash', 'password_reset_token', 'complete_address'], 'string', 'max' => 255],
            [['name', 'identification'], 'string', 'max' => 80],
            [['photo', 'identification_image'], 'string', 'max' => 30],
            [['disability_description'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_id' => 'Email ID',
            'password_hash' => 'Password',
            //'password_reset_token' => 'Password Reset Token',
            'name' => 'Name',
            'photo' => 'Upload Photo',
            'location' => 'Location',
            'contact' => 'Contact',
            'dob' => 'Date Of Birth',
            'gender' => 'Gender',
            'marital_status' => 'Marital Status',
            'complete_address' => 'Complete Address',
            'hobbies' => 'Hobbies',
            'interest_zone' => 'Interest Zone',
            'identification' => 'Aadhar/PAN Number',
            'identification_image' => 'Upload Aadhar/PA',
            'category' => 'Category',
            'physically_challenged' => 'Physically Challenged',
            'disability_description' => 'Disability Description',
        ];
    }
}
