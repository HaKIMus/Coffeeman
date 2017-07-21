<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:19 AM
 */

namespace Coffeeman\Domain\User;

final class Username
{
    private $username;

    public function __construct(string $name)
    {
        $this->username = $name;
    }
}