<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413075111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD pizza_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
        $this->addSql('CREATE INDEX IDX_F5299398D41D1D42 ON `order` (pizza_id)');
        $this->addSql('ALTER TABLE pizza ADD size_id INT NOT NULL');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F498DA827 FOREIGN KEY (size_id) REFERENCES size (id)');
        $this->addSql('CREATE INDEX IDX_CFDD826F498DA827 ON pizza (size_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398D41D1D42');
        $this->addSql('DROP INDEX IDX_F5299398D41D1D42 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP pizza_id');
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F498DA827');
        $this->addSql('DROP INDEX IDX_CFDD826F498DA827 ON pizza');
        $this->addSql('ALTER TABLE pizza DROP size_id');
    }
}
