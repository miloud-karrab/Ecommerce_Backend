<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307140459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_control ADD orders_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_control ADD CONSTRAINT FK_3C0237FBCFFE9AD6 FOREIGN KEY (orders_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_3C0237FBCFFE9AD6 ON product_control (orders_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_control DROP FOREIGN KEY FK_3C0237FBCFFE9AD6');
        $this->addSql('DROP INDEX IDX_3C0237FBCFFE9AD6 ON product_control');
        $this->addSql('ALTER TABLE product_control DROP orders_id');
    }
}
