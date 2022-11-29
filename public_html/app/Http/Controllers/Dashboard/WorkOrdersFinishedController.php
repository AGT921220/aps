<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Erp\WorkOrder\Application\Find\WorkOrderFinder;
use App\Bussines\Erp\WorkOrder\Application\Update\WorkOrderUpdater;
use App\Http\Controllers\Controller;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrdersFinishedController extends Controller
{
    private $workOrderFinder;
    private $workOrderUpdater;
    public function __construct(WorkOrderFinder $workOrderFinder, WorkOrderUpdater $workOrderUpdater)
    {
        $this->workOrderFinder = $workOrderFinder;
        $this->workOrderUpdater = $workOrderUpdater;
    }
    public function update(int $workOrderId)
    {
        $workOrder = $this->workOrderFinder->__invoke($workOrderId);
        if (!$workOrder) {
            return back()->with('error', 'La orden no Existe.');
        }
        if (!$workOrder->getFinishable()) {
            return back()->with('error', 'La orden ya está finalizada.');
        }
        $this->workOrderUpdater->_invoke(
            $workOrder->getId(),
            $workOrder->getClientId(),
            $workOrder->getQuantity(),
            $workOrder->getMaterial(),
            $workOrder->getPrintColors(),
            $workOrder->getUnitPrice(),
            $workOrder->getObservations(),
            $workOrder->getDeliveryDate(),
            WorkOrder::STATUS_FINISHED
        );
        return back()->with('success', 'La orden se finalizó.');
    }
}
