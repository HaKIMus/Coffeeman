Feature: Management of Workout Dashboard
  As a User
  In order to add new workout into Workout Dashboard\
  I need to be able to create add workout step by step

  Scenario: Workouts exists
    Given these workouts exists
    | id | userId | workoutTypeId | burnedCalories | workoutStartDate    | workoutStopDate     |
    | 1  | 1      | 1             | 460            | 2017-02-14 23:00:00 | 2017-02-14 23:36:42 |
    | 2  | 2      | 4             | 502            | 2017-02-12 21:23:00 | 2017-01-11 05:34:23 |
    | 3  | 4      | 3             | 475            | 2017-01-10 12:03:02 | 2017-01-10 12:30:22 |