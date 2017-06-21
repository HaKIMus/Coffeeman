<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.06.17
 * Time: 13:09
 */

namespace Coffeeman\Domain\Workout\Sum;


interface SumInterface
{
    public function getSummary(): array;
}