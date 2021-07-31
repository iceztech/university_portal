<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class RegisteredCourses extends Model {

    public $student;
    public $semester;
    public $departmental_course;
    public $continuous_assessment_score;
    public $exam_score;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->student = self::intField();
        $field->semester = self::intField();
        $field->departmental_course = self::intField();
        $field->continuous_assessment_score = self::floatField();
        $field->exam_score = self::floatField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}