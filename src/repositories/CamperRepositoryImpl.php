<?php

require_once "CamperRepository.php";

class CamperRepositoryImpl implements CamperRepository
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function findById(int $id): ? object
    {
        $stmt = $this->db->prepare("SELECT * FROM campers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM campers ORDER BY id ASC");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create(array $data): ?object
    {
        $stmt = $this->db->prepare("INSERT INTO campers(nombre, edad, documento, tipo_documento, nivel_ingles, nivel_programacion) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['nombre'],
            $data['edad'],
            $data['documento'],
            $data['tipo_documento'],
            $data['skill_ingles'],
            $data['skill_programacion'],
        ]);
        if ($this->db->lastInsertId() > 0) {
            $data['id'] = $this->db->lastInsertId();
        }
        return (object)$data;
}

public function update(array $data): ?object
{
    $stmt = $this->db->prepare("UPDATE campers SET nombre = ?, edad = ?, documento = ?, tipo_documento = ?, nivel_ingles = ?, nivel_programacion = ? WHERE id = ?");
    $stmt->execute([
        $data['nombre'],
        $data['edad'],
        $data['documento'],
        $data['tipo_documento'],
        $data['skill_ingles'],
        $data['skill_programacion'],
        $data['id']
    ]);
    
    return (object)$data;
}

}