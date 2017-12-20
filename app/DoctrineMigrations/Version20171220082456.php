<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171220082456 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE media__gallery (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, context VARCHAR(64) NOT NULL, default_format VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media__gallery_media (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, media_id INT DEFAULT NULL, position INT NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_80D4C5414E7AF8F (gallery_id), INDEX IDX_80D4C541EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media__media (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, enabled TINYINT(1) NOT NULL, provider_name VARCHAR(255) NOT NULL, provider_status INT NOT NULL, provider_reference VARCHAR(255) NOT NULL, provider_metadata LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', width INT DEFAULT NULL, height INT DEFAULT NULL, length NUMERIC(10, 0) DEFAULT NULL, content_type VARCHAR(255) DEFAULT NULL, content_size INT DEFAULT NULL, copyright VARCHAR(255) DEFAULT NULL, author_name VARCHAR(255) DEFAULT NULL, context VARCHAR(64) DEFAULT NULL, cdn_is_flushable TINYINT(1) DEFAULT NULL, cdn_flush_identifier VARCHAR(64) DEFAULT NULL, cdn_flush_at DATETIME DEFAULT NULL, cdn_status INT DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_5C6DD74E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__category (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_43629B36727ACA70 (parent_id), INDEX IDX_43629B36E25D857E (context), INDEX IDX_43629B36EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__collection (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_A406B56AE25D857E (context), INDEX IDX_A406B56AEA9FDD75 (media_id), UNIQUE INDEX tag_collection (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__context (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification__tag (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CA57A1C7E25D857E (context), UNIQUE INDEX tag_context (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_583D1F3E5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, date_of_birth DATETIME DEFAULT NULL, firstname VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, website VARCHAR(64) DEFAULT NULL, biography VARCHAR(1000) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, locale VARCHAR(8) DEFAULT NULL, timezone VARCHAR(64) DEFAULT NULL, phone VARCHAR(64) DEFAULT NULL, facebook_uid VARCHAR(255) DEFAULT NULL, facebook_name VARCHAR(255) DEFAULT NULL, facebook_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', twitter_uid VARCHAR(255) DEFAULT NULL, twitter_name VARCHAR(255) DEFAULT NULL, twitter_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', gplus_uid VARCHAR(255) DEFAULT NULL, gplus_name VARCHAR(255) DEFAULT NULL, gplus_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', token VARCHAR(255) DEFAULT NULL, two_step_code VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C560D76192FC23A8 (username_canonical), UNIQUE INDEX UNIQ_C560D761A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user_user_group (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_B3C77447A76ED395 (user_id), INDEX IDX_B3C77447FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, date DATE NOT NULL, members INT NOT NULL, description LONGTEXT DEFAULT NULL, goal VARCHAR(255) DEFAULT NULL, field_of_activity VARCHAR(255) DEFAULT NULL, average_age VARCHAR(255) DEFAULT NULL, liked_projects LONGTEXT DEFAULT NULL, disliked_projects LONGTEXT DEFAULT NULL, ideas LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_photos (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, project_id INT DEFAULT NULL, sort_order INT DEFAULT NULL, INDEX IDX_1FD20B933DA5256D (image_id), INDEX IDX_1FD20B93166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, photo_id INT DEFAULT NULL, author VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, position_in_company VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, sort_order INT DEFAULT NULL, INDEX IDX_6970EB0F166D1F9C (project_id), INDEX IDX_6970EB0F7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stages (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, sort_order INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teammates (id INT AUTO_INCREMENT NOT NULL, photo_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, sign LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, sort_order INT DEFAULT NULL, INDEX IDX_2AA02F0F7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE about (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT NOT NULL, left_column LONGTEXT NOT NULL, right_column LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, row INT DEFAULT NULL, sort_order INT DEFAULT NULL, INDEX IDX_C82E743DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, slider_small_image_id INT DEFAULT NULL, slider_large_image_id INT DEFAULT NULL, header_background_image_id INT DEFAULT NULL, description_background_image_id INT DEFAULT NULL, stripe_background_image_id INT DEFAULT NULL, form_background_image_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, is_in_slider TINYINT(1) NOT NULL, slider_annotation VARCHAR(255) NOT NULL, slider_description LONGTEXT NOT NULL, video_id LONGTEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, members VARCHAR(255) NOT NULL, place VARCHAR(255) NOT NULL, movement_type VARCHAR(255) NOT NULL, duration VARCHAR(255) NOT NULL, gadget VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, color VARCHAR(255) NOT NULL, sort_order INT DEFAULT NULL, UNIQUE INDEX UNIQ_5C93B3A4989D9B62 (slug), INDEX IDX_5C93B3A4BA8A7AC0 (slider_small_image_id), INDEX IDX_5C93B3A4B4A4D823 (slider_large_image_id), INDEX IDX_5C93B3A4EA8139B4 (header_background_image_id), INDEX IDX_5C93B3A46A222D67 (description_background_image_id), INDEX IDX_5C93B3A466AFE2A9 (stripe_background_image_id), INDEX IDX_5C93B3A421241CF7 (form_background_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_categories (project_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_22553D5A166D1F9C (project_id), INDEX IDX_22553D5A12469DE2 (category_id), PRIMARY KEY(project_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_stages (project_id INT NOT NULL, stage_id INT NOT NULL, INDEX IDX_EE56F69B166D1F9C (project_id), UNIQUE INDEX UNIQ_EE56F69B2298D193 (stage_id), PRIMARY KEY(project_id, stage_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, icon LONGTEXT NOT NULL, is_active TINYINT(1) NOT NULL, sort_order INT DEFAULT NULL, UNIQUE INDEX UNIQ_3AF34668989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_classes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, class_type VARCHAR(200) NOT NULL, UNIQUE INDEX UNIQ_69DD750638A36066 (class_type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_security_identities (id INT UNSIGNED AUTO_INCREMENT NOT NULL, identifier VARCHAR(200) NOT NULL, username TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8835EE78772E836AF85E0677 (identifier, username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_object_identities (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_object_identity_id INT UNSIGNED DEFAULT NULL, class_id INT UNSIGNED NOT NULL, object_identifier VARCHAR(100) NOT NULL, entries_inheriting TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_9407E5494B12AD6EA000B10 (object_identifier, class_id), INDEX IDX_9407E54977FA751A (parent_object_identity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_object_identity_ancestors (object_identity_id INT UNSIGNED NOT NULL, ancestor_id INT UNSIGNED NOT NULL, INDEX IDX_825DE2993D9AB4A6 (object_identity_id), INDEX IDX_825DE299C671CEA1 (ancestor_id), PRIMARY KEY(object_identity_id, ancestor_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_entries (id INT UNSIGNED AUTO_INCREMENT NOT NULL, class_id INT UNSIGNED NOT NULL, object_identity_id INT UNSIGNED DEFAULT NULL, security_identity_id INT UNSIGNED NOT NULL, field_name VARCHAR(50) DEFAULT NULL, ace_order SMALLINT UNSIGNED NOT NULL, mask INT NOT NULL, granting TINYINT(1) NOT NULL, granting_strategy VARCHAR(30) NOT NULL, audit_success TINYINT(1) NOT NULL, audit_failure TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4 (class_id, object_identity_id, field_name, ace_order), INDEX IDX_46C8B806EA000B103D9AB4A6DF9183C9 (class_id, object_identity_id, security_identity_id), INDEX IDX_46C8B806EA000B10 (class_id), INDEX IDX_46C8B8063D9AB4A6 (object_identity_id), INDEX IDX_46C8B806DF9183C9 (security_identity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C5414E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id)');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C541EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE media__media ADD CONSTRAINT FK_5C6DD74E12469DE2 FOREIGN KEY (category_id) REFERENCES classification__category (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE classification__category ADD CONSTRAINT FK_43629B36727ACA70 FOREIGN KEY (parent_id) REFERENCES classification__category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classification__category ADD CONSTRAINT FK_43629B36E25D857E FOREIGN KEY (context) REFERENCES classification__context (id)');
        $this->addSql('ALTER TABLE classification__category ADD CONSTRAINT FK_43629B36EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE classification__collection ADD CONSTRAINT FK_A406B56AE25D857E FOREIGN KEY (context) REFERENCES classification__context (id)');
        $this->addSql('ALTER TABLE classification__collection ADD CONSTRAINT FK_A406B56AEA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE classification__tag ADD CONSTRAINT FK_CA57A1C7E25D857E FOREIGN KEY (context) REFERENCES classification__context (id)');
        $this->addSql('ALTER TABLE fos_user_user_group ADD CONSTRAINT FK_B3C77447A76ED395 FOREIGN KEY (user_id) REFERENCES fos_user_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fos_user_user_group ADD CONSTRAINT FK_B3C77447FE54D947 FOREIGN KEY (group_id) REFERENCES fos_user_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_photos ADD CONSTRAINT FK_1FD20B933DA5256D FOREIGN KEY (image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE project_photos ADD CONSTRAINT FK_1FD20B93166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0F7E9E4C8C FOREIGN KEY (photo_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE teammates ADD CONSTRAINT FK_2AA02F0F7E9E4C8C FOREIGN KEY (photo_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E743DA5256D FOREIGN KEY (image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4BA8A7AC0 FOREIGN KEY (slider_small_image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4B4A4D823 FOREIGN KEY (slider_large_image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4EA8139B4 FOREIGN KEY (header_background_image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A46A222D67 FOREIGN KEY (description_background_image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A466AFE2A9 FOREIGN KEY (stripe_background_image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A421241CF7 FOREIGN KEY (form_background_image_id) REFERENCES media__media (id)');
        $this->addSql('ALTER TABLE project_categories ADD CONSTRAINT FK_22553D5A166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE project_categories ADD CONSTRAINT FK_22553D5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE projects_stages ADD CONSTRAINT FK_EE56F69B166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE projects_stages ADD CONSTRAINT FK_EE56F69B2298D193 FOREIGN KEY (stage_id) REFERENCES stages (id)');
        $this->addSql('ALTER TABLE acl_object_identities ADD CONSTRAINT FK_9407E54977FA751A FOREIGN KEY (parent_object_identity_id) REFERENCES acl_object_identities (id)');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors ADD CONSTRAINT FK_825DE2993D9AB4A6 FOREIGN KEY (object_identity_id) REFERENCES acl_object_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors ADD CONSTRAINT FK_825DE299C671CEA1 FOREIGN KEY (ancestor_id) REFERENCES acl_object_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_entries ADD CONSTRAINT FK_46C8B806EA000B10 FOREIGN KEY (class_id) REFERENCES acl_classes (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_entries ADD CONSTRAINT FK_46C8B8063D9AB4A6 FOREIGN KEY (object_identity_id) REFERENCES acl_object_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_entries ADD CONSTRAINT FK_46C8B806DF9183C9 FOREIGN KEY (security_identity_id) REFERENCES acl_security_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C5414E7AF8F');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C541EA9FDD75');
        $this->addSql('ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36EA9FDD75');
        $this->addSql('ALTER TABLE classification__collection DROP FOREIGN KEY FK_A406B56AEA9FDD75');
        $this->addSql('ALTER TABLE project_photos DROP FOREIGN KEY FK_1FD20B933DA5256D');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F7E9E4C8C');
        $this->addSql('ALTER TABLE teammates DROP FOREIGN KEY FK_2AA02F0F7E9E4C8C');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E743DA5256D');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4BA8A7AC0');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4B4A4D823');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4EA8139B4');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A46A222D67');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A466AFE2A9');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A421241CF7');
        $this->addSql('ALTER TABLE media__media DROP FOREIGN KEY FK_5C6DD74E12469DE2');
        $this->addSql('ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36727ACA70');
        $this->addSql('ALTER TABLE classification__category DROP FOREIGN KEY FK_43629B36E25D857E');
        $this->addSql('ALTER TABLE classification__collection DROP FOREIGN KEY FK_A406B56AE25D857E');
        $this->addSql('ALTER TABLE classification__tag DROP FOREIGN KEY FK_CA57A1C7E25D857E');
        $this->addSql('ALTER TABLE fos_user_user_group DROP FOREIGN KEY FK_B3C77447FE54D947');
        $this->addSql('ALTER TABLE fos_user_user_group DROP FOREIGN KEY FK_B3C77447A76ED395');
        $this->addSql('ALTER TABLE projects_stages DROP FOREIGN KEY FK_EE56F69B2298D193');
        $this->addSql('ALTER TABLE project_photos DROP FOREIGN KEY FK_1FD20B93166D1F9C');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0F166D1F9C');
        $this->addSql('ALTER TABLE project_categories DROP FOREIGN KEY FK_22553D5A166D1F9C');
        $this->addSql('ALTER TABLE projects_stages DROP FOREIGN KEY FK_EE56F69B166D1F9C');
        $this->addSql('ALTER TABLE project_categories DROP FOREIGN KEY FK_22553D5A12469DE2');
        $this->addSql('ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B806EA000B10');
        $this->addSql('ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B806DF9183C9');
        $this->addSql('ALTER TABLE acl_object_identities DROP FOREIGN KEY FK_9407E54977FA751A');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors DROP FOREIGN KEY FK_825DE2993D9AB4A6');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors DROP FOREIGN KEY FK_825DE299C671CEA1');
        $this->addSql('ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B8063D9AB4A6');
        $this->addSql('DROP TABLE media__gallery');
        $this->addSql('DROP TABLE media__gallery_media');
        $this->addSql('DROP TABLE media__media');
        $this->addSql('DROP TABLE classification__category');
        $this->addSql('DROP TABLE classification__collection');
        $this->addSql('DROP TABLE classification__context');
        $this->addSql('DROP TABLE classification__tag');
        $this->addSql('DROP TABLE fos_user_group');
        $this->addSql('DROP TABLE fos_user_user');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE project_photos');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE stages');
        $this->addSql('DROP TABLE teammates');
        $this->addSql('DROP TABLE about');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE project_categories');
        $this->addSql('DROP TABLE projects_stages');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE acl_classes');
        $this->addSql('DROP TABLE acl_security_identities');
        $this->addSql('DROP TABLE acl_object_identities');
        $this->addSql('DROP TABLE acl_object_identity_ancestors');
        $this->addSql('DROP TABLE acl_entries');
    }
}
