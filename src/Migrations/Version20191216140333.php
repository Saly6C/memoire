<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216140333 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation DROP FOREIGN KEY FK_67C059592680A339');
        $this->addSql('DROP INDEX IDX_67C059592680A339 ON hospitalisation');
        $this->addSql('ALTER TABLE hospitalisation CHANGE chambre_id_id chambre_id INT NOT NULL');
        $this->addSql('ALTER TABLE hospitalisation ADD CONSTRAINT FK_67C059599B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('CREATE INDEX IDX_67C059599B177F54 ON hospitalisation (chambre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation DROP FOREIGN KEY FK_67C059599B177F54');
        $this->addSql('DROP INDEX IDX_67C059599B177F54 ON hospitalisation');
        $this->addSql('ALTER TABLE hospitalisation CHANGE chambre_id chambre_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE hospitalisation ADD CONSTRAINT FK_67C059592680A339 FOREIGN KEY (chambre_id_id) REFERENCES chambre (id)');
        $this->addSql('CREATE INDEX IDX_67C059592680A339 ON hospitalisation (chambre_id_id)');
    }
}
