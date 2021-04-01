<?php
namespace Jaitik\String;
use Jaitik\String\Exceptions\ErrorCreatingString;
use Jaitik\String\Exceptions\UnknownFunction;
use Jaitik\String\Exceptions\UnsetOffset;

class Str {
    protected $string;

    public function __construct($string = '')
    {
        if (is_array($string)) {
            throw new ErrorCreatingString('Can\'t create string from an array');
        }

        if (is_object($string) && ! method_exists($string, '__toString')) {
            throw new ErrorCreatingString(
                'Can\'t create string from an object that doesn\'t implement __toString'
            );
        }

        $this->string = (string) $string;
    }

    public function upper()
    {
        return strtoupper($this->string);
    }

    public function lower()
    {
        return strtolower($this->string);
    }
}