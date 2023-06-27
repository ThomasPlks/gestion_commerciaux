<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230627135208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, type_evenement_id INT NOT NULL, client_id INT NOT NULL, commercial_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, evenement VARCHAR(255) NOT NULL, conclusion VARCHAR(255) NOT NULL, km_parcourus INT NOT NULL, date_arrivéee DATETIME NOT NULL, date_depart DATETIME NOT NULL, INDEX IDX_B26681E88939516 (type_evenement_id), INDEX IDX_B26681E19EB6921 (client_id), INDEX IDX_B26681E7854071C (commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E88939516 FOREIGN KEY (type_evenement_id) REFERENCES type_evenement (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E7854071C FOREIGN KEY (commercial_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E88939516');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E19EB6921');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E7854071C');
        $this->addSql('DROP TABLE evenement');
    }
}
