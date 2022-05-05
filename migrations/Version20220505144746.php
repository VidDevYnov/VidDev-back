<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220505144746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E668D9F6D38');
        $this->addSql('DROP INDEX IDX_23A0E668D9F6D38 ON article');
        $this->addSql('ALTER TABLE article CHANGE article_size_id article_size_id INT DEFAULT NULL, CHANGE article_state_id article_state_id INT DEFAULT NULL, CHANGE article_type_id article_type_id INT DEFAULT NULL, CHANGE article_category_id article_category_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE order_id order_article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C14E7BC9 FOREIGN KEY (order_article_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66C14E7BC9 ON article (order_article_id)');
        $this->addSql('ALTER TABLE image CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD user_id INT DEFAULT NULL, CHANGE address_id address_id INT DEFAULT NULL, CHANGE point point INT NOT NULL, CHANGE total_price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON `order` (user_id)');
        $this->addSql('ALTER TABLE user CHANGE point point INT DEFAULT NULL, CHANGE solde solde DOUBLE PRECISION DEFAULT NULL, CHANGE profile_picture profil_picture VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C14E7BC9');
        $this->addSql('DROP INDEX IDX_23A0E66C14E7BC9 ON article');
        $this->addSql('ALTER TABLE article CHANGE article_size_id article_size_id INT NOT NULL, CHANGE article_state_id article_state_id INT NOT NULL, CHANGE article_type_id article_type_id INT NOT NULL, CHANGE article_category_id article_category_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE order_article_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E668D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_23A0E668D9F6D38 ON article (order_id)');
        $this->addSql('ALTER TABLE image CHANGE article_id article_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('DROP INDEX IDX_F5299398A76ED395 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP user_id, CHANGE address_id address_id INT NOT NULL, CHANGE point point INT DEFAULT NULL, CHANGE price total_price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE point point INT NOT NULL, CHANGE solde solde DOUBLE PRECISION NOT NULL, CHANGE profil_picture profile_picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
