<?php

include_once'src/http/controllers/CrudController.php';
include_once'src/http/controllers/ProductoController.php';
include_once'src/http/controllers/CamperController.php';

class ControllerFactory
{

    public static function create(string $path): CrudController | null
    {
        switch ($path) {
            case 'products':
                return new ProductoController();
            case 'camper':
                return new CamperController();
            default:
                http_response_code(404);
                echo json_encode([
                    'error' => 'Recurso no encontrado',
                    'code' => 404,
                    'errorUrl' => 'https://http.cat/404'
                ]);
                exit;
        }
    }
}