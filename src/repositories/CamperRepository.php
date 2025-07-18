<?php

interface CamperRepository {

    public function findById(int $id): ?object;
    public function getAll(): array;
    public function create(array $data): ?object;
    public function update(array $data): ?object;
}
