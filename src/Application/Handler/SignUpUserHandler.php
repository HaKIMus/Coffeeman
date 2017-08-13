<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.07.17
 * Time: 14:34
 */

namespace Coffeeman\Application\Handler;

use Coffeeman\Application\Command\SignUpUser;
use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Domain\Contract\User\EmailContract;
use Coffeeman\Domain\Contract\User\PasswordContract;
use Coffeeman\Domain\Contract\User\UsernameContract;
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

    public function handle(SignUpUser $command): void
    {
        $newUser = new User(
            UUid::uuid4(),
            new Username(new UsernameContract($command->getUsername())),
            new Email(new EmailContract($command->getEmail())),
            new Password(new PasswordContract($command->getPassword()))
        );

        $this->users->add($newUser);
        $this->users->commit();
    }
}