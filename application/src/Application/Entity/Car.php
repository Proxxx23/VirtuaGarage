<?php
declare( strict_types=1 );

namespace App\Application\Entity;

use DateTime;

final class Car
{
    private string $id;
    private string $ownerId;
    private string $brand;
    private string $model;
    private string $productionYear;

    //todo: in domain + mapping
    private function __construct(
        string $id,
        string $ownerId,
        string $brand,
        string $model,
        string $productionDate
    ) {
        $this->id = $id;
        $this->ownerId = $ownerId;
        $this->brand = $brand;
        $this->model = $model;
        $this->productionYear = ( new DateTime( $productionDate ) )->format( 'y' );
    }

    public static function fromDatabaseObject( object $data ): self
    {
        return new self( $data->id, $data->owner_id, $data->brand, $data->model, $data->production_date );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getOwnerId(): string
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

    public function getProductionYear(): string
    {
        return $this->productionYear;
    }
}
