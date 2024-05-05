<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430064218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gamenight DROP INDEX IDX_A7EA13A06DE8AF9C, ADD UNIQUE INDEX UNIQ_A7EA13A06DE8AF9C (fk_user_id_id)');
        $this->addSql('ALTER TABLE gamenight DROP INDEX IDX_A7EA13A0BD192D4B, ADD UNIQUE INDEX UNIQ_A7EA13A0BD192D4B (fk_game_id_id)');
        $this->addSql('ALTER TABLE gamenight CHANGE fk_game_id_id fk_game_id_id INT DEFAULT NULL, CHANGE gn_image gn_image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE gamenight_snacks CHANGE fk_user_id_id fk_user_id_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gamenight DROP INDEX UNIQ_A7EA13A0BD192D4B, ADD INDEX IDX_A7EA13A0BD192D4B (fk_game_id_id)');
        $this->addSql('ALTER TABLE gamenight DROP INDEX UNIQ_A7EA13A06DE8AF9C, ADD INDEX IDX_A7EA13A06DE8AF9C (fk_user_id_id)');
        $this->addSql('ALTER TABLE gamenight CHANGE fk_game_id_id fk_game_id_id INT NOT NULL, CHANGE gn_image gn_image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gamenight_snacks CHANGE fk_user_id_id fk_user_id_id INT DEFAULT NULL');
    }
}
