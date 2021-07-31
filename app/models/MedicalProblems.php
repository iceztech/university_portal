<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class MedicalProblems extends Model {

    public $problem;
    public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->problem = self::stringField(32);
        $field->description = self::stringField(255);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}