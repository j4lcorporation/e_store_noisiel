<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201119081118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sondage (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagiaire (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, prenom VARCHAR(35) NOT NULL, INDEX IDX_4F62F7314DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagiaire_sondage (stagiaire_id INT NOT NULL, sondage_id INT NOT NULL, INDEX IDX_76101F9FBBA93DD6 (stagiaire_id), INDEX IDX_76101F9FBAF4AE56 (sondage_id), PRIMARY KEY(stagiaire_id, sondage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F7314DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE stagiaire_sondage ADD CONSTRAINT FK_76101F9FBBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stagiaire_sondage ADD CONSTRAINT FK_76101F9FBAF4AE56 FOREIGN KEY (sondage_id) REFERENCES sondage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F7314DE7DC5C');
        $this->addSql('ALTER TABLE stagiaire_sondage DROP FOREIGN KEY FK_76101F9FBAF4AE56');
        $this->addSql('ALTER TABLE stagiaire_sondage DROP FOREIGN KEY FK_76101F9FBBA93DD6');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE sondage');
        $this->addSql('DROP TABLE stagiaire');
        $this->addSql('DROP TABLE stagiaire_sondage');
    }
}
