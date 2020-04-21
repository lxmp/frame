<?php
namespace Lxmp;
/*
 * 调度器
 **/
class Dispatcher
{

    /*
     * 控制器名
     * */
    protected $controller;
    /*
     * 操作名
     * */
    protected $action;

    /*
     * 传入变量
     * */
    protected $vars;


    public function __construct(string $controller, string $action, array $vars = [])
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->vars = $vars;
    }

    /*
    * 调度实现
    * */
    public function exec()
    {
        $container = new Container;
        $controllerIns = $container->make($this->controller);
        $methodReflect = new \ReflectionMethod($controllerIns, $this->action);
        $parameters = $methodReflect->getParameters();
        $args = [];
        foreach ($parameters as $parameter)
        {
            $class = $parameter->getClass();

            if ($class) {
                $classIns = $container->make($class->getName());
                $args[] = $classIns;
            } else {
                $name = $parameter->getName();
                $args[] = $this->vars[$name] ?? null;
            }
        }

        $methodReflect->invokeArgs($controllerIns, $args);
    }
}