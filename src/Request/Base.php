<?php

namespace PierreBelin\EDICourtage\Request;

use UnexpectedValueException;

abstract class Base 
{
    public function __call($method, $parameters)
    {
        if (preg_match('/^set(.+)$/', $method)) {
            $name = lcfirst(substr($method, 3));
            $this->{$name} = $parameters[0];
            return $this;
        }
    }

    public function __set($name, $value)
    {
        if (!isset($this->{$name})) {
            throw new UnexpectedValueException("Undefined property: $name");
        }

        $this->{$name} = $value;
    }
}