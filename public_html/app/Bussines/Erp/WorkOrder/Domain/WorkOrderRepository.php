<?php

namespace App\Bussines\Erp\WorkOrder\Domain;


interface WorkOrderRepository
{
    public function save(WorkOrder $workOrder): int;
    public function search():WorkOrderResponse;
    public function find(int $WorkOrderId): ?WorkOrder;
}
