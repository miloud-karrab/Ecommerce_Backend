<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307200452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_ecommerce_order (product_ecommerce_id INT NOT NULL, order_id INT NOT NULL, INDEX IDX_C0C1D0889D965A47 (product_ecommerce_id), INDEX IDX_C0C1D0888D9F6D38 (order_id), PRIMARY KEY(product_ecommerce_id, order_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_ecommerce_order ADD CONSTRAINT FK_C0C1D0889D965A47 FOREIGN KEY (product_ecommerce_id) REFERENCES product_ecommerce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_ecommerce_order ADD CONSTRAINT FK_C0C1D0888D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product_ecommerce_order');
    }
}
