<?php


namespace Lxmp;


class Request
{
    public function get(string $key) {
        return 'i am request';
        if($key === '*') {
            return $_GET;
        } else {
            return $_GET[$key];
        }
    }
}