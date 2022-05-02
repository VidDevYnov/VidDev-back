<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325083447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, additional_address VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, article_size_id INT NOT NULL, article_state_id INT NOT NULL, article_type_id INT NOT NULL, article_material_id INT DEFAULT NULL, article_category_id INT NOT NULL, user_id INT NOT NULL, order_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, color VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E66A45FEC90 (article_size_id), INDEX IDX_23A0E665030C8AA (article_state_id), INDEX IDX_23A0E66289EC824 (article_type_id), INDEX IDX_23A0E66798BC608 (article_material_id), INDEX IDX_23A0E6688C5F785 (article_category_id), INDEX IDX_23A0E66A76ED395 (user_id), INDEX IDX_23A0E668D9F6D38 (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_material (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_size (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_state (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_type (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_C53D045F7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, total_price DOUBLE PRECISION NOT NULL, commission DOUBLE PRECISION NOT NULL, point INT DEFAULT NULL, INDEX IDX_F5299398F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, bio LONGTEXT DEFAULT NULL, profile_picture VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, point INT NOT NULL, solde DOUBLE PRECISION NOT NULL, INDEX IDX_8D93D649F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A45FEC90 FOREIGN KEY (article_size_id) REFERENCES article_size (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665030C8AA FOREIGN KEY (article_state_id) REFERENCES article_state (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66289EC824 FOREIGN KEY (article_type_id) REFERENCES article_type (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66798BC608 FOREIGN KEY (article_material_id) REFERENCES article_material (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6688C5F785 FOREIGN KEY (article_category_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E668D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398F5B7AF75');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F7294869C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6688C5F785');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66798BC608');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A45FEC90');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665030C8AA');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66289EC824');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E668D9F6D38');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE article_material');
        $this->addSql('DROP TABLE article_size');
        $this->addSql('DROP TABLE article_state');
        $this->addSql('DROP TABLE article_type');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE user');
    }
}
