<?php
declare( strict_types=1 );

namespace App\Infrastructure\Information\Repository;

use App\Application\Information\Entity\Car;
use App\Application\Information\Entity\CarCollection;
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
     * @return CarCollection
     * @throws \Doctrine\DBAL\DBALException | \Exception
     */
    public function fetchByOwnerId( CarQuery $carQuery ): CarCollection
    {
        $data = $this->db->query( 'SELECT * FROM car WHERE owner_id = ' . $carQuery->getOwnerId() );
        $results = $data->fetchAll( FetchMode::STANDARD_OBJECT );

        $carCollection = new CarCollection();
        foreach ( $results as $result ) {
            $carCollection->add( Car::fromDBObject( $result ) );
        }

        return $carCollection;
    }
}
