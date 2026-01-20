<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260119231452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gym (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, adress VARCHAR(255) DEFAULT NULL, tel INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE membership (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, end_date DATETIME NOT NULL, gym_member_id INT NOT NULL, INDEX IDX_86FFD28585D6E04B (gym_member_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, gym_id INT NOT NULL, INDEX IDX_8D93D649BD2F03 (gym_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE membership ADD CONSTRAINT FK_86FFD28585D6E04B FOREIGN KEY (gym_member_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649BD2F03 FOREIGN KEY (gym_id) REFERENCES gym (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membership DROP FOREIGN KEY FK_86FFD28585D6E04B');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649BD2F03');
        $this->addSql('DROP TABLE gym');
        $this->addSql('DROP TABLE membership');
        $this->addSql('DROP TABLE `user`');
    }
}
