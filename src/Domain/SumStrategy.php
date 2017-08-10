<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 18.06.17
 * Time: 17:36
 */

namespace Coffeeman\Domain;

use Symfony\Component\Console\Exception\LogicException;

final class SumStrategy
{
    private $sumStrategy;

    public function __construct(SumInterface $sumStrategy)
    {
        $this->sumStrategy = $sumStrategy;
    }

    public function sum(): void
    {
        $this->sumStrategy->sum();
    }

    public function getSum(): array
    {
        if (empty($this->sumStrategy->getSummary())) {
            throw new LogicException();
        }

        return $this->sumStrategy->getSummary();
    }
}
