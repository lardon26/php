<?php
namespace system;

/**
 * Class Router
 */
class Router
{
    /**
     * permet d'éxécuter la méthode d'un controleur choisi
     * si la méthode est omise alors index est choisi
     * Les URL saisies sont de la forme
     *      site/controleur
     *      site/controleur/method
     *      site/controleur/method/param1/...
     */
    function route()
    {
        $scriptName = $_SERVER["SCRIPT_NAME"];
        $requestURI = $_SERVER["REQUEST_URI"];

        // Le script name contient index.php, on le supprime
        $prefix = substr($scriptName, 0, strlen($scriptName) - 9);
        // Le suffixe est le requestURI privé du préfix
        $suffix = substr($requestURI, strlen($prefix));

        $params = explode("/", $suffix);

        // Check if there is at least one element in $params
        if (empty($params)) {
            echo "Pas de controller";
            die;
        } else {
            $controller = $params[0];
            array_shift($params);

            // Check if there is at least one element in $params after shifting
            if (empty($params)) {
                $controllerMethod = "index";
            } else {
                $controllerMethod = $params[0];
                array_shift($params);
            }
        }

        $class = "\app\controller\\" . $controller;

        // Check if the class exists before trying to instantiate it
        if (class_exists($class)) {
            $controllerInstance = new $class();

            // Check if the method exists before trying to call it
            if (method_exists($controllerInstance, $controllerMethod)) {
                $controllerInstance->$controllerMethod($params);
            } else {
                echo "Méthode non trouvée";
                die;
            }
        } else {
            echo "Controller non trouvé";
            die;
        }
    }

}