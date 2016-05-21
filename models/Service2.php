<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_2}}".
 *
 * @property integer $id
 * @property string $photo
 * @property string $dob
 * @property string $gender
 * @property string $mar_status
 * @property string $address
 * @property string $pin_code
 * @property string $city
 * @property string $hobbies
 * @property string $inter_zone
 * @property string $id_docu
 * @property string $id_upload
 * @property string $lang_1
 * @property string $lang_2
 * @property string $lang_3
 * @property string $category
 * @property string $phy_chal
 * @property string $phy_chal_des
 */
class Service2 extends \yii\db\ActiveRecord
{
	public $photo_image;
	public $id_image;
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_2}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'mar_status', 'category', 'phy_chal','city'], 'string'],
            [['photo', 'hobbies', 'inter_zone', 'id_docu', 'id_upload', 'lang_1', 'lang_2', 'lang_3', 'phy_chal_des'], 'string', 'max' => 255],
            [['dob','city','address','pin_code'],'required'],
			[['address'], 'string', 'max' => 300],
			['mar_status','in','range'=>['Single/Unmarried','Married','Widowed','Divorced','Seprated','Other'],'message'=>'Kindly select a Option'],
			['gender','in','range'=>['Male','Female'],'message'=>'Kindly select a Option'],
			['category','in','range'=>['General','OBC-Creamy','OBC-Non Creamy','ST','SC'],'message'=>'Kindly select a Option'],
			['phy_chal','required','message'=>'Kindly select a Option'],
			//[['mar_status','gender'],'message'=>'Kindly select a Option'],
			[['photo_image','id_image'],'file','extensions'=>'jpg,png','maxSize'=>1024*1024*1],
			[['pin_code'],'integer','message'=>'Enter a valid pin code'],
			[['prof_1','prof_2','prof_3'],'in','range'=>['','Beginner','Proficient','Expert']],
			//[['rws_1','rws_2','rws_3'],'in','range'=>['Read','Write','Speak']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'photo_image' => 'Add/Edit Photo',
            'dob' => 'Date Of Birth',
            'gender' => 'Gender',
            'mar_status' => 'Marital Status',
            'address' => 'Mailing Address',
			'city' =>'City',
			'pin_code'=>'Pin Code',
            'hobbies' => 'Hobbies',
            'inter_zone' => 'Interest Zone',
            'id_docu' => 'Identification Document(Aadhar/PAN/Voter ID/License/Other)',
            //'id_upload' => 'Id Upload',
			'id_image'=>'Scan Copy Of Id',
            'lang_1' => 'Language',
            'lang_2' => 'Language',
			'lang_3' => 'Language',
			'prof_1' => 'Proficiency',
			'prof_2' => 'Proficiency',
			'prof_3' => 'Proficiency',
            'category' => 'Category',
            'phy_chal' => 'Physically Challenged',
			'phy_chal_des' => 'Disability Description',
        ];
    }
}
