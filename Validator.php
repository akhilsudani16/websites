<?php

class Validator
{

    public static function string($value , $min = 1 , $max = INF){
        $value = trim($value);
        return $value <= $max && $value >= $min;
    }
}