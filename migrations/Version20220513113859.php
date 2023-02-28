<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513113859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D9D86650F ON commande (user_id_id)');
        $this->addSql('ALTER TABLE product ADD publisher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD40C86FCE FOREIGN KEY (publisher_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD40C86FCE ON product (publisher_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9D86650F');
        $this->addSql('DROP INDEX IDX_6EEAA67D9D86650F ON commande');
        $this->addSql('ALTER TABLE commande DROP user_id_id');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD40C86FCE');
        $this->addSql('DROP INDEX IDX_D34A04AD40C86FCE ON product');
        $this->addSql('ALTER TABLE product DROP publisher_id');
    }
}
