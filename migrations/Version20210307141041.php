<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307141041 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion ADD productecommerce_id INT NOT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1E2A054CD FOREIGN KEY (productecommerce_id) REFERENCES product_ecommerce (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD1E2A054CD ON promotion (productecommerce_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1E2A054CD');
        $this->addSql('DROP INDEX IDX_C11D7DD1E2A054CD ON promotion');
        $this->addSql('ALTER TABLE promotion DROP productecommerce_id');
    }
}
