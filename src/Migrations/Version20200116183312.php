<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200116183312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation CHANGE facturation_id facturation_id INT DEFAULT NULL, CHANGE date_sortie date_sortie DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE consultation CHANGE rendez_vous_id rendez_vous_id INT DEFAULT NULL, CHANGE prochain_rv prochain_rv VARCHAR(255) DEFAULT NULL, CHANGE autre autre VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE facturation CHANGE consultation_id consultation_id INT DEFAULT NULL, CHANGE montant_paye montant_paye INT DEFAULT NULL, CHANGE remise remise INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consultation CHANGE rendez_vous_id rendez_vous_id INT DEFAULT NULL, CHANGE prochain_rv prochain_rv VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE autre autre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE facturation CHANGE consultation_id consultation_id INT DEFAULT NULL, CHANGE montant_paye montant_paye INT DEFAULT NULL, CHANGE remise remise INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospitalisation CHANGE facturation_id facturation_id INT DEFAULT NULL, CHANGE date_sortie date_sortie DATE NOT NULL');
    }
}
