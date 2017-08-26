<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.07.17
 * Time: 19:59
 */

namespace Coffeeman\Application\Handler;

use Coffeeman\Application\Command\CreateNewUser;
use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Domain\Contract\User\EmailContract;
use Coffeeman\Domain\Contract\User\PasswordContract;
use Coffeeman\Domain\Contract\User\UsernameContract;
use Coffeeman\Domain\User\Email;
use Coffeeman\Domain\User\Username;
use Coffeeman\Domain\User\Password;
use Coffeeman\Domain\User\User;
use Coffeeman\Domain\UsersInterface;
use Ramsey\Uuid\Uuid;

final class CreateNewUserHandler implements CommandHandlerInterface
{
    private $usersRepository;

    public function __construct(UsersInterface $users)
    {
        $this->usersRepository = $users;
    }

    public function handle(CreateNewUser $command): void
    {
        $user = new User(
            Uuid::uuid4(),
            new Username(new UsernameContract($command->getUsername())),
            new Email(new EmailContract($command->getEmail())),
            new Password(new PasswordContract($command->getPassword()))
        );

        $this->usersRepository->add($user);
        $this->usersRepository->commit();
    }
}
