<?php

namespace App\Services\DBManager;

interface DBManagerInterface
{
    public function findAll(string $table): array;

    public function findOneBy(string $table, string $column, $value): ?array;

    public function findBy(string $table, string $column, $value): array;

    public function insert(string $table, string $request): void;

    public function update(string $table, string $request): void;

    public function delete(string $table, string $column, $value): void;

}
