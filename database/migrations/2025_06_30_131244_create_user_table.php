<?php

use Bpjs\Framework\Helpers\SchemaBuilder;
use Bpjs\Framework\Helpers\Database;

class CreateUsersTable
{
    public function up(): void
    {
        $pdo = Database::connection();
        $table = new SchemaBuilder('users');
        
        // Primary key
        $table->id('id');
        
        // User information
        $table->string('name', 150)->notNullable();
        $table->string('email', 150)->unique()->notNullable();
        $table->string('password', 255)->notNullable();
        $table->string('phone', 20)->nullable();
        $table->text('address')->nullable();
        $table->string('avatar', 255)->nullable();
        
        // API & Auth
        $table->string('api_key', 64)->unique()->nullable();
        $table->string('remember_token', 100)->nullable();
        $table->timestamp('email_verified_at')->nullable();
        
        // Role & Permissions
        $table->string('role', 50)->default('user');
        $table->json('permissions')->nullable();
        
        // Status
        $table->boolean('is_active')->default(1);
        $table->boolean('is_banned')->default(0);
        $table->timestamp('last_login_at')->nullable();
        $table->string('last_login_ip', 45)->nullable();
        
        // Expiry
        $table->timestamp('expires_at')->nullable();
        $table->timestamp('api_key_expires_at')->nullable();
        
        // Timestamps
        $table->timestamps();
        $table->softDeletes();
        
        // Indexes
        $table->index(['email', 'api_key']);
        $table->index('role');
        $table->index('is_active');
        $table->index(['created_at', 'updated_at']);
        
        $sql = $table->buildCreateSQL([
            'engine' => 'InnoDB',
            'charset' => 'utf8mb4',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => 'Users table'
        ]);
        
        try {
            $pdo->exec($sql);
            echo "Table 'users' created successfully\n";
        } catch (\PDOException $e) {
            echo "Failed to create table: " . $e->getMessage() . "\n";
            echo "SQL: " . $sql . "\n";
        }
    }

    public function down(): void
    {
        $pdo = Database::connection();
        $table = new SchemaBuilder('users');
        
        try {
            $pdo->exec($table->buildDropSQL());
            echo "Table 'users' dropped successfully\n";
        } catch (\PDOException $e) {
            echo "Failed to drop table: " . $e->getMessage() . "\n";
        }
    }
}