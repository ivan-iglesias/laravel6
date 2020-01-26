<?php

namespace App;

class Example
{
    protected $name;

    public function __construct(string $name = "World") {
        $this->name = $name;
    }

    public function go()
    {
        dump("Hello {$this->name}!");
    }
}
