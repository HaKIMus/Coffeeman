<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:20 AM
 */

namespace Coffeeman\Domain\User;


use Coffeeman\Domain\Contract\User\EmailContract;

final class Email
{
    private $email;

    public function __construct(EmailContract $email)
    {
        $this->email = $email->getValue();
    }
}
