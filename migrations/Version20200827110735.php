<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827110735 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Ressources (id INT AUTO_INCREMENT NOT NULL, penom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, diplomes LONGTEXT DEFAULT NULL, date_de_naissance DATE NOT NULL, lieu_de_naissance VARCHAR(255) NOT NULL, cni INT NOT NULL, photo VARCHAR(255) DEFAULT NULL, statut_dans_entreprise VARCHAR(255) NOT NULL, situation_matrimoniale VARCHAR(255) NOT NULL, ipres DOUBLE PRECISION DEFAULT NULL, css DOUBLE PRECISION DEFAULT NULL, declaration_fiscale DOUBLE PRECISION DEFAULT NULL, impots DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE ressource');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, penom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, matricule VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, diplomes LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_de_naissance DATE NOT NULL, lieu_de_naissance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cni INT NOT NULL, photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, statut_dans_entreprise VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, situation_matrimoniale VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ipres DOUBLE PRECISION DEFAULT NULL, css DOUBLE PRECISION DEFAULT NULL, declaration_fiscale DOUBLE PRECISION DEFAULT NULL, impots DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE Ressources');
    }
}
