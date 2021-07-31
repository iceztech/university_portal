<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class ClassTimetable extends Model {

    public $department;
    public $departmental_course;
    public $venue;
    public $day;
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
        $field->department = self::intField();
        $field->departmental_course = self::intField();
        $field->venue = self::stringField();
        $field->day = self::intField();
        $field->start_time = self::timeField();
        $field->end_time = self::timeField();
        $field->semester = self::intField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}