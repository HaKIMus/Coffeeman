<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.08.17
 * Time: 14:07
 */

namespace Coffeeman\Application\Service;

use Coffeeman\Infrastructure\Domain\Workout\Check\CheckStrategy;
use Coffeeman\Infrastructure\Domain\Workout\Check\CheckStrategyInterface;

final class CheckApplicationService
{
    private $strategy;

    public function __construct(CheckStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function check(): bool
    {
        return (new CheckStrategy($this->strategy))->check();
    }
}
