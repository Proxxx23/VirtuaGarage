<?php
declare( strict_types=1 );

namespace App\Infrastructure\Garage;

use App\Application\Command\AddCarCommand;
use App\Application\Command\RemoveCarCommand;
use App\Application\Garage\GarageRepositoryInterface;
use Doctrine\DBAL\Connection;

class GarageRepository implements GarageRepositoryInterface
{
    private Connection $db;

    public function __construct( Connection $db )
    {
        $this->db = $db;
    }

    /**
     * @param AddCarCommand $addCarCommand
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function add( AddCarCommand $addCarCommand ): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO car (owner_id, brand, model, production_date) VALUES (:owner_id, :brand, :model, :production_date)'
        );

        $stmt->execute(
            [
                'owner_id' => $addCarCommand->getOwnerId(),
                'brand' => $addCarCommand->getBrand(),
                'model' => $addCarCommand->getModel(),
                'production_date' => $addCarCommand->getProductionDate(),
            ]
        );
    }

    /**
     * @param RemoveCarCommand $removeCarCommand
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function remove( RemoveCarCommand $removeCarCommand ): void
    {
        $stmt = $this->db->prepare( 'DELETE FROM car WHERE id = :id' );
        $stmt->execute( [ 'id' => $removeCarCommand->getCarId() ] );
    }
}
