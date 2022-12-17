<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221209200959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD artprixaukilo DOUBLE PRECISION DEFAULT NULL, CHANGE artprixaukg artprixaukg DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD utilsurnom LONGTEXT NOT NULL, CHANGE utiltel utiltel INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP artprixaukilo, CHANGE artprixaukg artprixaukg DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs DROP utilsurnom, CHANGE utiltel utiltel INT DEFAULT NULL');
    }
}
