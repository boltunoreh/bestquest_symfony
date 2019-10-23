<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20191022085953 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE about CHANGE left_column content LONGTEXT NOT NULL, DROP right_column');
        $this->addSql('UPDATE about SET content = "<p>Мы знаем толк в приключениях, мы ценим вкус испытаний, разбивающих туманное зеркало будней. Мы верим в необходимость личных подвигов, опыта преодоления своих ограничений, которые выстраиваем сами. Мы разрушаем стереотипы проведения выходных и корпоративных выездов «на природу с шашлыками». Мы не боимся нестандартных решений. Мы знаем секреты побед - командных и личных. Те, кто хоть раз погрузился в историю, которую мы создаем, потом возвращаются снова и снова – одни, с детьми и со своей командой. Каждый участник проекта открывает что-то новое в себе и других и меняет свою жизнь на основе этих открытий.</p>
<p>Мы предлагаем проекты для каждого – если вы хотите провести свой день рожденья или другой праздник на природе, совершая открытия и погружаясь в атмосферу приключений, мы ждем вас!</p>"');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE about ADD right_column LONGTEXT NOT NULL COLLATE utf8_unicode_ci, CHANGE content left_column LONGTEXT NOT NULL COLLATE utf8_unicode_ci');
    }
}
