<?php


namespace Lxmp;


class Autoload
{
    static function register(string $class)
    {
        $path = strtr($class, '\\', DIRECTORY_SEPARATOR);
        $filePath = __DIR__ . '/../'.$path.'.php';
        if (file_exists($filePath)) {
            require $filePath;
        } else {
            throw new \Exception("$class is not exists");
        }
    }
}
spl_autoload_register(['Lxmp\Autoload', 'register']);