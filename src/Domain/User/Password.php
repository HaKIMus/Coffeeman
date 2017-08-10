<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:21 AM
 */

namespace Coffeeman\Domain\User;


use Coffeeman\Domain\Contract\User\PasswordContract;

final class Password
{
    private $password;

    public function __construct(PasswordContract $password)
    {
        $this->password = $password;
    }
}
