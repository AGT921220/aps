<?php

namespace App\Bussines\Erp\WorkOrder\Domain;

use App\Models\WorkOrder as ModelsWorkOrder;

class WorkOrder
{
    private $id;
    private $clientId;
    private $quantity;
    private $material;
    private $printColors;
    private $unitPrice;
    private $observations;
    private $deliveryDate;
    private $clientName;
    private $status;

    public function __construct(
        int $clientId,
        int $quantity,
        string $material,
        string $printColors,
        string $unitPrice,
        ?string $observations = null,
        ?string $deliveryDate = null,
        ?int $id = null,
        ?string $clientName = null,
        ?string $status = null
    ) {

        $this->id = $id;
        $this->clientId = $clientId;
        $this->quantity = $quantity;
        $this->material = $material;
        $this->printColors = $printColors;
        $this->unitPrice = $unitPrice;
        $this->observations = $observations;
        $this->deliveryDate = $deliveryDate;
        $this->clientName = $clientName;
        $this->status = $status;
    }

    public static function create(
        int $clientId,
        int $quantity,
        string $material,
        string $printColors,
        string $unitPrice,
        ?string $observations = null,
        ?string $deliveryDate = null,
        ?int $id = null
    ): self {


        $WorkOrder = new self(
            $clientId,
            $quantity,
            $material,
            $printColors,
            $unitPrice,
            $observations,
            $deliveryDate,
            $id
        );
        return $WorkOrder;
    }

    public static function update(
        int $clientId,
        int $quantity,
        string $material,
        string $printColors,
        string $unitPrice,
        ?string $observations = null,
        ?string $deliveryDate = null,
        ?int $id = null
    ): self {

        $WorkOrder = new self(
            $clientId,
            $quantity,
            $material,
            $printColors,
            $unitPrice,
            $observations,
            $deliveryDate,
            $id
        );
        return $WorkOrder;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'client_id' => $this->getClientId(),
            'quantity' => $this->getQuantity(),
            'material' => $this->getMaterial(),
            'print_colors' => $this->getPrintColors(),
            'unit_price' => $this->getUnitPrice(),
            'observations' => $this->getObservations(),
            'delivery_date' => $this->getDeliveryDate(),
            'client_name' => $this->getClientName(),
            'status' => $this->getStatus(),
            'is_finishable' => $this->getFinishable()
        ];
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getMaterial(): string
    {
        return $this->material;
    }
    public function getPrintColors(): string
    {
        return $this->printColors;
    }
    public function getUnitPrice(): string
    {
        return $this->unitPrice;
    }
    public function getObservations(): ?string
    {
        return $this->observations;
    }
    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }
    public function getClientName(): ?string
    {
        return $this->clientName;
    }
    public function getStatus(): ?string
    {
        return ($this->status) ? $this->status : ModelsWorkOrder::STATUS_CREATED;
    }
    public function getFinishable(): bool
    {
        return ($this->status == ModelsWorkOrder::STATUS_CREATED) ? true : false;
    }
}
