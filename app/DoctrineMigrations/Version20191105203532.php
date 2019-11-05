<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20191105203532 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders ADD project VARCHAR(255) DEFAULT NULL, DROP goal, DROP field_of_activity, DROP average_age, DROP liked_projects, DROP disliked_projects, DROP ideas');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders ADD field_of_activity VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, ADD average_age VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, ADD liked_projects LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, ADD disliked_projects LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, ADD ideas LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, CHANGE project goal VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
