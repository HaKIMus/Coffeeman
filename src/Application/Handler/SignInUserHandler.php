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
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;

final class SignInUserHandler implements CommandHandlerInterface
{
    private $userBySignInData;

    public function __construct(GetUserBySignInData $userBySignInData)
    {
        $this->userBySignInData = $userBySignInData;
    }

    public function handle(SignInUser $command): void
    {
        $_SESSION['user'] = $this->userBySignInData->getUserBySignInData($command->getUsername(), $command->getPassword());
    }
}
