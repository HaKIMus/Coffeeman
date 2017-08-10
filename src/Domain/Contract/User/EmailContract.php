<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 11.08.17
 * Time: 00:28
 */

namespace Coffeeman\Domain\Contract\User;


use Coffeeman\Domain\Contract\ContractInterface;

final class EmailContract implements ContractInterface
{
    private $email;

    public function __construct(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            throw new \InvalidArgumentException();
        }

        $this->email = $email;
    }

    public function getValue(): string
    {
        return $this->email;
    }
}