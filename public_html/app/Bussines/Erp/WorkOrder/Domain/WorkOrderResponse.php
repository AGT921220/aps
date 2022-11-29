<?php

namespace App\Bussines\Erp\WorkOrder\Domain;

class WorkOrderResponse
{
    private $total;
    private $data;


    public function __construct(int $total, WorkOrder ...$data)
    {
        $this->total = $total;
        $this->data = $data;
    }


    public function toArray(): array
    {
        return [
            // 'per_page' => $this->perPage,
            // 'current_page' => $this->currentPage,
            'total' => $this->total,
            'data' => array_map(function (WorkOrder $workOrder) {
                return $workOrder->toArray();
            }, $this->data)
        ];
    }
}
