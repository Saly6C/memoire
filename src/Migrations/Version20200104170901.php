<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200104170901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE rendez_vous CHANGE date_rv date_rv DATETIME NOT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE rendez_vous_id rendez_vous_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facturation CHANGE consultation_id consultation_id INT DEFAULT NULL, CHANGE montant_paye montant_paye INT DEFAULT NULL, CHANGE remise remise INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospitalisation CHANGE facturation_id facturation_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consultation CHANGE rendez_vous_id rendez_vous_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facturation CHANGE consultation_id consultation_id INT DEFAULT NULL, CHANGE montant_paye montant_paye INT DEFAULT NULL, CHANGE remise remise INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospitalisation CHANGE facturation_id facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez_vous CHANGE date_rv date_rv DATE NOT NULL');
    }
}
