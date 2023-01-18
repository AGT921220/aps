<?php

namespace App\Bussines\Erp\WorkOrder\Application\Search;


use App\Bussines\Erp\WorkOrder\Domain\WorkOrderRepository;
use App\Bussines\Erp\WorkOrder\Domain\WorkOrderResponse;

final class WorkOrderSearcher
{
    private $repository;

    public function __construct(WorkOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function _invoke():WorkOrderResponse
    {
        return $this->repository->search();
    }
}
