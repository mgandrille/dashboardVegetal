<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612134843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dashboard (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_5C94FFF8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dashboard_plantes (dashboard_id INT NOT NULL, plantes_id INT NOT NULL, INDEX IDX_4203B37CB9D04D2B (dashboard_id), INDEX IDX_4203B37C49B7AC79 (plantes_id), PRIMARY KEY(dashboard_id, plantes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dashboard ADD CONSTRAINT FK_5C94FFF8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dashboard_plantes ADD CONSTRAINT FK_4203B37CB9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dashboard_plantes ADD CONSTRAINT FK_4203B37C49B7AC79 FOREIGN KEY (plantes_id) REFERENCES plantes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dashboard_plantes DROP FOREIGN KEY FK_4203B37CB9D04D2B');
        $this->addSql('DROP TABLE dashboard');
        $this->addSql('DROP TABLE dashboard_plantes');
    }
}
