<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220627125748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE global_settings ADD alert_mail TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE sensors ADD libelle VARCHAR(255) NOT NULL, CHANGE type_id type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE survey_mode ADD libelle VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE global_settings DROP alert_mail');
        $this->addSql('ALTER TABLE sensors DROP libelle, CHANGE type_id type_id INT NOT NULL');
        $this->addSql('ALTER TABLE survey_mode DROP libelle');
    }
}
