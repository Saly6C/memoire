<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216143010 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facturation ADD consultation_id INT NOT NULL');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17EB513A62FF6CDF ON facturation (consultation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A62FF6CDF');
        $this->addSql('DROP INDEX UNIQ_17EB513A62FF6CDF ON facturation');
        $this->addSql('ALTER TABLE facturation DROP consultation_id');
    }
}
