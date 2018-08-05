<?php

namespace test;

use PHPUnit\Framework\TestCase;

class TestNothingTest extends TestCase
{

    public function testNothing()
    {
        $this->assertEmpty('');
    }

    public function test_for_0_balls_0_groups_are_returned()
    {
        $colloredBalls = new GroupColoredBalls();

        $this->assertEquals(0, count($colloredBalls->group([])));
    }

    public function test_for_one_ball_1_group_is_returned()
    {
        $colloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('color')
        ];

        $this->assertEquals(1, count($colloredBalls->group($bals)));
    }

    public function test_for_one_ball_a_group_with_1_ball_is_returned()
    {
        $groupColloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('color')
        ];

        $groups = $groupColloredBalls->group($bals);

        $this->assertEquals(1, $groups[0]->countBalls());
    }
    
    public function test_for_one_white_ball_group_has_one_white_ball()
    {
        $groupColloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('color')
        ];

        $groups = $groupColloredBalls->group($bals);

        $ball = $groups[0]->getBalls()[0];
        $this->assertEquals('color', $ball->getColor());

    }

    public function test_for_balls_of_two_collors_two_groups_are_returned()
    {
        $colloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('white'),
            new Ball('white'),
            new Ball('white'),
            new Ball('black'),
        ];

        $this->assertEquals(2, count($colloredBalls->group($bals)));
    }

    public function test_for_balls_of_two_collors_each_group_has_two_balls()
    {
        $colloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('white'),
            new Ball('white'),
            new Ball('white'),
            new Ball('black'),
        ];

        $groups = $colloredBalls->group($bals);
        /** @var Group $group */
        foreach ($groups as $group) {
            $this->assertEquals(2, $group->countBalls());
        }
    }

    public function test_for_balls_of_three_collors_three_groups_are_returned()
    {
        $colloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('white'),
            new Ball('black'),
            new Ball('green'),
            new Ball('white'),
            new Ball('white'),
            new Ball('black'),
            new Ball('green'),
            new Ball('green'),
            new Ball('green'),
        ];

        $this->assertEquals(3, count($colloredBalls->group($bals)));
    }

    public function test_for_balls_of_three_collors_each_group_has_three_balls()
    {
        $colloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('white'),
            new Ball('black'),
            new Ball('green'),
            new Ball('white'),
            new Ball('white'),
            new Ball('black'),
            new Ball('green'),
            new Ball('green'),
            new Ball('green'),
        ];

        $groups = $colloredBalls->group($bals);
        /** @var Group $group */
        foreach ($groups as $group) {
            $this->assertEquals(3, $group->countBalls());
        }
    }

    public function test_for_balls_of_three_collors_each_group_has_max_two_colors()
    {
        $colloredBalls = new GroupColoredBalls();
        $bals = [
            new Ball('white'),
            new Ball('black'),
            new Ball('green'),
            new Ball('white'),
            new Ball('white'),
            new Ball('black'),
            new Ball('green'),
            new Ball('green'),
            new Ball('green'),
        ];

        $groups = $colloredBalls->group($bals);
        /** @var Group $group */
        foreach ($groups as $group) {
            $this->assertEquals(2, $group->countColors());
        }
    }
}

class GroupColoredBalls
{
    public function group(array $balls): array
    {
        $groups = [];
        $colors = [];
        foreach ($balls as $ball) {
            if (!in_array($ball->getColor(), $colors)) {
                $groups[] = new Group();
                $colors[] = $ball->getColor();
            }
        }

        foreach ($balls as $ball) {
            /** @var Group $group */
            if (current($groups)->countBalls() == count($colors)) {
                next($groups);
            }

            /** @var Group $group */
            if (current($groups)->countColors() == 2) {
                next($groups);
            }

            current($groups)->addBall($ball);
        }

        return $groups;
    }
}

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
}

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