<?php

namespace App\Bussines\Erp\WorkOrder\Application\Find;

use App\Bussines\Erp\WorkOrder\Domain\WorkOrder;
use App\Bussines\Erp\WorkOrder\Domain\WorkOrderRepository;

final class WorkOrderFinder
{
    private $repository;

    public function __construct(WorkOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $workOrderId): ?WorkOrder
    {
        return $this->repository->find($workOrderId);
    }
}
