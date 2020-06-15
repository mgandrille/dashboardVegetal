<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200615095353 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE arrosed (id INT AUTO_INCREMENT NOT NULL, plante_id INT DEFAULT NULL, dashboard_id INT DEFAULT NULL, arrosed_at DATETIME DEFAULT NULL, INDEX IDX_12F28CB5177B16E8 (plante_id), INDEX IDX_12F28CB5B9D04D2B (dashboard_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrosed ADD CONSTRAINT FK_12F28CB5177B16E8 FOREIGN KEY (plante_id) REFERENCES plantes (id)');
        $this->addSql('ALTER TABLE arrosed ADD CONSTRAINT FK_12F28CB5B9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE arrosed');
    }
}
