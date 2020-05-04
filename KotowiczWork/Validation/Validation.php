<?php
/**
 * Author: Kotowicz 17018747
 */
require_once 'Core/init.php';

class Validation
{
    private bool $_passed = false;
    private array $_errors = array();
    private Database $_database;

    public function __construct()
    {
        $this->_database = Database::getInstance();
    }

    public function check($source, $items = array())
    {
        foreach($items as $item => $rules)
        {
            foreach($rules as $rule => $rule_value)
            {
                $value = trim($source[$item]);
                $item = escape($item);

                if($rule === 'required' && empty($value))
                {
                    $this->addError("{$item} is required");
                }
                else
                {
                    $this->validate($rule, $value, $rule_value, $item, $source);
                }
            }
        }

        if(empty($this->_errors))
        {
            $this->_passed=true;
        }

        return $this;
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    public function succeeded()
    {
        return $this->_passed;
    }

    private function validate($rule, $value, $rule_value, $item, $source)
    {
        switch($rule)
        {
            case 'min':
                if(strlen($value) < $rule_value)
                {
                    $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                }
                break;
            case 'max':
                if(strlen($value) > $rule_value)
                {
                    $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                }
                break;
            case 'matches':
                if($value != $source[$rule_value])
                {
                    $this->addError("{$rule_value} must match {$item}");
                }
                break;
            case 'unique':
                $check = $this->_database->get($rule_value, array($item, '=', $value));
                if($check->count())
                {
                    $this->addError("{$item} already exists.");
                }
                break;
        }
    }
}