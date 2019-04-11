<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 12:38
 */
namespace config;
use config\View;

// TOUT CONTROLLER DE NOTRE APPLICATION HERITERA DE CE CONTROLLER LA
class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }
}