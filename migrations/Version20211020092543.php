<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211020092543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return "Creation of the Program entity";
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE `program` (
            `id` INT AUTO_INCREMENT NOT NULL,
            `category_id` INT NOT NULL,
            `title` VARCHAR(50) NOT NULL,
            `synopsis` LONGTEXT NOT NULL,
            `photo` VARCHAR(255) DEFAULT NULL,
            `country` VARCHAR(50) NOT NULL,
            `year` INT NOT NULL,
            INDEX IDX_92ED778412469DE2 (`category_id`),
            PRIMARY KEY(`id`)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ');
        $this->addSql('ALTER TABLE `program`
            ADD CONSTRAINT FK_92ED778412469DE2
            FOREIGN KEY (`category_id`)
            REFERENCES `category` (`id`)
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE program');
    }
}
