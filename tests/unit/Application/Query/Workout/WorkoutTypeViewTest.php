<?php
namespace Application\Query\Workout;


use Coffeeman\Application\Query\Workout\WorkoutTypeView;

class WorkoutTypeViewTest extends \Codeception\Test\Unit
{
    public function testPassedDataShouldBeEquals()
    {
        $workoutTypeView = new WorkoutTypeView(1, 'HIIT');

        $this->assertEquals(1, $workoutTypeView->getId());
        $this->assertEquals('HIIT', $workoutTypeView->getWorkoutTypeName());
    }
}