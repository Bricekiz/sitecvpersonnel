<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200308105243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact CHANGE firstname firstname VARCHAR(200) DEFAULT NULL, CHANGE name name VARCHAR(200) DEFAULT NULL, CHANGE phone phone VARCHAR(200) DEFAULT NULL, CHANGE mail mail VARCHAR(200) DEFAULT NULL, CHANGE message message VARCHAR(900) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact CHANGE firstname firstname VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE name name VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE phone phone VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE mail mail VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE message message VARCHAR(900) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
