<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616141409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, correo VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, codigo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apunte ADD CONSTRAINT FK_E39B02327FDA517C FOREIGN KEY (contenido_id) REFERENCES contenido (id)');
        $this->addSql('CREATE INDEX IDX_E39B02327FDA517C ON apunte (contenido_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE usuario');
        $this->addSql('ALTER TABLE apunte DROP FOREIGN KEY FK_E39B02327FDA517C');
        $this->addSql('DROP INDEX IDX_E39B02327FDA517C ON apunte');
    }
}
