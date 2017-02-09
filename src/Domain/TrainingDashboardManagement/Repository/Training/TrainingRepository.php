<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:56
 */

namespace Coffeeman\TrainingDashboardManagement\Repository\Training;

use Coffeeman\TrainingDashboardManagement\Entity\Training\Training;
use Coffeeman\TrainingDashboardManagement\Gateway\Training\TrainingDummyGateway;
use Coffeeman\TrainingDashboardManagement\Hydrator\Training\DefaultTrainingHydrator;
use Coffeeman\TrainingDashboardManagement\Repository\Excpetions\Training\TrainingRepositoryException;
use Coffeeman\TrainingDashboardManagement\ValueObjects\ValueInterface;
use Coffeeman\TrainingDashboardManagement\Factory\Training\TrainingFactory;

class TrainingRepository
{
    protected $hydrator;
    protected $factory;
    protected $gateway;

    public function __construct(
        DefaultTrainingHydrator $hydrator,
        TrainingFactory $factory,
        TrainingDummyGateway $gateway
    ) {
        $this->hydrator = $hydrator;
        $this->factory = $factory;
        $this->gateway = $gateway;
    }

    public function findById(ValueInterface $trainingId): Training
    {
        $trainingData = $this->gateway->findOneBy($trainingId->getValue());

        if (!$this->isNull($trainingData)) {
            throw new TrainingRepositoryException('Training ('. $trainingId->getValue() .') not found!');
        }

        return $this->hydrator->hydrate(
            $this->factory->create(),
            $trainingData
        );
    }

    public function findAll(): array
    {
        $rawTrainings = $this->gateway->findAll();
        $packets = [];

        foreach ($rawTrainings as $trainingData) {
            $packets[] = $this->hydrator->hydrate(
                $this->factory->create(),
                $trainingData
            );
        }

        return $packets;
    }

    /**
     * @Todo: editTraining(), registerTraining() & deleteTraining().
     */

    private function isNull($param): bool
    {
        return $param === 0;
    }
}