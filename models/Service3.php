<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%service_3}}".
 *
 * @property integer $id
 * @property string $course_name
 * @property string $course_type
 * @property string $specialization
 * @property integer $year
 * @property string $mas_name
 * @property string $mas_type
 * @property integer $mas_year
 * @property string $industry
 * @property string $fun_area
 * @property string $comp_name
 * @property string $designation
  * @property string $period
 * @property string $job_profile
 * @property string $des_job_loc
 * @property string $job_type
 * @property string $emp_status
 * @property string $work_usa
 * @property string $other_coun
 */
class Service3 extends \yii\db\ActiveRecord
{
	//public $lakh, $thousand,$month1,$month2,$year1,$year2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%service_3}}';
    }

    /**
     * @inheritdoc
     */
	 
		public static function getWeekdaysList()
{
    return [
        'monday' => 'Monday',
        'tuesday' => 'Tuesday',
        'wednesday' => 'Wednesday',
        'thursday' => 'Thursday',
        'friday' => 'Friday',
        'saturday' => 'Saturday',
        'sunday' => 'Sunday',
    ];
}
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'year', 'mas_year'], 'integer'],
            [['comp_name', 'designation',  'emp_status'], 'string'],
            [['course_name', 'course_type', 'specialization', 'mas_name', 'mas_type', 'industry', 'fun_area', 'period', 'job_profile', 'job_type', 'work_usa', 'other_coun'], 'string', 'max' => 255],
            [['id'], 'unique'],
			['course_type','required','message'=>'Select a Location'],
			[['course_name','period','lakh','thousand','month1','month2','job_type','des_job_loc','work_usa','year1','year2','univ_inst','specialization','year'],'required','message'=>'Select a Option']
			
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'course_name' => 'Course Name',
            'course_type' => 'Type',
            'specialization' => 'Specialization',
			'univ_inst'=>'University/ Institute',
            'year' => 'Graduated In',
            'mas_name' => 'Name of Master Degree',
            'mas_type' => 'Type',
            'mas_year' => 'Post Graduated In',
            'industry' => 'Current Industry',
            'fun_area' => 'Functional Area',
            'comp_name' => 'Company Name',
            'designation' => 'Designation',
            'job_profile' => 'Job Profile',
            'des_job_loc' => 'Preferred Work Location',
            'job_type' => 'Job Type',
            'emp_status' => 'Employment Status',
            'work_usa' => 'Work Status for USA',                           
            'other_coun' => 'Other Countries',
        ];
    }
}
