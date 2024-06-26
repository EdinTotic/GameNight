<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429153204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gamenight_snacks CHANGE fk_user_id_id fk_user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gamenight_tags CHANGE fk_gamenight_id_id fk_gamenight_id_id INT DEFAULT NULL, CHANGE fk_tag_id_id fk_tag_id_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gamenight_snacks CHANGE fk_user_id_id fk_user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE gamenight_tags CHANGE fk_gamenight_id_id fk_gamenight_id_id INT NOT NULL, CHANGE fk_tag_id_id fk_tag_id_id INT NOT NULL');
    }
}
