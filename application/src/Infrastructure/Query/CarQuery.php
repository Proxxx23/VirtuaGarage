<?php
declare( strict_types=1 );

namespace App\Infrastructure\Query;

use App\Application\Query\CarQueryInterface;
use Doctrine\DBAL\Connection;

final class CarQuery implements CarQueryInterface
{
    private Connection $connection;

    public function __construct( Connection $connection )
    {
        $this->connection = $connection;
    }

    public function fetchByUserId( int $userId ): object
    {
        return $this->connection->query('SELECT * FROM car WHERE id = 1');
    }
}
