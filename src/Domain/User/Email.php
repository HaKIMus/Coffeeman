<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:20 AM
 */

namespace Coffeeman\Domain\User;


final class Email
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}