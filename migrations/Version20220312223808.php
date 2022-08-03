<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220312223808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE falcute (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, relation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagiaire_type (id INT AUTO_INCREMENT NOT NULL, stagiaire_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_6AB9D49E2AA7DFFB (stagiaire_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE victime (id INT AUTO_INCREMENT NOT NULL, relation_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_AD6D2E393256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagiaire_type ADD CONSTRAINT FK_6AB9D49E2AA7DFFB FOREIGN KEY (stagiaire_id_id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE victime ADD CONSTRAINT FK_AD6D2E393256915B FOREIGN KEY (relation_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE falcute');
        $this->addSql('DROP TABLE stagiaire_type');
        $this->addSql('DROP TABLE victime');
    }
}