<?php

class Routes
{
    protected $routes = [];

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        if (array_key_exists($uri, $this->routes)){

            if ($this->routes[$uri][1] == 2) {
                if (Auth::isAdmin()) {
                    return $this->routes[$uri][0];
                }
                else {
                    header('Location: /');
                }
            }
            elseif ($this->routes[$uri][1] == 1) {
                if (Auth::isLoggedIn()) {
                    return $this->routes[$uri][0];
                }
                else {
                    header('Location: /login');
                }
            }
            else {
                return $this->routes[$uri][0];
            }


        }
        throw new Exception('No route defined!');
    }
}