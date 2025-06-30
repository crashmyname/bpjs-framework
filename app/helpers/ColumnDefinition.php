<?php
namespace Helpers;

class ColumnDefinition
{
    protected string $name;
    protected string $type;
    protected array $modifiers = [];
    protected ?string $foreignKey = null;
    protected ?string $foreignTable = null;
    protected ?string $onDelete = null;

    public function __construct(string $type, string $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    public function nullable()
    {
        $this->modifiers[] = 'NULL';
        return $this;
    }

    public function notNullable()
    {
        $this->modifiers[] = 'NOT NULL';
        return $this;
    }

    public function default($value)
    {
        $val = is_string($value) && strtoupper($value) !== 'CURRENT_TIMESTAMP'
            ? "'$value'" : $value;
        $this->modifiers[] = "DEFAULT $val";
        return $this;
    }

    public function unique()
    {
        $this->modifiers[] = 'UNIQUE';
        return $this;
    }

    public function autoIncrement()
    {
        $this->modifiers[] = 'AUTO_INCREMENT';
        return $this;
    }

    public function primary()
    {
        $this->modifiers[] = 'PRIMARY KEY';
        return $this;
    }

    public function foreign()
    {
        $this->foreignKey = $this->name;
        return $this;
    }

    public function references(string $column)
    {
        $this->foreignKey = $column;
        return $this;
    }

    public function on(string $table)
    {
        $this->foreignTable = $table;
        return $this;
    }

    public function onDelete(string $action)
    {
        $this->onDelete = strtoupper($action);
        return $this;
    }

    public function build(): string
    {
        $sql = "`{$this->name}` {$this->type}" . (!empty($this->modifiers) ? ' ' . implode(' ', $this->modifiers) : '');

        // Tambah foreign constraint jika ada
        if ($this->foreignKey && $this->foreignTable) {
            $sql .= ",\n    FOREIGN KEY (`{$this->name}`) REFERENCES `{$this->foreignTable}`(`{$this->foreignKey}`)";
            if ($this->onDelete) {
                $sql .= " ON DELETE {$this->onDelete}";
            }
        }

        return $sql;
    }
}
