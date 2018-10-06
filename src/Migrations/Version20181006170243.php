<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181006170243 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE currency DROP INDEX currency_code, ADD UNIQUE INDEX currency_iso_code (iso_code)');
        $this->addSql('DROP INDEX from_to_currency ON currency_exchange');
        $this->addSql('CREATE UNIQUE INDEX from_to_currency ON currency_exchange (from_currency, to_currency)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE currency DROP INDEX currency_iso_code, ADD INDEX currency_code (iso_code)');
        $this->addSql('DROP INDEX from_to_currency ON currency_exchange');
        $this->addSql('CREATE UNIQUE INDEX from_to_currency ON currency_exchange (from_currency, to_currency)');
    }
}
