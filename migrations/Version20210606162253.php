<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210606162253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contenido (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(500) NOT NULL, descripcion LONGTEXT NOT NULL, fecha_creacion DATETIME NOT NULL, fecha_actualizacion DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apunte ADD contenido_id INT NOT NULL');
        $this->addSql('ALTER TABLE apunte ADD CONSTRAINT FK_E39B0232A9276E6C FOREIGN KEY (tipo_id) REFERENCES apunte_tipo (id)');
        $this->addSql('ALTER TABLE apunte ADD CONSTRAINT FK_E39B02327FDA517C FOREIGN KEY (contenido_id) REFERENCES contenido (id)');
        $this->addSql('CREATE INDEX IDX_E39B02327FDA517C ON apunte (contenido_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apunte DROP FOREIGN KEY FK_E39B02327FDA517C');
        $this->addSql('DROP TABLE contenido');
        $this->addSql('ALTER TABLE apunte DROP FOREIGN KEY FK_E39B0232A9276E6C');
        $this->addSql('DROP INDEX IDX_E39B02327FDA517C ON apunte');
        $this->addSql('ALTER TABLE apunte DROP contenido_id');
    }
}
