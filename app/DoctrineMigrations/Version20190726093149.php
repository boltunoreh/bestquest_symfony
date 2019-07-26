<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190726093149 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE projects_stages');
        $this->addSql('ALTER TABLE stages ADD project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stages ADD CONSTRAINT FK_2FA26A64166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('CREATE INDEX IDX_2FA26A64166D1F9C ON stages (project_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects_stages (project_id INT NOT NULL, stage_id INT NOT NULL, UNIQUE INDEX UNIQ_EE56F69B2298D193 (stage_id), INDEX IDX_EE56F69B166D1F9C (project_id), PRIMARY KEY(project_id, stage_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects_stages ADD CONSTRAINT FK_EE56F69B166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE projects_stages ADD CONSTRAINT FK_EE56F69B2298D193 FOREIGN KEY (stage_id) REFERENCES stages (id)');
        $this->addSql('ALTER TABLE stages DROP FOREIGN KEY FK_2FA26A64166D1F9C');
        $this->addSql('DROP INDEX IDX_2FA26A64166D1F9C ON stages');
        $this->addSql('ALTER TABLE stages DROP project_id');
    }
}
