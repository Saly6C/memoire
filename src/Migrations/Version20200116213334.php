<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200116213334 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hospitalisation CHANGE facturation_id facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facturation ADD hospitalisation_id INT DEFAULT NULL, CHANGE consultation_id consultation_id INT DEFAULT NULL, CHANGE montant_paye montant_paye INT DEFAULT NULL, CHANGE remise remise INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513AF531F4C5 FOREIGN KEY (hospitalisation_id) REFERENCES hospitalisation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17EB513AF531F4C5 ON facturation (hospitalisation_id)');
        $this->addSql('ALTER TABLE consultation CHANGE rendez_vous_id rendez_vous_id INT DEFAULT NULL, CHANGE prochain_rv prochain_rv VARCHAR(255) DEFAULT NULL, CHANGE autre autre VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consultation CHANGE rendez_vous_id rendez_vous_id INT DEFAULT NULL, CHANGE prochain_rv prochain_rv VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE autre autre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513AF531F4C5');
        $this->addSql('DROP INDEX UNIQ_17EB513AF531F4C5 ON facturation');
        $this->addSql('ALTER TABLE facturation DROP hospitalisation_id, CHANGE consultation_id consultation_id INT DEFAULT NULL, CHANGE montant_paye montant_paye INT DEFAULT NULL, CHANGE remise remise INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hospitalisation CHANGE facturation_id facturation_id INT DEFAULT NULL');
    }
}
