<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309081925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certif CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nomcertificateur nomcertificateur VARCHAR(100) NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certif MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE certif DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE certif CHANGE id id INT NOT NULL, CHANGE nomcertificateur nomcertificateur TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
    }
}
