<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307201154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_ecommerce_availability_place (product_ecommerce_id INT NOT NULL, availability_place_id INT NOT NULL, INDEX IDX_501ACECD9D965A47 (product_ecommerce_id), INDEX IDX_501ACECD4C2DCC92 (availability_place_id), PRIMARY KEY(product_ecommerce_id, availability_place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_ecommerce_availability_place ADD CONSTRAINT FK_501ACECD9D965A47 FOREIGN KEY (product_ecommerce_id) REFERENCES product_ecommerce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_ecommerce_availability_place ADD CONSTRAINT FK_501ACECD4C2DCC92 FOREIGN KEY (availability_place_id) REFERENCES availability_place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_ecommerce_availability_place');
    }
}
