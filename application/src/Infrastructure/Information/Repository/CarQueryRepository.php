<?php
declare( strict_types=1 );

namespace App\Infrastructure\Information\Repository;

use App\Application\Information\Entity\Car;
use App\Domain\Information\CarQueryRepositoryInterface;
use App\Infrastructure\Information\Query\CarQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\FetchMode;

final class CarQueryRepository implements CarQueryRepositoryInterface
{
    private Connection $db;

    public function __construct( Connection $db )
    {
        $this->db = $db;
    }

    /**
     * @param CarQuery $carQuery
     *
     * @return Car
     * @throws \Doctrine\DBAL\DBALException | \Exception
     */
    public function fetchByOwnerId( CarQuery $carQuery ): Car
    {
        $data = $this->db->query( 'SELECT * FROM car WHERE owner_id = ' . $carQuery->getOwnerId() );
        $result = $data->fetchAll( FetchMode::STANDARD_OBJECT );

        return Car::fromDatabaseObject( $result[0] );
    }
}
