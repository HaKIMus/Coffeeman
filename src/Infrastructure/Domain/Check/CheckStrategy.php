<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 04.08.17
 * Time: 06:18
 */

namespace Coffeeman\Infrastructure\Domain\Check;

final class CheckStrategy
{
    private $checkStrategy;

    public function __construct(CheckStrategyInterface $checkStrategy)
    {
        $this->checkStrategy = $checkStrategy;
    }

    public function check(): bool
    {
        return $this->checkStrategy->check();
    }
}
