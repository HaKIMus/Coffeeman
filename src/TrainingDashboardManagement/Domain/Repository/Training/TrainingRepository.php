<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:56
 */

namespace Coffeeman\TrainingDashboardManagement\Domain\Repository\Training;

use Coffeeman\TrainingDashboardManagement\Domain\Entity\Training\Training;
use Coffeeman\TrainingDashboardManagement\Domain\Factory\FactoryInterface;
use Coffeeman\TrainingDashboardManagement\Domain\Gateway\GatewayInterface;
use Coffeeman\TrainingDashboardManagement\Domain\Hydrator\Training\TrainingHydratorInterface;
use Coffeeman\TrainingDashboardManagement\Domain\Repository\Excpetions\Training\TrainingRepositoryException;
use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training\TrainingId;

class TrainingRepository
{
    protected $hydrator;
    protected $factory;
    protected $gateway;

    public function __construct(
        TrainingHydratorInterface $hydrator,
        FactoryInterface $factory,
        GatewayInterface $gateway
    ) {
        $this->hydrator = $hydrator;
        $this->factory = $factory;
        $this->gateway = $gateway;
    }

    public function findById(TrainingId $trainingId): Training
    {
        $trainingData = $this->gateway->findById($trainingId->getValue());

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

    private function isNull(array $param): bool
    {
        return count($param) > 0;
    }
}