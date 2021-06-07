<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607200156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE program ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP added_at, CHANGE updated_at updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE schedule ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP added_at');
        $this->addSql('ALTER TABLE serie ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP added_at, CHANGE updated_at updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE tv_chanel ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP added_at, CHANGE updated_at updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE user ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP added_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE program ADD added_at DATETIME NOT NULL, DROP created_at, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE schedule ADD added_at DATETIME NOT NULL, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE serie ADD added_at DATETIME NOT NULL, DROP created_at, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tv_chanel ADD added_at DATETIME NOT NULL, DROP created_at, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user ADD added_at DATETIME NOT NULL, DROP created_at, DROP updated_at');
    }
}
