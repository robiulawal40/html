<?php
////////////////////////////////////////
// 1. spl_autoload_register(array($this, 'loader'))
///////////////////////////////////////


    class ClassAutoloader {
        public function __construct() {
            spl_autoload_register(array($this, 'loader'));
        }
        private function loader($className) {
            echo 'Trying to load ', $className, ' via ', __METHOD__, "()\n";
            include $className . '.php';
        }
    }

    $autoloader = new ClassAutoloader();

    $obj = new Class1();
    $obj = new Class2();

?>
Output:
--------
Trying to load Class1 via ClassAutoloader::loader()
Class1::__construct()
Trying to load Class2 via ClassAutoloader::loader()
Class2::__construct()
