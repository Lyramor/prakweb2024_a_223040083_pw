<?php 


class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Check if $url is an array and $url[0] is set
        if ($url && isset($url[0])) {
            //controller
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        // Require the controller file
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/'); // Menghilangkan slash di akhir URL
            $url = filter_var($url, FILTER_SANITIZE_URL); // Sanitasi URL
            return explode('/', $url); // Pecah URL menjadi array
        }
        return []; // Jika tidak ada 'url' di $_GET, kembalikan array kosong
    }
}



?>