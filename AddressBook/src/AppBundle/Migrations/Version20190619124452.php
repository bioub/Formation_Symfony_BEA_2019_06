<?php

namespace AppBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190619124452 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, rue VARCHAR(50) NOT NULL, ville VARCHAR(80) NOT NULL, cp VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE societe ADD adresse_id INT DEFAULT NULL, DROP code_postal, DROP ville');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES address (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_19653DBD4DE7DC5C ON societe (adresse_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD4DE7DC5C');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP INDEX UNIQ_19653DBD4DE7DC5C ON societe');
        $this->addSql('ALTER TABLE societe ADD code_postal VARCHAR(8) NOT NULL COLLATE utf8_unicode_ci, ADD ville VARCHAR(80) NOT NULL COLLATE utf8_unicode_ci, DROP adresse_id');
    }
}
