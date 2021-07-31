<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class SubjectGrades extends Model {

    public $o_level;
    public $subject;
    public $grade;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->o_level = self::intField();
        $field->subject = self::stringField(32);
        $field->grade = self::stringField(6);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}