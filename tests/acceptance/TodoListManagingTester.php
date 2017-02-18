<?php
use Behat\Gherkin\Node\TableNode;

/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 07.02.17
 * Time: 22:13
 */
class TodoListManagingTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public static $trainingRepository;

    public function __construct()
    {
        self::$trainingRepository = new \Coffeeman\Infrastructure\DoctrineTrainings(\Doctrine\ORM\EntityManager::class);
    }

    /**
     * @Given w repozytorium treningi
     *
     * @param TableNode $tableNode
     */
    public function wRepozytoriumTreningi(TableNode $tableNode)
    {
        $training = $tableNode->getHash();

        foreach ($training as $item) {
            $entity = new \Coffeeman\Domain\Training\Training(
                new \Coffeeman\Domain\Training\TrainingId($item['id']),
                new \Coffeeman\Domain\Training\UserId($item['userId']),
                new \Coffeeman\Domain\Training\TrainingType($item['trainingType']),
                new \Coffeeman\Domain\Training\BurnedCalories($item['burnedCalories']),
                new \Coffeeman\Domain\Training\WorkoutTime($item['workoutTime'])
            );

            $newTraining = new \Coffeeman\Infrastructure\DoctrineTrainings(\Doctrine\ORM\EntityManager::class);
            $newTraining->add($entity);
        }
    }

    /**
     * @Then chcialbym pobrac trening :arg1
     *
     * @param $arg1
     */
    public function chcialbymPobracTrening($arg1)
    {
        self::$trainingRepository->getById($arg1);
    }

    /**
     * @When mam następujące dane o treningach, chcę je dodać do repozytorium:
     */
    public function mamNastpujaceDaneOTreningachChceJeDodacDoRepozytorium()
    {
        throw new \Codeception\Exception\Incomplete("Step `mam nastepujace dane o treningach, chce je dodac do repozytorium:` is not defined");
    }

    /**
     * @Then chcialbym usunac trening :arg1
     */
    public function chcialbymUsunacTrening($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `chcialbym usunac trening :arg1` is not defined");
    }

    /**
     * @Then chcialbym aby nie bylo mozliwe pobranie samochodu :arg1
     */
    public function chcialbymAbyNieByloMozliwePobranieSamochodu($arg1)
    {
        throw new \Codeception\Exception\Incomplete("Step `chcialbym aby nie bylo mozliwe pobranie samochodu :arg1` is not defined");
    }

    /**
     * @Then chcialbym zmienic ilosc spalonych kalorii na :arg1 w treningu :arg2
     */
    public function chcialbymZmienicIloscSpalonychKaloriiNaWTreningu($arg1, $arg2)
    {
        throw new \Codeception\Exception\Incomplete("Step `chcialbym zmienic ilosc spalonych kalorii na :arg1 w treningu :arg2` is not defined");
    }

    /**
     * @Then w treningu :arg1 chcialbym zmienic typ treningu na :arg2
     */
    public function wTreninguChcialbymZmienicTypTreninguNa($arg1, $arg2)
    {
        throw new \Codeception\Exception\Incomplete("Step `w treningu :arg1 chcialbym zmienic typ treningu na :arg2` is not defined");
    }
}