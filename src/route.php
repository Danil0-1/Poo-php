<?php

class Route {
    private string $metodo;
    private string $recurso;
    private array $parametros;
    
    public function __construct(string $requestUri, string $method)
    {
        $array = explode('/', trim($requestUri, '/'));
        $this->metodo = $method;
        $this->recurso = $array[0] ?? '';
        $this->parametros = array_slice($array, 1);
    }

    public function handle() {
        switch ($this->recurso) {
            case 'products':
                // lógica para productos
                break;
            case 'camper':
                break;
            case 'invitado':
                break;
            case 'empleado':
                break;
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
