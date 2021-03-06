<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210306203823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_ecommerce ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_ecommerce ADD CONSTRAINT FK_408A445812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_408A445812469DE2 ON product_ecommerce (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_ecommerce DROP FOREIGN KEY FK_408A445812469DE2');
        $this->addSql('DROP INDEX IDX_408A445812469DE2 ON product_ecommerce');
        $this->addSql('ALTER TABLE product_ecommerce DROP category_id');
    }
}
