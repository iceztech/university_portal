<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Courses extends Model {

    public $title;
    public $code;
    public $semester;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->title = self::uniqueStringField(32);
        $field->code = self::uniqueStringField(7);
        $field->semester = self::intField();
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}