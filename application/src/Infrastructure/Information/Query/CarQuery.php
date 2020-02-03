<?php
declare( strict_types=1 );

namespace App\Infrastructure\Information\Query;

final class CarQuery
{
    private int $ownerId;

    //todo: api with cars (car list etc.) https://apilist.fun/api/car-registration-api

    public function __construct( int $ownerId )
    {
        $this->ownerId = $ownerId;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }
}
