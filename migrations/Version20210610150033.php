<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210610150033 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB3EB8070A');
        $this->addSql('DROP INDEX IDX_5A3811FB3EB8070A ON schedule');
        $this->addSql('ALTER TABLE schedule ADD title VARCHAR(255) NOT NULL, DROP program_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule ADD program_id INT DEFAULT NULL, DROP title');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB3EB8070A FOREIGN KEY (program_id) REFERENCES program (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB3EB8070A ON schedule (program_id)');
    }
}
