<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 05/04/2019
 * Time: 09:14
 */
namespace config;

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
    public function load($nameFile) {

        $file = "view/".$nameFile.".php";
        if (file_exists($file)) {
            $data = $this->data;
            extract($data);
            require_once $file;
        }
        else {
            die($file. " n'existe pas comme vue !");
        }
    }
}