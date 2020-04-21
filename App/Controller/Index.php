<?php
namespace App\Controller;
use Lxmp\Request;
class Index {

    protected $name;
    protected $age;
//    public function __construct($name, $age)
//    {
//        $this->name = $name;
//        $this->age = $age;
//    }

    public function index(Request $request, $name) {

        echo $request->get('1');
    }

    public function hello() {
        echo 'My First PHP Frame';
    }
}
