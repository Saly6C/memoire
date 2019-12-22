<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191222123926 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation ADD nom_demandeur VARCHAR(255) NOT NULL, ADD piece_du_malade LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD piece_du_demandeur LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD numero_piece_malade INT NOT NULL, ADD numero_piece_demandeur INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation DROP nom_demandeur, DROP piece_du_malade, DROP piece_du_demandeur, DROP numero_piece_malade, DROP numero_piece_demandeur');
    }
}
