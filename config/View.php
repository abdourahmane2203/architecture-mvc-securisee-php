<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 05/04/2019
 * Time: 09:14
 */
namespace config;

use mysql_xdevapi\Exception;

class View
{

    private $data;

    public function assign($cle,$valeur){
        $this->data[$cle]=$valeur;
    }
    public function __construct()
    {
        $this->data=[];
    }

    // CETTE FONCTION PERMET DE CAHRGER LES FICHIER VIEWS.
    // CETTE FONCTION SERA APPELEE AVEC DES ARGUMENTS DYNAMIQUEMENT
    public function load($nameFile)
    {

        $file = "src/view/" . $nameFile . ".php";
        try {
            if (file_exists($file)) {
                $data = $this->data;
                extract($data);
                require_once $file;
            } else {
                throw new \Exception("Cette vue n'existe pas");
            }

        }
        catch (\Exception $e) {
            require_once "src/view/errors/404.php";
        }
    }
}