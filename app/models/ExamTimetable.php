<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class ExamTimetable extends Model {

    public $departments;
    public $departmental_courses;
    public $venue;
    public $date;
    public $start_time;
    public $end_time;
    public $semester;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->departments = self::intField();
        $field->departmental_courses = self::intField();
        $field->venue = self::stringField();
        $field->date = self::dateField();
        $field->start_time = self::timeField();
        $field->end_time = self::timeField();
        $field->semester = self::intField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}