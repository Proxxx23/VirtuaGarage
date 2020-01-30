<?php
declare( strict_types=1 );

namespace App\Infrastructure\Query;

use App\Application\Entity\Car;
use App\Application\Query\CarQueryInterface;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\FetchMode;

final class CarQuery implements CarQueryInterface
{
    private Connection $connection;

    //todo inject repo

    //todo: api with cars (car list etc.) https://apilist.fun/api/car-registration-api

    public function __construct( Connection $connection )
    {
        $this->connection = $connection;
    }

    public function fetchByUserId( int $userId ): Car
    {
        $data = $this->connection->query( 'SELECT * FROM car WHERE id = ' . $userId );
        $result = $data->fetchAll( FetchMode::STANDARD_OBJECT );

        return Car::fromDatabaseObject( $result[0] );
    }
}
