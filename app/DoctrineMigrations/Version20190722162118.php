<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190722162118 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project_categories DROP FOREIGN KEY FK_22553D5A12469DE2');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE project_categories');
        $this->addSql('ALTER TABLE projects ADD icon LONGTEXT NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, icon LONGTEXT NOT NULL COLLATE utf8_unicode_ci, is_active TINYINT(1) NOT NULL, sort_order INT DEFAULT NULL, UNIQUE INDEX UNIQ_3AF34668989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_categories (project_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_22553D5A166D1F9C (project_id), INDEX IDX_22553D5A12469DE2 (category_id), PRIMARY KEY(project_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_categories ADD CONSTRAINT FK_22553D5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE project_categories ADD CONSTRAINT FK_22553D5A166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE projects DROP icon');
    }
}
