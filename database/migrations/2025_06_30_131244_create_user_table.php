<?php

// use PDO;

use Helpers\SchemaBuilder;

class CreateUserTable
{
    public function up(\PDO $pdo)
    {
        $table = new SchemaBuilder('user');
        $table->id('userId');
        $table->string('nama',150);
        $table->string('email',150);
        $table->timestamp('created_at')->default('CURRENT_TIMESTAMP');

        $sql = $table->buildCreateSQL();
        try {
            $pdo->exec($sql);
            echo "✅ Table 'user' berhasil dibuat\n";
        } catch (\PDOException $e) {
            echo "❌ Gagal membuat tabel: " . $e->getMessage() . "\n";
            echo "SQL: $sql\n";
        }

    }

    public function down(PDO $pdo)
    {
        $table = new SchemaBuilder('user');
        $pdo->exec($table->buildDropSQL());
    }
}
