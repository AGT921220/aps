<?php


namespace App\Bussines\Erp\WorkOrder\Application\Create;

use App\Bussines\Erp\WorkOrder\Domain\WorkOrder;
use App\Bussines\Erp\WorkOrder\Domain\WorkOrderRepository;

class WorkOrderCreator
{
    private $repository;

    public function __construct(WorkOrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $clientId,
        int $quantity,
        string $material,
        string $printColors,
        string $unitPrice,
        ?string $observations = null,
        ?string $deliveryDate = null,
        ?int $id = null
    ): array {
        $WorkOrder = new WorkOrder(
            $clientId,
            $quantity,
            $material,
            $printColors,
            $unitPrice,
            $observations,
            $deliveryDate,
            $id
        );

        $id = $this->repository->save($WorkOrder);

        $persistedWorkOrder = WorkOrder::create(
            $clientId,
            $quantity,
            $material,
            $printColors,
            $unitPrice,
            $observations,
            $deliveryDate,
            $id

        );

        return $persistedWorkOrder->toArray();
    }
}
