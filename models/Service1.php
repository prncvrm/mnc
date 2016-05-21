<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_1}}".
 *
 * @property integer $id
 * @property string $email_id
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $name
 * @property string $location
 * @property integer $contact
 * @property integer $exp_year
 * @property string $key_skill
 * @property string $education
 * @property string $resume
 */
class Service1 extends \yii\db\ActiveRecord
{
   public $resume_file;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_1}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email_id', 'password_hash', 'name',  'contact', 'exp_year', 'key_skill', 'resume'], 'required','message'=>'Field cannot be blank'],
            [['name', 'location'], 'string'],
			[['email_id'],'email'],
            [['resume_file'],'file','extensions'=>'png,jpg,jpeg,pdf,doc,docx,txt','maxSize' => 1024 * 1024 * 2],
			['location','required','message'=>'Select a Location'],
			['education','in','range'=> ['Not Persuing Graduation','B.A.','B.Arch','BCA','B.B.A.','B.Com','B.Ed','BDS','BHM','B.Pharma','B.Sc','B.Tech/B.E.','LLB','MBBS','Diploma','BVSC','Others'],'message'=>'Kindly Select a Option'],
            [['contact', 'exp_year'], 'integer'],
            [['email_id', 'password_hash', 'password_reset_token', 'key_skill', 'resume'], 'string', 'max' => 255],
            [['education'], 'string', 'max' => 80],
			['resume_file','required','message'=>'Kindly upload your Resume/CV'],
			
        ];
    }
	
	
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'email_id' => 'Enter your Email Id',
            'password_hash' => 'Create a Password for your account',
            //'password_reset_token' => 'Password Reset Token',
            'name' => 'Please mention your Full Name',
            'location' => 'Where are you Currently Located',
            'contact' => 'Enter your Mobile Number',
            'exp_year' => 'How much work experience do you have',
            'key_skill' => 'What are your Key Skills',
            'education' => 'Please select your Basic Education',
            //'resume' => 'Resume',
			'resume_file' => 'Upload your Resume Document',
        ];
    }
}
