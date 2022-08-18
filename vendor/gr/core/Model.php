<?php

namespace gr\core;


use gr\lib\Db;
use RedBeanPHP\R;
use Valitron\Validator;
//require 'vendor/gr/lib/dev.php';

abstract class Model
{
    public $db;
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        $this->db = new Db;
    }

    public function load($data)
    {
        foreach ($this->attributes as $name => $value){
            if (isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function validate($data, $escape=[]): bool
    {
        $r = $this->rules;
//        debug($r);
        if (!empty($escape)) {
            foreach ($escape as $field){
                foreach ($r as $key => $value){
                    for($i=0; $i<count($value); $i++){
//                        debug($r[$key]);
                        if ($r[$key][$i][0] == $field){
//                            debug($field);
                            if ($key == 'lengthMin') unset($r[$key][$i]);
                            else unset($r[$key][$i][0]);
                        }
                        if (empty($r[$key][$i])) unset($r[$key][$i]);
                    }
                    if (empty($r[$key])) unset($r[$key]);
                }
            }
        }
//        debug($r);

        $v = new Validator($data);
        $v->rules($r);

        if ($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function getErrors()
    {
        $errors = '<ul>';
         foreach ($this->errors as $error){
             foreach ($error as $item){
                 $errors .= "<li>$item</li>";
             }
         }
         $errors .= '</ul>';
         $_SESSION['error'] = $errors;
    }

    public function save($table)
    {
//        debug(R::testConnection());
        $tbl = R::dispense($table);
        foreach ($this->attributes as $name => $value){
            $tbl->$name = $value;
        }
        return R::store($tbl);
    }

    public function update($table, $id, $escapeEl=[])
    {
//        debug(R::testConnection());
//        $tbl = R::dispense($table);
//        debug($escapeEl);
        $object = R::load($table, $id);
        array_push($escapeEl, "id");
//        debug($escapeEl);
        $attr = $this->attributes;
        foreach ($escapeEl as $k => $v) unset($attr[$v]);

        foreach ($attr as $name => $value){
            $object->$name = $value;
        }

        return R::store($object);
    }

}