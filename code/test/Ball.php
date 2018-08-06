<?php
/**
 * Created by PhpStorm.
 * User: razvan
 * Date: 05.08.2018
 * Time: 04:15
 */

namespace test;


class Ball
{
    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}