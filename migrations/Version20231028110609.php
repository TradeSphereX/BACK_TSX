<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231028110609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, phone_number VARCHAR(25) NOT NULL, date_of_birth DATE NOT NULL, nationality VARCHAR(255) NOT NULL, employment_status VARCHAR(255) NOT NULL, source_of_income VARCHAR(255) NOT NULL, trading_experience_level INT NOT NULL, account_type VARCHAR(255) NOT NULL, accepted_terms_and_conditions TINYINT(1) NOT NULL, accepted_privacy_policy TINYINT(1) NOT NULL, identity_verification_status VARCHAR(50) NOT NULL, date_of_identity_verification DATE NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
    }
}
