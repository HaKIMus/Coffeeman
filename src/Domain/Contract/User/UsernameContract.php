<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.07.17
 * Time: 14:49
 */

namespace Coffeeman\Domain\Contract\User;


use Coffeeman\Domain\Contract\ContractInterface;

final class UsernameContract implements ContractInterface
{
    const SHORTEST_NAME = 1;
    const LONGEST_NAME = 20;
    private $value;

    public function __construct(string $username)
    {
        if (empty($username) ||
            filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS) === FALSE ||
            strlen($username) > self::LONGEST_NAME ||
            strlen($username) < self::SHORTEST_NAME
        ) {
            throw new \InvalidArgumentException('Username cannot be empty && Not longer than ' . self::LONGEST_NAME . 'char and not shorter than ' . self::SHORTEST_NAME);
        }

        $this->value = $username;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}