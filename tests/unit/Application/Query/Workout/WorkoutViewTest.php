<?php

namespace Application\Query\Workout;

use Coffeeman\Application\Query\Workout\WorkoutView;

class WorkoutViewTest extends \PHPUnit_Framework_TestCase
{
    private $workoutView;

    public function __construct()
    {
        parent::__construct();

        $this->workoutView = new WorkoutView(
            1,
            1
        );
    }

    public function testGetBurnedCalories()
    {
        $this->assertEquals(1, $this->workoutView->getWorkoutPropertyId());
    }

    public function testGetStartDate()
    {
        $this->assertEquals(1, $this->workoutView->getWorkoutTypeId());
    }
}