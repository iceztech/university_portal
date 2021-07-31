<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class OLevel extends Model {

    public $student;
    public $name;
    public $exam_number;
    public $institution;
    public $exam_year;
    public $certificate;
    public $sitting;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->student = self::intField();
        $field->name = self::nameField();
        $field->exam_number = self::stringField(16);
        $field->institution = self::stringField();
        $field->exam_year = self::yearField();
        $field->certificate = self::stringField(16);
        $field->sitting = self::booleanField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}