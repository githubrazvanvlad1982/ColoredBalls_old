<?php
/**
 * Created by PhpStorm.
 * User: razvan
 * Date: 05.08.2018
 * Time: 04:17
 */

namespace test;


class Group
{
    /** @var Ball[] */
    private  $balls = [];

    public function  countBalls(): int
    {
        return count($this->balls);
    }

    public function getBalls(): array
    {
        return [ new Ball('color') ];
    }

    public function addBall(Ball $ball)
    {
        $this->balls[] = $ball;
    }

    public function countColors()
    {
        $colors = [];
        foreach ($this->balls as $ball) {
            if (!in_array($ball->getColor(), $colors)) {
                $colors[] = $ball->getColor();
            }
        }

        return count($colors);
    }

    public function hasBallsOfColor(string $color): bool {

        foreach ($this->balls as $ball) {
            if ($ball->getColor() == $color) {
                return true;
            }

            return false;
        }
    }
}
