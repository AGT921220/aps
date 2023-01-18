<?php

namespace App\Bussines\Erp\WorkOrder\Infrastructure;

use App\Bussines\Erp\WorkOrder\Domain\WorkOrder as DomainWorkOrder;
use App\Bussines\Erp\WorkOrder\Domain\WorkOrderRepository;
use App\Bussines\Erp\WorkOrder\Domain\WorkOrderResponse;
use App\Models\WorkOrder;

class WorkOrderEloquentRepository implements WorkOrderRepository
{

    public function save(DomainWorkOrder $workOrder): int
    {
        $model = WorkOrder::find($workOrder->getId())
            ?: new WorkOrder;
        $model->client_id = $workOrder->getClientId();
        $model->quantity = $workOrder->getQuantity();
        $model->material = $workOrder->getMaterial();
        $model->print_colors = $workOrder->getPrintColors();
        $model->unit_price = $workOrder->getUnitPrice();
        $model->observations = $workOrder->getObservations();
        $model->delivery_date = $workOrder->getDeliveryDate();
        $model->status = $workOrder->getStatus();
        $model->save();
        return $model->id;
    }

    public function search(): WorkOrderResponse
    {
        $workOrders = WorkOrder::select('work_orders.*', 'clients.name as client_name')
            ->join('clients', 'clients.id', 'work_orders.client_id')
            ->get();

        $domainWorkOrders = $workOrders->map(function ($workOrder) {
            return (new DomainWorkOrder(
                $workOrder->client_id,
                $workOrder->quantity,
                $workOrder->material,
                $workOrder->print_colors,
                $workOrder->unit_price,
                $workOrder->observations,
                $workOrder->delivery_date,
                $workOrder->id,
                $workOrder->client_name,
                $workOrder->status
            ));
        });

        return new WorkOrderResponse(
            $workOrders->count(),
            ...$domainWorkOrders
        );
    }

    public function find(int $workOrderId): ?DomainWorkOrder
    {

        $workOrder = WorkOrder::select('work_orders.*', 'clients.name as client_name')
            ->join('clients', 'clients.id', 'work_orders.client_id')
            ->where('work_orders.id', $workOrderId)
            ->first();

        if (!$workOrder) {
            return null;
        }
        return (new DomainWorkOrder(
            $workOrder->client_id,
            $workOrder->quantity,
            $workOrder->material,
            $workOrder->print_colors,
            $workOrder->unit_price,
            $workOrder->observations,
            $workOrder->delivery_date,
            $workOrder->id,
            $workOrder->client_name,
            $workOrder->status
        ));
    }
}
