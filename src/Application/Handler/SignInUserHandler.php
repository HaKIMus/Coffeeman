<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 16:55
 */

namespace Coffeeman\Application\Handler;


use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Application\CommandHandlerInterface;

final class SignInUserHandler implements CommandHandlerInterface
{
    public function handle(SignInUser $command): void
    {
        $_SESSION['user'] = $command->getUserBySignInData()->getUserBySignInData($command->getUsername(), $command->getPassword());
    }
}
