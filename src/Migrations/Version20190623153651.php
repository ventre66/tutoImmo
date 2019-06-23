<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190623153651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bien ADD surface INT NOT NULL, ADD piece INT NOT NULL, ADD chambre INT NOT NULL, ADD etage INT DEFAULT NULL, ADD prix INT NOT NULL, ADD chauffage INT NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD code_postal VARCHAR(255) NOT NULL, ADD vendu TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bien DROP surface, DROP piece, DROP chambre, DROP etage, DROP prix, DROP chauffage, DROP ville, DROP adresse, DROP code_postal, DROP vendu, DROP created_at');
    }
}
