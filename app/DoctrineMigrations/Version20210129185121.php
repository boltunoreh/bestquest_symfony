<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210129185121 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE orders CHANGE email email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE orders CHANGE date date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE orders CHANGE quantity quantity INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE orders CHANGE email email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE orders CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE orders CHANGE quantity quantity INT NOT NULL');
    }
}
