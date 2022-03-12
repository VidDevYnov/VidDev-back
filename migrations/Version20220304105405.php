<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304105405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, id_article_size_id INT NOT NULL, id_article_state_id INT NOT NULL, id_article_type_id INT NOT NULL, id_article_material_id INT DEFAULT NULL, id_article_category_id INT NOT NULL, id_user_id INT NOT NULL, id_order_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, color VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E664D012F18 (id_article_size_id), INDEX IDX_23A0E66B3BA9D7B (id_article_state_id), INDEX IDX_23A0E66C1C00BAC (id_article_type_id), INDEX IDX_23A0E663F615AC3 (id_article_material_id), INDEX IDX_23A0E66CE2F6B4E (id_article_category_id), INDEX IDX_23A0E6679F37AE5 (id_user_id), INDEX IDX_23A0E66DD4481AD (id_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_material (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_type (id INT AUTO_INCREMENT NOT NULL, worded VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, id_article_id INT NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_C53D045FD71E064B (id_article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, total_price DOUBLE PRECISION NOT NULL, commission DOUBLE PRECISION NOT NULL, point INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, bio LONGTEXT DEFAULT NULL, profile_picture VARCHAR(255) DEFAULT NULL, roles JSON NOT NULL, point INT NOT NULL, solde DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D012F18 FOREIGN KEY (id_article_size_id) REFERENCES article_size (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66B3BA9D7B FOREIGN KEY (id_article_state_id) REFERENCES article_state (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C1C00BAC FOREIGN KEY (id_article_type_id) REFERENCES article_type (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E663F615AC3 FOREIGN KEY (id_article_material_id) REFERENCES article_material (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66CE2F6B4E FOREIGN KEY (id_article_category_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6679F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DD4481AD FOREIGN KEY (id_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FD71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FD71E064B');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66CE2F6B4E');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E663F615AC3');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C1C00BAC');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DD4481AD');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6679F37AE5');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE article_material');
        $this->addSql('DROP TABLE article_type');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE user');
    }
}
