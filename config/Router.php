<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 10:15
 */
namespace config;
class Router
{
    private $controller_object;
    private $view;

    public function route()
    {
        try {
            $url = ''; // CONTIENDRA L'URL QU'ON VA RECUPEREE
            if (isset($_GET['url'])) {
                // explode() CONVERTIT UNE CHAINE DE CARACTERE EN TABLEAU
                // FILTER_SANITIZE_URL => ELIMINE LES CARACTERE ACCENTUES SUR L'URL
                // $url => array
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                //ex : localhost/nomProjet/user => $url[0] = user
                $controller_class = ucfirst($url[0])."Controller";
                $controller_file = "src/controller/".$controller_class.".php";
                // ON VERIFIE SI LE FICHIER EXISTE
                if (file_exists($controller_file)) {
                    require_once $controller_file;
                    $this->controller_object = new $controller_class();
                    if (count($url) == 1 ) {
                        if (method_exists($this->controller_object, 'getAll')) {
                            $this->controller_object->getAll();
                        }
                    }
                    //ON VERIFIE SI $url[2] EXISTE => LA METHODE A EXECUTER ex : delete($id)
                     // METHODE AVEC PARAMETRE
                    if (isset($url[2])) {
                       $method = $url[1];
                       //ex : localhost/nomProjet/user/delete/5 => $url[2] = 5 => $id
                       // ON VERIFIE SI LA METHODE EXISTE
                       if (method_exists($this->controller_object, $method)) {
                        $this->controller_object->$method($url[2]);
                       }
                       else {
                            throw new \Exception("Error parameter ! ");
                            // A COMPLETER => REDIRECTION VERS UNE PAGE D'ERREUR 404
                       }
                    }
                    //ON VERIFIE SI $url[1] EXISTE => LA METHODE A EXECUTER ex : getAll
                    // METHODE SANS PARAMETRE
                    else if (isset($url[1])) {
                        if($url[1] == ""){
                            $url[1] = "getAll";
                        }
                        //ex : localhost/nomProjet/user/getAll => $url[1] = getAll
                        $method = $url[1];
                        // ON VERIFIE SI LA METHODE getAll() EXISTE DANS LE CONTROLLER UserController
                        if (method_exists($this->controller_object, $method)) {
                            $this->controller_object->$method();
                        }
                        else {
                            throw new \Exception("Error : Service not found");
                            //=> ON CAPTE ET AFFICHE L'ERREUR
                        }
                    }

                }
                else {
                    throw new \Exception("ERROR: Ressource not found !");
                    //=> ON CAPTE ET AFFICHE L'ERREUR
                }
            }
            else {
                require_once "src/controller/AccueilController.php";
                $this->controller_object = new \AccueilController();
                $this->controller_object->index();
            }
        }
        catch(\Exception $e) {
            // ON CAPTE LES ERREURS
            // ON APPEL UNE PAGE D'ERREUR not found 404.php
            require_once "src/controller/ErrorHTTPController.php";
            $this->controller_object = new \ErrorHTTPController();
            $this->controller_object->errorHttp();
        }
    }
}