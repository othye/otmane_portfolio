<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180726201011 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skills CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE portfolio CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experiences CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studies CHANGE id_user id_user INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE experiences CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE portfolio CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE skills CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE studies CHANGE id_user id_user INT NOT NULL');
    }
}
