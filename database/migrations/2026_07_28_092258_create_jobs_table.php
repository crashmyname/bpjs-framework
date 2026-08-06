<?php

use Bpjs\Framework\Helpers\SchemaBuilder;
use Bpjs\Framework\Helpers\Database;

class CreateJobsTable
{
    public function up(): void
    {
        $pdo = Database::connection();
        $table = new SchemaBuilder('jobs');
        
        // Primary key
        $table->id('id');
        
        // Queue information
        $table->string('queue', 255)->notNullable()->default('default');
        $table->text('payload')->notNullable();
        $table->text('data')->nullable();
        
        // Status & Attempts
        $table->string('status', 20)->notNullable()->default('pending');
        $table->integer('attempts')->default(0);
        $table->integer('max_attempts')->default(3);
        $table->text('error_message')->nullable();
        $table->text('error_trace')->nullable();
        
        // Timestamps
        $table->timestamp('available_at')->nullable();
        $table->timestamp('reserved_at')->nullable();
        $table->timestamp('started_at')->nullable();
        $table->timestamp('finished_at')->nullable();
        $table->timestamp('failed_at')->nullable();
        
        // Timestamps
        $table->timestamps();
        
        // Indexes
        $table->index(['queue', 'status']);
        $table->index('available_at');
        $table->index('reserved_at');
        $table->index('failed_at');
        $table->index(['queue', 'status', 'available_at']);
        
        $sql = $table->buildCreateSQL([
            'engine' => 'InnoDB',
            'charset' => 'utf8mb4',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => 'Queue jobs table'
        ]);
        
        try {
            $pdo->exec($sql);
            echo "Table 'jobs' created successfully\n";
        } catch (\PDOException $e) {
            echo "Failed to create table: " . $e->getMessage() . "\n";
            echo "SQL: " . $sql . "\n";
        }
    }

    public function down(): void
    {
        $pdo = Database::connection();
        $table = new SchemaBuilder('jobs');
        
        try {
            $pdo->exec($table->buildDropSQL());
            echo "Table 'jobs' dropped successfully\n";
        } catch (\PDOException $e) {
            echo "Failed to drop table: " . $e->getMessage() . "\n";
        }
    }
}