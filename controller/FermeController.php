<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 14:42
 */
use config\Controller;
use model\FermeDao;
class FermeController extends Controller
{
    public function getAll() {
        $fermeDao = new FermeDao();
        $value = $fermeDao->findAll();
        $this->view->assign('fermeDao', $value);
        $this->view->assign('test', 'Bonjour extract($data)');
        $this->view->assign('test', 'Bonjour extract($data)');
        return $this->view->load("ferme/getAll");
    }

}