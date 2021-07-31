<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Departments extends Model {

    public $faculty;
    public $name;
    public $code;
    public $serial;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->faculty = self::intField();
        $field->name = self::uniqueStringField(32);
        $field->code = self::stringField(5);
        $field->serial = self::stringField(32);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}