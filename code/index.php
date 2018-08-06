<?php

use test\Ball;
require_once("vendor/autoload.php");

$bals = [
    new Ball('white'),
    new Ball('white'),
    new Ball('white'),
    new Ball('white'),
    new Ball('black'),
    new Ball('black'),
    new Ball('black'),
    new Ball('green'),
    new Ball('green'),
];

/** @var \test\GroupColoredBalls $groupColoredBalls */
$groupColoredBalls = new \test\GroupColoredBalls();
echo "<pre>";
print_r($groupColoredBalls->group($bals));

