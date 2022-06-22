<?php

namespace Camondoni\Framework;

class Router
{
    private $routes = [];
    private $method;
    private $path;
    private $params;
    private $prefix = "";
    private $request;

    public function __construct($method, $path)
    {
        $this->method = $method;
        $this->path = $path;
    }

    public function get(string $route, $action)
    {
        return $this->add('GET', $this->prefix . $route, $action);
    }

    public function post(string $route, $action)
    {
        return $this->add('POST', $this->prefix . $route, $action);
    }

    public function put(string $route, $action)
    {
        return $this->add('PUT', $this->prefix . $route, $action);
    }

    public function delete(string $route, $action)
    {
        return $this->add('DELETE', $this->prefix . $route, $action);
    }

    public function add(string $method, string $route, $action)
    {

        $this->routes[$method][$route] = new RouteEntity($action);
        return $this->routes[$method][$route];
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setPrefix(String $prefix = "")
    {
        $this->prefix = $prefix;
    }

    public function getRequestBody()
    {
        return $this->request;
    }


    function xssProtection(&$variable)
    {
        foreach ($variable as $value) {
            if (!is_array($value)) {
                $value = htmlspecialchars($value);
            } else {
                $this->xssProtection($value);
            }
        }
    }

    public function setRequestBody()
    {
        $body = json_decode(file_get_contents('php://input'), true);
        $params = $this->getParams();
        $files = $_FILES;
        if ($params) {
            $this->xssProtection($params);
        }
        if ($body) {
            $this->xssProtection($body);
        }

        $this->request['body'] = json_decode(file_get_contents('php://input'), true);
        $this->request['params'] = $params;
        $this->request['files'] = $files;
        return $this->request;
    }


    public function handler()
    {
        if (empty($this->routes[$this->method])) {
            Response::notFound();
        }

        if (isset($this->routes[$this->method][$this->path])) {
            return $this->routes[$this->method][$this->path];
        }

        foreach ($this->routes[$this->method] as $route => $action) {
            $result = $this->checkUrl($route, $this->path);
            if ($result >= 1) {
                return $action;
            }
        }

        Response::notFound();
    }

    private function checkUrl(string $route, $path)
    {
        preg_match_all('/\{([^\}]*)\}/', $route, $variables);
        $regex = str_replace('/', '\/', $route);
        $keys = ["url"];
        $params = array();
        foreach ($variables[0] as $k => $variable) {
            $replacement = '([a-zA-Z0-9\-\_\ ]+)';

            $regex = str_replace($variable, $replacement, $regex);
            $key = str_replace("{", "", $variable);
            $key = str_replace("}", "", $key);
            $keys[] = $key;
        }

        $regex = preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9+])', $regex);

        $result = preg_match('/^' . $regex . '$/', $path, $urlParams);


        foreach ($urlParams as $index => $param) {
            $params[$keys[$index]] = $param;
        }

        $this->params = $params;

        return $result;
    }
}
