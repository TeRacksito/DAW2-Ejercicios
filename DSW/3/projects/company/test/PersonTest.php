<?php

use PHPUnit\Framework\TestCase;
use Teracksito\Company\Person;

class PersonTest extends TestCase {

    // verificar que funciona 
    public function testPersonConstructor() {
        $person1 = new Person("Pepe", 34);
        $this->assertSame("Pepe", $person1->getName());
        $this->assertSame(34, $person1->getAge());
    }
    

    public function testGreat() {
        $person1 = new Person("Pepe", 34);
        $this->assertSame("Hello, my name is Pepe", $person1->greet());
    }
}