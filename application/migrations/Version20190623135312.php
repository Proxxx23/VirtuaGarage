<?php

declare(strict_types=1);

namespace migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190623135312 extends AbstractMigration
{
    private const DESCRIPTION = 'Comparison and repository statistics';

    private const CREATE_REPOSITORY_STATISTICS_TABLE_SQL = '
        CREATE TABLE purchase(
            id VARCHAR(255) NOT NULL,
            registration_number VARCHAR(255) NOT NULL,
            amount VARCHAR(255) NOT NULL,
            currency VARCHAR(50) NOT NULL,
            PRIMARY KEY(id)
        )
        DEFAULT CHARACTER SET utf8mb4
        COLLATE utf8mb4_unicode_ci ENGINE = InnoDB
    ';

    private const REMOVE_COMPARISON_TABLE_SQL = 'DROP TABLE comparison';
    private const REMOVE_REPOSITORY_STATISTICS_TABLE_SQL = 'DROP TABLE repository_statistics';

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(self::CREATE_REPOSITORY_STATISTICS_TABLE_SQL);
        $this->addSql(self::CREATE_COMPARISON_TABLE_SQL);
    }

    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql(self::REMOVE_REPOSITORY_STATISTICS_TABLE_SQL);
        $this->addSql(self::REMOVE_COMPARISON_TABLE_SQL);
    }
}
