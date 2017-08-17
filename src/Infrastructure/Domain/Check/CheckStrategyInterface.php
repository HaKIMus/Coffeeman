<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 04.08.17
 * Time: 06:15
 */

namespace Coffeeman\Infrastructure\Domain\Check;

interface CheckStrategyInterface
{
    public function check(): bool;
}
