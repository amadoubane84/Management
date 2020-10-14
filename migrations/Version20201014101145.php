<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201014101145 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ressources ADD date_embauche DATETIME NOT NULL, ADD date_debut_contrat DATETIME DEFAULT NULL, ADD date_fin_contrat DATETIME DEFAULT NULL, ADD renouvellement INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gestions CHANGE duree duree VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gestions CHANGE duree duree VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE Ressources DROP date_embauche, DROP date_debut_contrat, DROP date_fin_contrat, DROP renouvellement');
    }
}
