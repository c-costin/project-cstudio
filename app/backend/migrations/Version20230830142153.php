<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230830142153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__order AS SELECT id, user_id, number, delivery_date, created_at, updated_at FROM "order"');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, number VARCHAR(64) NOT NULL, delivery_date VARCHAR(64) DEFAULT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO "order" (id, user_id, number, delivery_date, created_at, updated_at) SELECT id, user_id, number, delivery_date, created_at, updated_at FROM __temp__order');
        $this->addSql('DROP TABLE __temp__order');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON "order" (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F529939896901F54 ON "order" (number)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, type_id, title, description, dimensions, price, picture, release_date, artist, stock, created_at, updated_at FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_id INTEGER NOT NULL, title VARCHAR(64) NOT NULL, description CLOB NOT NULL, dimensions VARCHAR(32) NOT NULL, price VARCHAR(32) NOT NULL, picture VARCHAR(128) NOT NULL, release_date VARCHAR(64) NOT NULL, artist VARCHAR(64) NOT NULL, stock INTEGER NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_D34A04ADC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product (id, type_id, title, description, dimensions, price, picture, release_date, artist, stock, created_at, updated_at) SELECT id, type_id, title, description, dimensions, price, picture, release_date, artist, stock, created_at, updated_at FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04ADC54C8C93 ON product (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__order AS SELECT id, user_id, number, delivery_date, created_at, updated_at FROM "order"');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, number VARCHAR(64) NOT NULL, delivery_date VARCHAR(64) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO "order" (id, user_id, number, delivery_date, created_at, updated_at) SELECT id, user_id, number, delivery_date, created_at, updated_at FROM __temp__order');
        $this->addSql('DROP TABLE __temp__order');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON "order" (user_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, type_id, title, description, dimensions, price, picture, release_date, artist, stock, created_at, updated_at FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_id INTEGER NOT NULL, title VARCHAR(64) NOT NULL, description CLOB NOT NULL, dimensions VARCHAR(32) NOT NULL, price VARCHAR(32) NOT NULL, picture VARCHAR(128) NOT NULL, release_date VARCHAR(64) NOT NULL, artist VARCHAR(64) NOT NULL, stock INTEGER NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_D34A04ADC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO product (id, type_id, title, description, dimensions, price, picture, release_date, artist, stock, created_at, updated_at) SELECT id, type_id, title, description, dimensions, price, picture, release_date, artist, stock, created_at, updated_at FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
        $this->addSql('CREATE INDEX IDX_D34A04ADC54C8C93 ON product (type_id)');
    }
}
