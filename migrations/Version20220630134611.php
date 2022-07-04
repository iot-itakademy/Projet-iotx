<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220630134611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE global_settings ADD CONSTRAINT FK_3223F6EB33C9A6F1 FOREIGN KEY (survey_mode_id) REFERENCES survey_mode (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3223F6EB33C9A6F1 ON global_settings (survey_mode_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE global_settings DROP FOREIGN KEY FK_3223F6EB33C9A6F1');
        $this->addSql('DROP INDEX UNIQ_3223F6EB33C9A6F1 ON global_settings');
    }
}
