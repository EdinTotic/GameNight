<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429151706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, fk_game_id_id INT NOT NULL, fk_user_id_id INT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_5F9E962ABD192D4B (fk_game_id_id), INDEX IDX_5F9E962A6DE8AF9C (fk_user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE create_gn (id INT AUTO_INCREMENT NOT NULL, gn_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamenight (id INT AUTO_INCREMENT NOT NULL, fk_game_id_id INT NOT NULL, fk_user_id_id INT NOT NULL, date DATETIME NOT NULL, location VARCHAR(255) NOT NULL, gn_name VARCHAR(255) NOT NULL, gn_description LONGTEXT NOT NULL, gn_image VARCHAR(255) NOT NULL, INDEX IDX_A7EA13A0BD192D4B (fk_game_id_id), INDEX IDX_A7EA13A06DE8AF9C (fk_user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamenight_participant (id INT AUTO_INCREMENT NOT NULL, fk_user_id_id INT NOT NULL, fk_gamenight_id_id INT DEFAULT NULL, INDEX IDX_66C5BDA06DE8AF9C (fk_user_id_id), INDEX IDX_66C5BDA0777630FB (fk_gamenight_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamenight_snacks (id INT AUTO_INCREMENT NOT NULL, fk_gamenight_id_id INT NOT NULL, fk_snack_id_id INT NOT NULL, fk_user_id_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_157ADA0F777630FB (fk_gamenight_id_id), INDEX IDX_157ADA0F72ECE421 (fk_snack_id_id), INDEX IDX_157ADA0F6DE8AF9C (fk_user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamenight_tags (id INT AUTO_INCREMENT NOT NULL, fk_gamenight_id_id INT NOT NULL, fk_tag_id_id INT NOT NULL, INDEX IDX_4521FC82777630FB (fk_gamenight_id_id), INDEX IDX_4521FC823CF150C1 (fk_tag_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invites (id INT AUTO_INCREMENT NOT NULL, fk_user_inviter_id INT NOT NULL, fk_user_invitee_id INT NOT NULL, fk_gamenight_id_id INT NOT NULL, status VARCHAR(50) NOT NULL, date DATETIME NOT NULL, type VARCHAR(50) NOT NULL, INDEX IDX_37E6A6CC95BDDDD (fk_user_inviter_id), INDEX IDX_37E6A6C495B2FB (fk_user_invitee_id), INDEX IDX_37E6A6C777630FB (fk_gamenight_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, fk_game_id_id INT NOT NULL, fk_user_id_id INT NOT NULL, rating INT NOT NULL, INDEX IDX_D8892622BD192D4B (fk_game_id_id), INDEX IDX_D88926226DE8AF9C (fk_user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE snacks (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(50) NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, banned TINYINT(1) NOT NULL, banned_duration DATETIME DEFAULT NULL, user_image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962ABD192D4B FOREIGN KEY (fk_game_id_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A6DE8AF9C FOREIGN KEY (fk_user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE gamenight ADD CONSTRAINT FK_A7EA13A0BD192D4B FOREIGN KEY (fk_game_id_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE gamenight ADD CONSTRAINT FK_A7EA13A06DE8AF9C FOREIGN KEY (fk_user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE gamenight_participant ADD CONSTRAINT FK_66C5BDA06DE8AF9C FOREIGN KEY (fk_user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE gamenight_participant ADD CONSTRAINT FK_66C5BDA0777630FB FOREIGN KEY (fk_gamenight_id_id) REFERENCES gamenight (id)');
        $this->addSql('ALTER TABLE gamenight_snacks ADD CONSTRAINT FK_157ADA0F777630FB FOREIGN KEY (fk_gamenight_id_id) REFERENCES gamenight (id)');
        $this->addSql('ALTER TABLE gamenight_snacks ADD CONSTRAINT FK_157ADA0F72ECE421 FOREIGN KEY (fk_snack_id_id) REFERENCES snacks (id)');
        $this->addSql('ALTER TABLE gamenight_snacks ADD CONSTRAINT FK_157ADA0F6DE8AF9C FOREIGN KEY (fk_user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE gamenight_tags ADD CONSTRAINT FK_4521FC82777630FB FOREIGN KEY (fk_gamenight_id_id) REFERENCES gamenight (id)');
        $this->addSql('ALTER TABLE gamenight_tags ADD CONSTRAINT FK_4521FC823CF150C1 FOREIGN KEY (fk_tag_id_id) REFERENCES tags (id)');
        $this->addSql('ALTER TABLE invites ADD CONSTRAINT FK_37E6A6CC95BDDDD FOREIGN KEY (fk_user_inviter_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE invites ADD CONSTRAINT FK_37E6A6C495B2FB FOREIGN KEY (fk_user_invitee_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE invites ADD CONSTRAINT FK_37E6A6C777630FB FOREIGN KEY (fk_gamenight_id_id) REFERENCES gamenight (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622BD192D4B FOREIGN KEY (fk_game_id_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D88926226DE8AF9C FOREIGN KEY (fk_user_id_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962ABD192D4B');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A6DE8AF9C');
        $this->addSql('ALTER TABLE gamenight DROP FOREIGN KEY FK_A7EA13A0BD192D4B');
        $this->addSql('ALTER TABLE gamenight DROP FOREIGN KEY FK_A7EA13A06DE8AF9C');
        $this->addSql('ALTER TABLE gamenight_participant DROP FOREIGN KEY FK_66C5BDA06DE8AF9C');
        $this->addSql('ALTER TABLE gamenight_participant DROP FOREIGN KEY FK_66C5BDA0777630FB');
        $this->addSql('ALTER TABLE gamenight_snacks DROP FOREIGN KEY FK_157ADA0F777630FB');
        $this->addSql('ALTER TABLE gamenight_snacks DROP FOREIGN KEY FK_157ADA0F72ECE421');
        $this->addSql('ALTER TABLE gamenight_snacks DROP FOREIGN KEY FK_157ADA0F6DE8AF9C');
        $this->addSql('ALTER TABLE gamenight_tags DROP FOREIGN KEY FK_4521FC82777630FB');
        $this->addSql('ALTER TABLE gamenight_tags DROP FOREIGN KEY FK_4521FC823CF150C1');
        $this->addSql('ALTER TABLE invites DROP FOREIGN KEY FK_37E6A6CC95BDDDD');
        $this->addSql('ALTER TABLE invites DROP FOREIGN KEY FK_37E6A6C495B2FB');
        $this->addSql('ALTER TABLE invites DROP FOREIGN KEY FK_37E6A6C777630FB');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622BD192D4B');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D88926226DE8AF9C');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE create_gn');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE gamenight');
        $this->addSql('DROP TABLE gamenight_participant');
        $this->addSql('DROP TABLE gamenight_snacks');
        $this->addSql('DROP TABLE gamenight_tags');
        $this->addSql('DROP TABLE invites');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE snacks');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
