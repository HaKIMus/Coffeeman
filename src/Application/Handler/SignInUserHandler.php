<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 16:55
 */

namespace Coffeeman\Application\Handler;


use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Application\CommandInterface;
use Coffeeman\Application\Query\User\UserView;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;

final class SignInUserHandler implements CommandHandlerInterface
{
    private $user;

    public function handle(CommandInterface $command): void
    {
        $this->user = $command->getUserBySignInData()->getUserBySignInData($command->getUsername(), $command->getPassword());
    }

    public function getUser(): UserView
    {
        if (!isset($this->user)) {
            throw new \InvalidArgumentException('No user found');
        }

        return $this->user;
    }
}
