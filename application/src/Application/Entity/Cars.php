<?php
declare( strict_types=1 );

namespace App\Application\Entity;

use DateTimeImmutable;

final class Cars
{
    private int $id;
    private int $ownerId;
    private string $brand;
    private string $model;
    private DateTimeImmutable $productionYear;

    private function __construct(
        int $id,
        int $ownerId,
        string $brand,
        string $model,
        \DateTimeImmutable $productionYear
    ) {
        $this->id = $id;
        $this->ownerId = $ownerId;
        $this->brand = $brand;
        $this->model = $model;
        $this->productionYear = $productionYear;
    }

    public static function fromDatabaseObject( object $data ): self
    {
        return new self( $data->id, $data->ownerId, $data->brand, $data->model, $data->productionYear );
    }
}
