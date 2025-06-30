<?php

use PDO;

use Helpers\SchemaBuilder;

class CreateUserTable
{
    public function up(PDO $pdo)
    {
        $table = new SchemaBuilder('user');
        $sql = $table->id()
        ->timestamp('created_at')->default('CURRENT_TIMESTAMP')
        ->buildCreateSQL();
        $pdo->exec($sql);
    }

    public function down(PDO $pdo)
    {
        $table = new SchemaBuilder('user');
        $pdo->exec($table->buildDropSQL());
    }
}
