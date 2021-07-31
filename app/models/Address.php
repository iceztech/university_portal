<?php
namespace Zikzay\Model;

use stdClass as std;
use Zikzay\Core\Model;

class Address extends Model {

    public $address;
    public $town;
    public $state;
    public $country;
    public $type;

    public function __construct()
    {
        parent::__construct();
    }

    public static function define(std $field) : std
    {
        $field->id = self::primaryKey();
        $field->address = self::stringField(128);
        $field->town = self::stringField(48);
        $field->state = self::stringField(24);
        $field->country = self::stringField(24);
        $field->type = self::stringField(24);
        $field->created_at = self::timestampField();
        $field->updated_at = self::timestampField(true);
        
        return $field;
    }
    
    
}