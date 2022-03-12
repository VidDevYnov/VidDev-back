<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304111642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66B3BA9D7B');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66CE2F6B4E');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E663F615AC3');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6679F37AE5');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C1C00BAC');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DD4481AD');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664D012F18');
        $this->addSql('DROP INDEX IDX_23A0E66B3BA9D7B ON article');
        $this->addSql('DROP INDEX IDX_23A0E663F615AC3 ON article');
        $this->addSql('DROP INDEX IDX_23A0E6679F37AE5 ON article');
        $this->addSql('DROP INDEX IDX_23A0E664D012F18 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66C1C00BAC ON article');
        $this->addSql('DROP INDEX IDX_23A0E66CE2F6B4E ON article');
        $this->addSql('DROP INDEX IDX_23A0E66DD4481AD ON article');
        $this->addSql('ALTER TABLE article ADD article_size_id INT NOT NULL, ADD article_state_id INT NOT NULL, ADD article_type_id INT NOT NULL, ADD article_material_id INT DEFAULT NULL, ADD article_category_id INT NOT NULL, ADD user_id INT NOT NULL, ADD order_id INT DEFAULT NULL, DROP id_article_size_id, DROP id_article_state_id, DROP id_article_type_id, DROP id_article_material_id, DROP id_article_category_id, DROP id_user_id, DROP id_order_id');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A45FEC90 FOREIGN KEY (article_size_id) REFERENCES article_size (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665030C8AA FOREIGN KEY (article_state_id) REFERENCES article_state (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66289EC824 FOREIGN KEY (article_type_id) REFERENCES article_type (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66798BC608 FOREIGN KEY (article_material_id) REFERENCES article_material (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6688C5F785 FOREIGN KEY (article_category_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E668D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66A45FEC90 ON article (article_size_id)');
        $this->addSql('CREATE INDEX IDX_23A0E665030C8AA ON article (article_state_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66289EC824 ON article (article_type_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66798BC608 ON article (article_material_id)');
        $this->addSql('CREATE INDEX IDX_23A0E6688C5F785 ON article (article_category_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66A76ED395 ON article (user_id)');
        $this->addSql('CREATE INDEX IDX_23A0E668D9F6D38 ON article (order_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A45FEC90');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665030C8AA');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66289EC824');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66798BC608');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6688C5F785');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E668D9F6D38');
        $this->addSql('DROP INDEX IDX_23A0E66A45FEC90 ON article');
        $this->addSql('DROP INDEX IDX_23A0E665030C8AA ON article');
        $this->addSql('DROP INDEX IDX_23A0E66289EC824 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66798BC608 ON article');
        $this->addSql('DROP INDEX IDX_23A0E6688C5F785 ON article');
        $this->addSql('DROP INDEX IDX_23A0E66A76ED395 ON article');
        $this->addSql('DROP INDEX IDX_23A0E668D9F6D38 ON article');
        $this->addSql('ALTER TABLE article ADD id_article_size_id INT NOT NULL, ADD id_article_state_id INT NOT NULL, ADD id_article_type_id INT NOT NULL, ADD id_article_material_id INT DEFAULT NULL, ADD id_article_category_id INT NOT NULL, ADD id_user_id INT NOT NULL, ADD id_order_id INT DEFAULT NULL, DROP article_size_id, DROP article_state_id, DROP article_type_id, DROP article_material_id, DROP article_category_id, DROP user_id, DROP order_id');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66B3BA9D7B FOREIGN KEY (id_article_state_id) REFERENCES article_state (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66CE2F6B4E FOREIGN KEY (id_article_category_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E663F615AC3 FOREIGN KEY (id_article_material_id) REFERENCES article_material (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6679F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C1C00BAC FOREIGN KEY (id_article_type_id) REFERENCES article_type (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DD4481AD FOREIGN KEY (id_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664D012F18 FOREIGN KEY (id_article_size_id) REFERENCES article_size (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66B3BA9D7B ON article (id_article_state_id)');
        $this->addSql('CREATE INDEX IDX_23A0E663F615AC3 ON article (id_article_material_id)');
        $this->addSql('CREATE INDEX IDX_23A0E6679F37AE5 ON article (id_user_id)');
        $this->addSql('CREATE INDEX IDX_23A0E664D012F18 ON article (id_article_size_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66C1C00BAC ON article (id_article_type_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66CE2F6B4E ON article (id_article_category_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66DD4481AD ON article (id_order_id)');
    }
}
