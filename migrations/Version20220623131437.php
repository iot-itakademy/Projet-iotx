<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623131437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE global_settings ADD mode_de_surveillance_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE global_settings ADD CONSTRAINT FK_3223F6EB3F75B3D5 FOREIGN KEY (mode_de_surveillance_id_id) REFERENCES mode_surveillance (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3223F6EB3F75B3D5 ON global_settings (mode_de_surveillance_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE global_settings DROP FOREIGN KEY FK_3223F6EB3F75B3D5');
        $this->addSql('DROP INDEX UNIQ_3223F6EB3F75B3D5 ON global_settings');
        $this->addSql('ALTER TABLE global_settings DROP mode_de_surveillance_id_id');
    }
}
