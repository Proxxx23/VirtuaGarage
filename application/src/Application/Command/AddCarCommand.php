<?php
declare( strict_types=1 );

namespace App\Application\Command;

class AddCarCommand
{
    private int $ownerId;
    private string $brand;
    private string $model;
    private string $productionDate;

    public function __construct(
        int $ownerId,
        string $brand,
        string $model,
        string $productionDate
    ) {
        $this->ownerId = $ownerId;
        $this->brand = $brand;
        $this->model = $model;
        $this->productionDate = $productionDate;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getProductionDate(): string
    {
        return $this->productionDate;
    }
}
