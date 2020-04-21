<?php


namespace Lxmp;


class Container
{

    function make(string $class, array $vars = []) {
        $reflection = new \ReflectionClass($class);
        return $reflection->newInstanceArgs($vars);
    }
}