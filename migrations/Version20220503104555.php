<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503104555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE box_cartes DROP FOREIGN KEY box_cartes_ibfk_1');
        $this->addSql('ALTER TABLE cate_dect DROP FOREIGN KEY cate_dect_ibfk_1');
        $this->addSql('ALTER TABLE commande_card DROP FOREIGN KEY commande_card_ibfk_1');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY card_ibfk_1');
        $this->addSql('ALTER TABLE commande_card DROP FOREIGN KEY commande_card_ibfk_2');
        $this->addSql('ALTER TABLE box_cartes DROP FOREIGN KEY box_cartes_ibfk_2');
        $this->addSql('ALTER TABLE cate_dect DROP FOREIGN KEY cate_dect_ibfk_2');
        $this->addSql('DROP TABLE box_cartes');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE card_type');
        $this->addSql('DROP TABLE cate_dect');
        $this->addSql('DROP TABLE commande_card');
        $this->addSql('DROP TABLE commande_container');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE commentaire_box');
        $this->addSql('DROP TABLE commentaire_card');
        $this->addSql('DROP TABLE commentaire_dect');
        $this->addSql('DROP TABLE container');
        $this->addSql('DROP TABLE dect');
        $this->addSql('DROP TABLE dect_commande');
        $this->addSql('DROP TABLE dect_type');
        $this->addSql('ALTER TABLE user CHANGE point point INT NOT NULL, CHANGE solde solde DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE box_cartes (id_carde INT NOT NULL, id_container INT NOT NULL, INDEX id_carde (id_carde), INDEX id_container (id_container), INDEX id_carde_2 (id_carde)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, id_creator INT NOT NULL, id-type INT NOT NULL, name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, creation_date DATE NOT NULL, color TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, state INT NOT NULL, image TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id-type (id-type), INDEX id_creator (id_creator), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE card_type (id INT NOT NULL, labelle TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cate_dect (id_carte INT NOT NULL, id_dect INT NOT NULL, INDEX id_carte (id_carte), INDEX id_dect (id_dect)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commande_card (id_commande INT NOT NULL, id_card INT NOT NULL, quantite INT NOT NULL, INDEX id_commabde (id_commande), INDEX id_card (id_card)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commande_container (id_commande INT NOT NULL, id_container INT NOT NULL, quantite INT NOT NULL, INDEX id_commande (id_commande), INDEX id_container (id_container)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, adresse TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, state INT NOT NULL, date_creation DATE NOT NULL, INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire_box (id INT AUTO_INCREMENT NOT NULL, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_user INT NOT NULL, id_box INT NOT NULL, create-date DATE NOT NULL, INDEX id_box (id_box), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire_card (id INT AUTO_INCREMENT NOT NULL, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id-user INT NOT NULL, id_card INT NOT NULL, create_date DATE NOT NULL, INDEX id_card (id_card), INDEX id-user (id-user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire_dect (id INT AUTO_INCREMENT NOT NULL, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_user INT NOT NULL, id_dect INT NOT NULL, create_date DATE NOT NULL, INDEX id_box (id_dect), INDEX id_user (id_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE container (id INT AUTO_INCREMENT NOT NULL, name TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, creation_date DATE NOT NULL, state INT NOT NULL, creator_id INT NOT NULL, type TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX creator_id (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dect (id INT AUTO_INCREMENT NOT NULL, name TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, creation_date INT NOT NULL, description TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, image TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, state INT NOT NULL, id_creator INT NOT NULL, id_type INT NOT NULL, INDEX id_type (id_type), INDEX id_creator (id_creator), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dect_commande (id_commandes INT NOT NULL, id_dect INT NOT NULL, quantite INT NOT NULL, INDEX id_commandes (id_commandes), INDEX id_dect (id_dect)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE dect_type (id INT AUTO_INCREMENT NOT NULL, libelle TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE box_cartes ADD CONSTRAINT box_cartes_ibfk_1 FOREIGN KEY (id_carde) REFERENCES card (id)');
        $this->addSql('ALTER TABLE box_cartes ADD CONSTRAINT box_cartes_ibfk_2 FOREIGN KEY (id_container) REFERENCES container (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT card_ibfk_1 FOREIGN KEY (id-type) REFERENCES card_type (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT card_ibfk_2 FOREIGN KEY (id_creator) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cate_dect ADD CONSTRAINT cate_dect_ibfk_1 FOREIGN KEY (id_carte) REFERENCES card (id)');
        $this->addSql('ALTER TABLE cate_dect ADD CONSTRAINT cate_dect_ibfk_2 FOREIGN KEY (id_dect) REFERENCES dect (id)');
        $this->addSql('ALTER TABLE commande_card ADD CONSTRAINT commande_card_ibfk_1 FOREIGN KEY (id_card) REFERENCES card (id)');
        $this->addSql('ALTER TABLE commande_card ADD CONSTRAINT commande_card_ibfk_2 FOREIGN KEY (id_commande) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT commandes_ibfk_1 FOREIGN KEY (id_user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user CHANGE point point INT DEFAULT NULL, CHANGE solde solde DOUBLE PRECISION DEFAULT NULL');
    }
}
