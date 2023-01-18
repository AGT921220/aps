<?php

namespace App\Bussines\Erp\WorkOrder\Application\Update;

use App\Bussines\Erp\WorkOrder\Domain\WorkOrder;
use App\Bussines\Erp\WorkOrder\Domain\WorkOrderRepository;

final class WorkOrderUpdater
{
    private $repository;

    public function __construct(WorkOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function _invoke(
        int $id,
        string $clientId,
        int $quantity,
        string $material,
        string $printColors,
        string $unitPrice,
        ?string $observations = null,
        ?string $deliveryDate = null,
        ?string $status = null
    ): array {

        $workOrder = new WorkOrder(
            $clientId,
            $quantity,
            $material,
            $printColors,
            $unitPrice,
            $observations,
            $deliveryDate,
            $id,
            null,
            $status
        );
        $this->repository->save($workOrder);

        $persistedWorkOrder = WorkOrder::create(
            $workOrder->getClientId(),
            $workOrder->getQuantity(),
            $workOrder->getMaterial(),
            $workOrder->getPrintColors(),
            $workOrder->getUnitPrice(),
            $workOrder->getObservations(),
            $workOrder->getDeliveryDate(),
            $workOrder->getId()
        );

        return $persistedWorkOrder->toArray();
    }
}
