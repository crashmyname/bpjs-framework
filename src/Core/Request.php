<?php
namespace Bpjs\Core;

use Helpers\Date;

class Request
{
    private array $data = [];
    private array $files = [];
    private ?int $rateLimit = null;

    public function __construct()
    {
        $this->data = array_merge($this->sanitize($_GET), $this->sanitize($_POST));
        $this->files = $this->normalizeFiles($_FILES);
    }

    public static function capture(): static
    {
        return new static();
    }

    /** -------------------------
     *  GENERAL SANITIZE HELPERS
     *  ------------------------*/
    private function sanitize(array $data): array
    {
        $sanitized = [];
        foreach ($data as $key => $value) {
            $sanitized[$key] = is_array($value)
                ? $this->sanitize($value)
                : htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
        }
        return $sanitized;
    }

    /** -------------------------
     *  FILE NORMALIZATION
     *  ------------------------*/
    private function normalizeFiles(array $files): array
    {
        $normalized = [];

        foreach ($files as $field => $info) {
            // kalau bukan array (file tunggal)
            if (!isset($info['name']) || !is_array($info['name'])) {
                $normalized[$field] = [
                    'name' => $info['name'] ?? '',
                    'type' => $info['type'] ?? '',
                    'tmp_name' => $info['tmp_name'] ?? '',
                    'error' => $info['error'] ?? 0,
                    'size' => $info['size'] ?? 0,
                ];
                continue;
            }

            // kalau nested
            $normalized[$field] = $this->buildNestedFiles(
                $info['name'],
                $info['type'],
                $info['tmp_name'],
                $info['error'],
                $info['size']
            );
        }

        return $normalized;
    }

    private function buildNestedFiles($names, $types, $tmpNames, $errors, $sizes)
    {
        $result = [];

        foreach ($names as $key => $nameVal) {
            if (is_array($nameVal)) {
                // Rekursif kalau masih array
                $result[$key] = $this->buildNestedFiles(
                    $names[$key],
                    $types[$key],
                    $tmpNames[$key],
                    $errors[$key],
                    $sizes[$key]
                );
            } else {
                $result[$key] = [
                    'name' => htmlspecialchars($nameVal ?? '', ENT_QUOTES, 'UTF-8'),
                    'type' => htmlspecialchars($types[$key] ?? '', ENT_QUOTES, 'UTF-8'),
                    'tmp_name' => $tmpNames[$key] ?? '',
                    'error' => $errors[$key] ?? 0,
                    'size' => $sizes[$key] ?? 0,
                ];
            }
        }

        return $result;
    }

    /** -------------------------
     *  NESTED FILE ACCESSOR
     *  ------------------------*/
    public function getNestedFile(string $path)
    {
        $segments = preg_split('/[.\[\]]+/', $path, -1, PREG_SPLIT_NO_EMPTY);
        $cursor = $this->files;

        foreach ($segments as $seg) {
            if (is_array($cursor) && array_key_exists($seg, $cursor)) {
                $cursor = $cursor[$seg];
            } else {
                return null;
            }
        }

        // jika hasil akhir bukan file (masih array besar)
        if (!is_array($cursor) || !isset($cursor['tmp_name'])) {
            return null;
        }

        return $cursor;
    }

    /** -------------------------
     *  FILE INFO HELPERS
     *  ------------------------*/
    public function file($key)
    {
        $file = $this->files[$key] ?? null;
        if (!$file) return null;

        $size = isset($file['size']) ? (int) $file['size'] : 0;
        $sizeKB = $size / 1024;
        $sizeMB = $sizeKB / 1024;

        return [
            'original_name' => $file['name'] ?? '',
            'extension' => pathinfo($file['name'] ?? '', PATHINFO_EXTENSION),
            'mime_type' => $file['type'] ?? '',
            'size' => $size,
            'size_kb' => round($sizeKB, 2),
            'size_mb' => round($sizeMB, 2),
            'tmp_path' => $file['tmp_name'] ?? '',
            'error' => $file['error'] ?? 0,
            'uploaded_at' => Date::Now(),
        ];
    }

    public function getClientOriginalExtension($key): string
    {
        $file = $this->files[$key] ?? null;
        return $file ? pathinfo($file['name'], PATHINFO_EXTENSION) : '';
    }

    public function getClientOriginalName($key): string
    {
        return $this->files[$key]['name'] ?? '';
    }

    public function getClientMimeType($key): string
    {
        return $this->files[$key]['type'] ?? '';
    }

    public function getSize($key): int
    {
        return $this->files[$key]['size'] ?? 0;
    }

    public function getPath($key): string
    {
        return $this->files[$key]['tmp_name'] ?? '';
    }

    /** -------------------------
     *  DATA ACCESS
     *  ------------------------*/
    public function all(): array
    {
        return array_merge($this->data, $this->files);
    }

    public function get($key)
    {
        return $this->data[$key] ?? $this->files[$key] ?? null;
    }

    public function only(array $keys): array
    {
        $filtered = [];
        foreach ($keys as $key) {
            if (isset($this->data[$key])) {
                $filtered[$key] = $this->data[$key];
            }
        }
        return $filtered;
    }

    /** -------------------------
     *  UTILS
     *  ------------------------*/
    public static function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    public function setRateLimit(int $limit): void
    {
        $this->rateLimit = $limit;
    }

    public function getRateLimit(): ?int
    {
        return $this->rateLimit;
    }

    public function __get($key)
    {
        return $this->get($key);
    }
}
