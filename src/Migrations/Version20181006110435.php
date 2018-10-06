<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181006110435 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE currency_exchange (id INT AUTO_INCREMENT NOT NULL, from_currency INT DEFAULT NULL, to_currency INT DEFAULT NULL, rate DOUBLE PRECISION NOT NULL, INDEX IDX_E353E66AA40F1691 (to_currency), INDEX from_currency (from_currency), UNIQUE INDEX from_to_currency (from_currency, to_currency), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE currency_exchange ADD CONSTRAINT FK_E353E66A2FB968A5 FOREIGN KEY (from_currency) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE currency_exchange ADD CONSTRAINT FK_E353E66AA40F1691 FOREIGN KEY (to_currency) REFERENCES currency (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE currency_exchange');
    }
}
