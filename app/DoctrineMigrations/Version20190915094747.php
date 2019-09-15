<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190915094747 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE clients ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE teammates ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE stages ADD deleted_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE project_photos ADD deleted_at DATETIME DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clients DROP deleted_at');
        $this->addSql('ALTER TABLE project_photos DROP deleted_at');
        $this->addSql('ALTER TABLE projects DROP deleted_at');
        $this->addSql('ALTER TABLE stages DROP deleted_at');
        $this->addSql('ALTER TABLE teammates DROP deleted_at');
    }
}
