<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201118202111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F7313256915B');
        $this->addSql('DROP INDEX IDX_4F62F7313256915B ON stagiaire');
        $this->addSql('ALTER TABLE stagiaire CHANGE relation_id adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F7314DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('CREATE INDEX IDX_4F62F7314DE7DC5C ON stagiaire (adresse_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F7314DE7DC5C');
        $this->addSql('DROP INDEX IDX_4F62F7314DE7DC5C ON stagiaire');
        $this->addSql('ALTER TABLE stagiaire CHANGE adresse_id relation_id INT NOT NULL');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F7313256915B FOREIGN KEY (relation_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4F62F7313256915B ON stagiaire (relation_id)');
    }
}
