<?php

class Dayi_Validate_StringLength extends Zend_Validate_StringLength
{
	/**
     * @var array
     */
    protected $_messageTemplates = array(
        self::INVALID   => "Invalid type given, value should be a string",
        self::TOO_SHORT => "'%value%' 少于 %min% 个字符的长度",
        self::TOO_LONG  => "'%value%' 大于 %max% 个字符的长度"
    );
    
    public function __construct($min=6, $max=20)
    {
    	$this->setMin($min);
    	$this->setMax($max);
    }
}

?>