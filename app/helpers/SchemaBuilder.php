<?php
namespace Helpers;
use Helpers\ColumnDefinition;

class SchemaBuilder
{
    protected string $table;
    protected array $columns = [];
    protected array $constraints = [];

    
    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function index(string|array $columns)
    {
        $cols = is_array($columns) ? implode('`, `', $columns) : $columns;
        $this->constraints[] = "INDEX (`$cols`)";
        return $this;
    }

    public function unique(string|array $columns)
    {
        $cols = is_array($columns) ? implode('`, `', $columns) : $columns;
        $this->constraints[] = "UNIQUE (`$cols`)";
        return $this;
    }
    
    public function id(string $name = 'id')
    {
        $column = new ColumnDefinition('BIGINT', $name);
        $column->autoIncrement()->primary();
        $this->columns[] = $column;
        return $this;
    }

    public function string(string $name, int $length = 255)
    {
        $column = new ColumnDefinition("VARCHAR($length)", $name);
        $this->columns[] = $column;
        return $column;
    }

    public function integer(string $name)
    {
        $column = new ColumnDefinition("INT", $name);
        $this->columns[] = $column;
        return $column;
    }

    public function boolean(string $name)
    {
        $column = new ColumnDefinition("TINYINT(1)", $name);
        $this->columns[] = $column;
        return $column;
    }

    public function timestamp(string $name)
    {
        $column = new ColumnDefinition("TIMESTAMP", $name);
        $this->columns[] = $column;
        return $column;
    }
    
    // public function default(string $value)
    // {
    //     $last = array_pop($this->columns);
    //     $last .= " DEFAULT $value";
    //     $this->columns[] = $last;
    //     return $this;
    // }

    public function dropColumn(string $column)
    {
        return "ALTER TABLE `{$this->table}` DROP COLUMN `$column`";
    }

    public function renameColumn(string $from, string $to, string $type)
    {
        return "ALTER TABLE `{$this->table}` CHANGE `$from` `$to` $type";
    }

    public function buildCreateSQL(): string
    {
        $columnsSQL = array_map(fn($col) => $col->build(), $this->columns);
        $all = array_merge($columnsSQL, $this->constraints);
        return "CREATE TABLE `{$this->table}` (\n    " . implode(",\n    ", $all) . "\n)";
    }

    public function buildDropSQL(): string
    {
        return "DROP TABLE IF EXISTS `{$this->table}`";
    }
}
