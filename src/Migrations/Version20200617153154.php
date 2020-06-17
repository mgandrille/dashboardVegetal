<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617153154 extends AbstractMigration
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
        $this->addSql('CREATE TABLE carve (id INT AUTO_INCREMENT NOT NULL, month VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carve_plantes (carve_id INT NOT NULL, plantes_id INT NOT NULL, INDEX IDX_A6DA5536B3079DD6 (carve_id), INDEX IDX_A6DA553649B7AC79 (plantes_id), PRIMARY KEY(carve_id, plantes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, categories VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cutting (id INT AUTO_INCREMENT NOT NULL, month VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cutting_plantes (cutting_id INT NOT NULL, plantes_id INT NOT NULL, INDEX IDX_8965729A655B7EEB (cutting_id), INDEX IDX_8965729A49B7AC79 (plantes_id), PRIMARY KEY(cutting_id, plantes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dashboard (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_5C94FFF8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dashboard_plantes (dashboard_id INT NOT NULL, plantes_id INT NOT NULL, INDEX IDX_4203B37CB9D04D2B (dashboard_id), INDEX IDX_4203B37C49B7AC79 (plantes_id), PRIMARY KEY(dashboard_id, plantes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE difficulty (id INT AUTO_INCREMENT NOT NULL, level VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flowering (id INT AUTO_INCREMENT NOT NULL, month VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flowering_plantes (flowering_id INT NOT NULL, plantes_id INT NOT NULL, INDEX IDX_FFDC897F87AED162 (flowering_id), INDEX IDX_FFDC897F49B7AC79 (plantes_id), PRIMARY KEY(flowering_id, plantes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plantes (id INT AUTO_INCREMENT NOT NULL, watering_id INT DEFAULT NULL, sunshine_id INT DEFAULT NULL, difficulty_id INT DEFAULT NULL, type_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, species VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_F3E76151FA0020F0 (watering_id), INDEX IDX_F3E761518E0189A8 (sunshine_id), INDEX IDX_F3E76151FCFA9DAE (difficulty_id), INDEX IDX_F3E76151C54C8C93 (type_id), INDEX IDX_F3E7615112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE potting (id INT AUTO_INCREMENT NOT NULL, month VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE potting_plantes (potting_id INT NOT NULL, plantes_id INT NOT NULL, INDEX IDX_68FF615B902C8CEF (potting_id), INDEX IDX_68FF615B49B7AC79 (plantes_id), PRIMARY KEY(potting_id, plantes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sunshine (id INT AUTO_INCREMENT NOT NULL, exposure VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, plante_type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watering (id INT AUTO_INCREMENT NOT NULL, frequency VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arrosed ADD CONSTRAINT FK_12F28CB5177B16E8 FOREIGN KEY (plante_id) REFERENCES plantes (id)');
        $this->addSql('ALTER TABLE arrosed ADD CONSTRAINT FK_12F28CB5B9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id)');
        $this->addSql('ALTER TABLE carve_plantes ADD CONSTRAINT FK_A6DA5536B3079DD6 FOREIGN KEY (carve_id) REFERENCES carve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carve_plantes ADD CONSTRAINT FK_A6DA553649B7AC79 FOREIGN KEY (plantes_id) REFERENCES plantes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cutting_plantes ADD CONSTRAINT FK_8965729A655B7EEB FOREIGN KEY (cutting_id) REFERENCES cutting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cutting_plantes ADD CONSTRAINT FK_8965729A49B7AC79 FOREIGN KEY (plantes_id) REFERENCES plantes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dashboard ADD CONSTRAINT FK_5C94FFF8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dashboard_plantes ADD CONSTRAINT FK_4203B37CB9D04D2B FOREIGN KEY (dashboard_id) REFERENCES dashboard (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dashboard_plantes ADD CONSTRAINT FK_4203B37C49B7AC79 FOREIGN KEY (plantes_id) REFERENCES plantes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE flowering_plantes ADD CONSTRAINT FK_FFDC897F87AED162 FOREIGN KEY (flowering_id) REFERENCES flowering (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE flowering_plantes ADD CONSTRAINT FK_FFDC897F49B7AC79 FOREIGN KEY (plantes_id) REFERENCES plantes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plantes ADD CONSTRAINT FK_F3E76151FA0020F0 FOREIGN KEY (watering_id) REFERENCES watering (id)');
        $this->addSql('ALTER TABLE plantes ADD CONSTRAINT FK_F3E761518E0189A8 FOREIGN KEY (sunshine_id) REFERENCES sunshine (id)');
        $this->addSql('ALTER TABLE plantes ADD CONSTRAINT FK_F3E76151FCFA9DAE FOREIGN KEY (difficulty_id) REFERENCES difficulty (id)');
        $this->addSql('ALTER TABLE plantes ADD CONSTRAINT FK_F3E76151C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE plantes ADD CONSTRAINT FK_F3E7615112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE potting_plantes ADD CONSTRAINT FK_68FF615B902C8CEF FOREIGN KEY (potting_id) REFERENCES potting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE potting_plantes ADD CONSTRAINT FK_68FF615B49B7AC79 FOREIGN KEY (plantes_id) REFERENCES plantes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carve_plantes DROP FOREIGN KEY FK_A6DA5536B3079DD6');
        $this->addSql('ALTER TABLE plantes DROP FOREIGN KEY FK_F3E7615112469DE2');
        $this->addSql('ALTER TABLE cutting_plantes DROP FOREIGN KEY FK_8965729A655B7EEB');
        $this->addSql('ALTER TABLE arrosed DROP FOREIGN KEY FK_12F28CB5B9D04D2B');
        $this->addSql('ALTER TABLE dashboard_plantes DROP FOREIGN KEY FK_4203B37CB9D04D2B');
        $this->addSql('ALTER TABLE plantes DROP FOREIGN KEY FK_F3E76151FCFA9DAE');
        $this->addSql('ALTER TABLE flowering_plantes DROP FOREIGN KEY FK_FFDC897F87AED162');
        $this->addSql('ALTER TABLE arrosed DROP FOREIGN KEY FK_12F28CB5177B16E8');
        $this->addSql('ALTER TABLE carve_plantes DROP FOREIGN KEY FK_A6DA553649B7AC79');
        $this->addSql('ALTER TABLE cutting_plantes DROP FOREIGN KEY FK_8965729A49B7AC79');
        $this->addSql('ALTER TABLE dashboard_plantes DROP FOREIGN KEY FK_4203B37C49B7AC79');
        $this->addSql('ALTER TABLE flowering_plantes DROP FOREIGN KEY FK_FFDC897F49B7AC79');
        $this->addSql('ALTER TABLE potting_plantes DROP FOREIGN KEY FK_68FF615B49B7AC79');
        $this->addSql('ALTER TABLE potting_plantes DROP FOREIGN KEY FK_68FF615B902C8CEF');
        $this->addSql('ALTER TABLE plantes DROP FOREIGN KEY FK_F3E761518E0189A8');
        $this->addSql('ALTER TABLE plantes DROP FOREIGN KEY FK_F3E76151C54C8C93');
        $this->addSql('ALTER TABLE dashboard DROP FOREIGN KEY FK_5C94FFF8A76ED395');
        $this->addSql('ALTER TABLE plantes DROP FOREIGN KEY FK_F3E76151FA0020F0');
        $this->addSql('DROP TABLE arrosed');
        $this->addSql('DROP TABLE carve');
        $this->addSql('DROP TABLE carve_plantes');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE cutting');
        $this->addSql('DROP TABLE cutting_plantes');
        $this->addSql('DROP TABLE dashboard');
        $this->addSql('DROP TABLE dashboard_plantes');
        $this->addSql('DROP TABLE difficulty');
        $this->addSql('DROP TABLE flowering');
        $this->addSql('DROP TABLE flowering_plantes');
        $this->addSql('DROP TABLE plantes');
        $this->addSql('DROP TABLE potting');
        $this->addSql('DROP TABLE potting_plantes');
        $this->addSql('DROP TABLE sunshine');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE watering');
    }
}
