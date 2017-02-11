<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:37
 */

namespace Coffeeman\TrainingDashboardManagement\Domain\Gateway;


interface GatewayInterface
{
    public function findAll(): array;

    public function findById(int $id): array;

    public function findOneBy(array $criteria): array;

    public function updateOneBy(array $data, array $criteria);

    public function store(array $data);
}