<?php

namespace App;

class Router {

  // private $method;
  // private $route;
  // private $cb;

  private $url;
  private $routes = [];

  public function __construct($url) {
    $this->url = $url;
  }

  public function get($path, $cb) {
    $route = new Route($path, $cb);
    $this->routes['GET'][] = $route;
  }

  public function post($path, $cb) {
    $route = new Route($path, $cb);
    $this->routes['POST'][] = $route;
  }

  public function run() {
    if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
      throw new \Exception('Unexisting method');
    }
    foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
      if($route->match($this->url)) {

        return $route->call();
      }
    }
    echo '<pre>';
    var_dump($this->url);
    echo '</pre>';
    throw new \Exception('No matching route');
  }
}
