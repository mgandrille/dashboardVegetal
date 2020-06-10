<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200610095936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, categories VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, plante_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plantes ADD type_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plantes ADD CONSTRAINT FK_F3E76151C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE plantes ADD CONSTRAINT FK_F3E7615112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_F3E76151C54C8C93 ON plantes (type_id)');
        $this->addSql('CREATE INDEX IDX_F3E7615112469DE2 ON plantes (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plantes DROP FOREIGN KEY FK_F3E7615112469DE2');
        $this->addSql('ALTER TABLE plantes DROP FOREIGN KEY FK_F3E76151C54C8C93');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP INDEX IDX_F3E76151C54C8C93 ON plantes');
        $this->addSql('DROP INDEX IDX_F3E7615112469DE2 ON plantes');
        $this->addSql('ALTER TABLE plantes DROP type_id, DROP category_id');
    }
}
