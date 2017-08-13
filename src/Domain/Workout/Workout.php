<?php

/**
 * @TODO: SportsmanId as UserId.
 */

namespace Coffeeman\Domain\Workout;

use Coffeeman\Domain\Workout\Information\InformationAboutWorkout;

class Workout
{
    private $id;

    private $sportsmanId;

    private $informationAboutWorkout;

    public function __construct(
        string $sportsmanId,
        InformationAboutWorkout $informationAboutWorkout
    ){
        $this->sportsmanId = $sportsmanId;
        $this->informationAboutWorkout = $informationAboutWorkout;
    }
}
