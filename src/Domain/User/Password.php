<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:21 AM
 */

namespace Coffeeman\Domain\User;


final class Password
{
    private $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }
}