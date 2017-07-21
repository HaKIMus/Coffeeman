<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.07.17
 * Time: 19:59
 */

namespace Coffeeman\Application\Handler;


use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Application\CommandInterface;
use Coffeeman\Domain\User\Email;
use Coffeeman\Domain\User\Username;
use Coffeeman\Domain\User\Password;
use Coffeeman\Domain\User\User;
use Coffeeman\Domain\UsersInterface;

final class CreateNewUserHandler implements CommandHandlerInterface
{
    private $users;

    public function __construct(UsersInterface $users)
    {
        $this->users = $users;
    }

    public function handle(CommandInterface $command): void
    {
        $user = new User(
            $command->getId(),
            new Username($command->getUsername()),
            new Email($command->getEmail()),
            new Password($command->getPassword())
        );

        $this->users->add($user);
        $this->users->commit();
    }
}