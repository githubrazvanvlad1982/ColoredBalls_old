<?php

namespace test;


class GroupColoredBalls
{
    /**
     * @param array $balls
     * @return array
     */
    public function group(array $balls): array
    {

        $ballsPerCollor = [];
        /** @var Ball  $ball */
        foreach ($balls as $ball) {
            $ballsPerCollor[$ball->getColor()] = $ballsPerCollor[$ball->getColor()] + 1;
        }

        arsort($ballsPerCollor);

        $orderedBalls = [];
        foreach ($ballsPerCollor as $balllColor => $count) {
            for ($i = 0; $i < $count; $i++) {
                $orderedBalls[] = new Ball($balllColor);
            }
        }

        $groups = [];
        $colors = [];
        foreach ($orderedBalls as $ball) {
            if (!in_array($ball->getColor(), $colors)) {
                $groups[] = new Group();
                $colors[] = $ball->getColor();
            }
        }

        $tries = 0;
        while (current($orderedBalls) && $tries < 1000) {
            $ball = current($orderedBalls);
            $tries++;
            /** @var Group $group */
            if (current($groups)->countBalls() >= count($colors)) {
                if(!next($groups)) {
                    $ball = $groups[0]->pop();
                    array_merge($orderedBalls, [$ball]);
                    reset($groups);
                }

                continue;
            }

            /** @var Group $group */
            if (current($groups)->countColors() == 2
                && !current($groups)->hasBallsOfColor($ball->getColor())){
                if(!next($groups)) {
                    $ball = $groups[0]->pop();
                    $orderedBalls[] = $ball;
                    reset($groups);
                }
                continue;
            }

            current($groups)->addBall($ball);
            //$currentBall = current($orderedBalls);
            //unset($currentBall);
            $key = key($orderedBalls);
            unset($orderedBalls[$key]);
            //next($orderedBalls);

        }

        return $groups;
    }
}