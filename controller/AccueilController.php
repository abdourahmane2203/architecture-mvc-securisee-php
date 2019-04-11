<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 15:52
 */
use config\Controller;

class AccueilController extends Controller
{
    public function index() {
        $this->view->assign('fermes','fsdhfksjdfdsf');
        $this->view->assign('resutl','fsdhfksjdfdsf');
        return $this->view->load("accueil");
    }
}