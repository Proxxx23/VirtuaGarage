<?php

declare( strict_types=1 );

namespace migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class baseMigration extends AbstractMigration
{
    private const DESCRIPTION = 'VirtuaGarage';

    private const CREATE_CARS_TABLE = '
        CREATE TABLE cars (
            id INT(11) NOT NULL,
            owner_id INT(11) NOT NULL,
            brand VARCHAR(100) NOT NULL,
            model VARCHAR(100) NOT NULL,
            production_date DATE(100) NOT NULL,
            PRIMARY KEY(id)
        )
        DEFAULT CHARACTER SET utf8mb4
        COLLATE utf8mb4_unicode_ci ENGINE = InnoDB
    ';

    private const CREATE_USERS_TABLE = '
        CREATE TABLE users(
            id INT(11) NOT NULL,
            username VARCHAR(100) NOT NULL,
            firstname VARCHAR(100) NOT NULL,
            lastname VARCHAR(100) NOT NULL,
            PRIMARY KEY(id)
        )
        DEFAULT CHARACTER SET utf8mb4
        COLLATE utf8mb4_unicode_ci ENGINE = InnoDB
    ';

    private const REMOVE_CARS_TABLE_SQL = 'DROP TABLE cars';
    private const REMOVE_USERS_TABLE_SQL = 'DROP TABLE users';

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function up( Schema $schema ): void
    {
        $this->abortIf(
            $this->connection->getDatabasePlatform()
                ->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql( self::CREATE_USERS_TABLE );
        $this->addSql( self::CREATE_CARS_TABLE );
    }

    public function down( Schema $schema ): void
    {
        $this->abortIf(
            $this->connection->getDatabasePlatform()
                ->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql( self::REMOVE_USERS_TABLE_SQL );
        $this->addSql( self::REMOVE_CARS_TABLE_SQL );
    }
}
