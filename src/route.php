<?php

include_once"src/http/controllers/ProductoController.php";
include_once"src/http/controllers/CamperController.php";
include_once"src/http/controllers/CrudController.php";
include_once"src/http/factories/ControllerFactory.php";


class Route 
{
    private string $metodo;
    private string $recurso;
    private array $parametros;
    
    public function __construct(string $requestUri, string $method)
    {
        $uri = explode('/', trim($requestUri, '/'));
        $this->metodo = strtoupper($method);
        $this->recurso = strtolower($uri[0]);
        $this->parametros = isset($uri[1]) ? array_slice($uri, 1) : [];
    }

    public function handle() {

        header('Content-Type: application/json');

        $dispatch =[
            "GET"=>"get",
            "POST"=>"create",
            "PUT"=>"update",
            "DELETE"=>"delete",
        ];


    $controller = ControllerFactory::create($this->recurso);

    if (!array_key_exists($this->metodo,$controller::$dispatch)) {
        http_response_code(405);
        echo json_encode([
            'error' => 'Recurso no encontrado',             
            'code' => 405,
            'errorUrl' => 'https://http.cat/405'
        ]);
        exit;
    }

        $function = $controller::dispatch[$this->metodo];

        if (!method_exists($controller, $function)) {
        http_response_code(501);
        echo json_encode([
            'error' => 'Recurso no encontrado',             
            'code' => 501,
            'errorUrl' => 'https://http.cat/501'
        ]);
        exit;
    }

    $data = file_get_contents('php://input', true) ? json_encode(file_get_contents('php://input', true), true): [];

    $controller->$function(["params" =>$this->parametros, "data" => $data]);

    }
}
