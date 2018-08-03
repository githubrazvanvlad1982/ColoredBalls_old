<?php

namespace test;

use PHPUnit\Framework\TestCase;

class TestNothingTest extends TestCase
{

    public function testNothing()
    {
        $this->assertEmpty('');
    }

}