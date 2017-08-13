<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.06.17
 * Time: 13:09
 */

namespace Coffeeman\Domain;


interface SumInterface
{
    public function sum(): void;
    public function getSummary(): array;
}
