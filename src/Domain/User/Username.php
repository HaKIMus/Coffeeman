<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:19 AM
 */

namespace Coffeeman\Domain\User;

use Coffeeman\Domain\Contract\User\UsernameContract;

final class Username
{
    private $username;

    public function __construct(UsernameContract $name)
    {
        $this->username = $name->getValue();
    }
}
