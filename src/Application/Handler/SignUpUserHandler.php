<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.07.17
 * Time: 14:34
 */

namespace Coffeeman\Application\Handler;


use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Application\CommandInterface;
use Coffeeman\Domain\User\Email;
use Coffeeman\Domain\User\Password;
use Coffeeman\Domain\User\User;
use Coffeeman\Domain\User\Username;
use Coffeeman\Domain\UsersInterface;
use Ramsey\Uuid\Uuid;

final class SignUpUserHandler implements CommandHandlerInterface
{
    private $users;

    public function __construct(UsersInterface $users)
    {
        $this->users = $users;
    }

    public function handle(CommandInterface $command): void
    {
        $newUser = new User(
            UUid::uuid4(),
            new Username($command->getUsername()),
            new Email($command->getEmail()),
            new Password($command->getPassword())
        );

        $this->users->add($newUser);
        $this->users->commit();
    }
}