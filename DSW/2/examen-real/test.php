<?php
class A {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }

    public function __toString() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

$a = new A("a");
$b = clone($a);

$b->setName("b");

printf("%s - %s\n", $a, $b);