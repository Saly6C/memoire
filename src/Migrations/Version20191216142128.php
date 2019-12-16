<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216142128 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation ADD facturation_id INT NOT NULL');
        $this->addSql('ALTER TABLE hospitalisation ADD CONSTRAINT FK_67C05959DBC5F284 FOREIGN KEY (facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67C05959DBC5F284 ON hospitalisation (facturation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation DROP FOREIGN KEY FK_67C05959DBC5F284');
        $this->addSql('DROP INDEX UNIQ_67C05959DBC5F284 ON hospitalisation');
        $this->addSql('ALTER TABLE hospitalisation DROP facturation_id');
    }
}
