<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705142329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, postal_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, article_size_id INT DEFAULT NULL, article_state_id INT DEFAULT NULL, article_type_id INT DEFAULT NULL, article_material_id INT DEFAULT NULL, article_category_id INT DEFAULT NULL, order_article_id INT DEFAULT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, color VARCHAR(255) DEFAULT NULL, image_file_path VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_23A0E66A45FEC90 (article_size_id), INDEX IDX_23A0E665030C8AA (article_state_id), INDEX IDX_23A0E66289EC824 (article_type_id), INDEX IDX_23A0E66798BC608 (article_material_id), INDEX IDX_23A0E6688C5F785 (article_category_id), INDEX IDX_23A0E66C14E7BC9 (order_article_id), INDEX IDX_23A0E66A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_material (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_size (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_state (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_type (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, is_view TINYINT(1) NOT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, address INT DEFAULT NULL, user INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, commission DOUBLE PRECISION NOT NULL, point INT NOT NULL, INDEX IDX_F5299398D4E6F81 (address), INDEX IDX_F52993988D93D649 (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `refresh_tokens` (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, point INT NOT NULL, solde DOUBLE PRECISION NOT NULL, bio LONGTEXT DEFAULT NULL, image_file_path VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A45FEC90 FOREIGN KEY (article_size_id) REFERENCES article_size (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665030C8AA FOREIGN KEY (article_state_id) REFERENCES article_state (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66289EC824 FOREIGN KEY (article_type_id) REFERENCES article_type (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66798BC608 FOREIGN KEY (article_material_id) REFERENCES article_material (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6688C5F785 FOREIGN KEY (article_category_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C14E7BC9 FOREIGN KEY (order_article_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398D4E6F81 FOREIGN KEY (address) REFERENCES address (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993988D93D649 FOREIGN KEY (user) REFERENCES user (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398D4E6F81');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6688C5F785');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66798BC608');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A45FEC90');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665030C8AA');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66289EC824');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C14E7BC9');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993988D93D649');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE article_material');
        $this->addSql('DROP TABLE article_size');
        $this->addSql('DROP TABLE article_state');
        $this->addSql('DROP TABLE article_type');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE `refresh_tokens`');
        $this->addSql('DROP TABLE user');
    }
}
