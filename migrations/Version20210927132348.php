<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927132348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, tel INT NOT NULL, mail VARCHAR(255) NOT NULL, pass VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encheres (id INT AUTO_INCREMENT NOT NULL, oeuvres_id INT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_8B89031D4928CE22 (oeuvres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenements (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, nom VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_E10AD400642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invites (id INT AUTO_INCREMENT NOT NULL, evenements_id INT NOT NULL, nom VARCHAR(255) NOT NULL, tel INT NOT NULL, mail VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, pass VARCHAR(255) NOT NULL, rgpd VARCHAR(255) NOT NULL, INDEX IDX_37E6A6C63C02CD4 (evenements_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invites_encheres (invites_id INT NOT NULL, encheres_id INT NOT NULL, INDEX IDX_64F65166F232861 (invites_id), INDEX IDX_64F65166CDF69DDF (encheres_id), PRIMARY KEY(invites_id, encheres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvres (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, photo_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_413EEE3EFD02F13 (evenement_id), UNIQUE INDEX UNIQ_413EEE3E7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE encheres ADD CONSTRAINT FK_8B89031D4928CE22 FOREIGN KEY (oeuvres_id) REFERENCES oeuvres (id)');
        $this->addSql('ALTER TABLE evenements ADD CONSTRAINT FK_E10AD400642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE invites ADD CONSTRAINT FK_37E6A6C63C02CD4 FOREIGN KEY (evenements_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE invites_encheres ADD CONSTRAINT FK_64F65166F232861 FOREIGN KEY (invites_id) REFERENCES invites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invites_encheres ADD CONSTRAINT FK_64F65166CDF69DDF FOREIGN KEY (encheres_id) REFERENCES encheres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3EFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenements (id)');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3E7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenements DROP FOREIGN KEY FK_E10AD400642B8210');
        $this->addSql('ALTER TABLE invites_encheres DROP FOREIGN KEY FK_64F65166CDF69DDF');
        $this->addSql('ALTER TABLE invites DROP FOREIGN KEY FK_37E6A6C63C02CD4');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3EFD02F13');
        $this->addSql('ALTER TABLE invites_encheres DROP FOREIGN KEY FK_64F65166F232861');
        $this->addSql('ALTER TABLE encheres DROP FOREIGN KEY FK_8B89031D4928CE22');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3E7E9E4C8C');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE encheres');
        $this->addSql('DROP TABLE evenements');
        $this->addSql('DROP TABLE invites');
        $this->addSql('DROP TABLE invites_encheres');
        $this->addSql('DROP TABLE oeuvres');
        $this->addSql('DROP TABLE photos');
    }
}
