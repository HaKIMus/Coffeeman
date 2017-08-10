<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 08:07
 */

namespace Coffeeman\Application\Command;


class SumSportsmanWorkouts
{
    private $sportsmanId;

    public function __construct(string $sportsmanId)
    {
        $this->sportsmanId = $sportsmanId;
    }

    public function getSportsmanId(): string
    {
        return $this->sportsmanId;
    }
}