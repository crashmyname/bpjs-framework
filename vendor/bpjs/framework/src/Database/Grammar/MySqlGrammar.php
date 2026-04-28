<?php

namespace Bpjs\Framework\Database\Grammar;

class MySqlGrammar implements GrammarInterface
{
    public function driverName(): string { return 'mysql'; }

    public function wrapIdentifier(string $name): string
    {
        if ($name === '*') return '*';
        return '`' . str_replace('`', '``', $name) . '`';
    }

    public function wrapTable(string $table): string
    {
        // support schema.table
        return implode('.', array_map(
            fn($p) => $this->wrapIdentifier($p),
            explode('.', $table)
        ));
    }

    public function buildLimitOffset(?int $limit, ?int $offset): string
    {
        $sql = '';
        if ($limit !== null)  $sql .= ' LIMIT '  . $limit;
        if ($offset !== null) $sql .= ' OFFSET ' . $offset;
        return $sql;
    }

    public function buildSelect(
        string $distinct, array $columns, string $table,
        array $joins, string $whereClause, string $groupBy,
        array $orderBy, ?int $limit, ?int $offset
    ): string {
        $cols = implode(', ', $columns);
        $sql  = "SELECT {$distinct} {$cols} FROM {$this->wrapTable($table)}";
        if ($joins)      $sql .= ' ' . implode(' ', $joins);
        if ($whereClause) $sql .= $whereClause;
        if ($groupBy)    $sql .= " GROUP BY {$groupBy}";
        if ($orderBy)    $sql .= ' ORDER BY ' . implode(', ', $orderBy);
        $sql .= $this->buildLimitOffset($limit, $offset);
        return $sql;
    }

    public function buildInsert(string $table, array $columns, string $primaryKey): array
    {
        $cols   = implode(', ', array_map(fn($c) => $this->wrapIdentifier($c), $columns));
        $params = ':' . implode(', :', $columns);
        return [
            'sql'       => "INSERT INTO {$this->wrapTable($table)} ({$cols}) VALUES ({$params})",
            'returning' => false,
        ];
    }

    public function resolveLastInsertId(\PDO $pdo, \PDOStatement $stmt, string $table, string $primaryKey): int|string|null
    {
        return $pdo->lastInsertId() ?: null;
    }

    public function lockForUpdate(): string { return ' FOR UPDATE'; }
    public function lockForShare(): string  { return ' LOCK IN SHARE MODE'; }

    public function monthExpr(string $column): string { return "MONTH({$column})"; }
    public function yearExpr(string $column): string  { return "YEAR({$column})"; }

    public function dateExpr(string $column, string $paramName): string
    {
        return "DATE({$column}) = :{$paramName}";
    }
}