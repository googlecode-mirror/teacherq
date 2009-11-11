<?php

class Dayi_Validate_StringLengthCN extends Zend_Validate_StringLength
{
	/**
     * @var array
     */
    protected $_messageTemplates = array(
        self::INVALID   => "Invalid type given, value should be a string",
        self::TOO_SHORT => "'%value%' 少于 %min% 个字符的长度",
        self::TOO_LONG  => "'%value%' is greater than %max% characters long"
    );
}

?>