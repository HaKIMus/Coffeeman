<?php
namespace Application\Query\Workout;

use Coffeeman\Application\Query\Workout\WorkoutView;

class WorkoutViewTest extends \PHPUnit_Framework_TestCase
{
    private $workoutView;

    public function __construct()
    {
        $this->workoutView = new WorkoutView(
            200,
            '2017-04-01 20:30:23',
            '2017-04-01 21:04:21',
            1
        );
    }

    public function testGetBurnedCalories()
    {
        $this->assertEquals(200, $this->workoutView->getBurnedCalories());
    }

    public function testGetStartDate()
    {
        $this->assertEquals('2017-04-01 20:30:23', $this->workoutView->getStartDate());
    }

    public function testGetStopDate()
    {
        $this->assertEquals('2017-04-01 21:04:21', $this->workoutView->getStopDate());
    }

    public function testGetWorkoutType()
    {
        $this->assertEquals(1, $this->workoutView->getWorkoutTypeId());
    }
}
