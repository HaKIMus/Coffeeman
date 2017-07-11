<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:19 AM
 */

namespace Coffeeman\Domain\User;

final class Name
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}