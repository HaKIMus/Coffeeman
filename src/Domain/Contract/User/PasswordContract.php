<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 11.08.17
 * Time: 00:32
 */

namespace Coffeeman\Domain\Contract\User;

use Coffeeman\Domain\Contract\ContractInterface;

final class PasswordContract implements ContractInterface
{
    private $password;
    const SHORTEST_PASSWORD = 5;
    const LONGEST_PASSWORD = 18;

    public function __construct(string $password)
    {
        if (strlen($password) > self::LONGEST_PASSWORD ||
            strlen($password) < self::SHORTEST_PASSWORD
        ) {
            throw new \InvalidArgumentException();
        }

        $this->password = $password;
    }

    public function getValue(): string
    {
        return $this->password;
    }
}
