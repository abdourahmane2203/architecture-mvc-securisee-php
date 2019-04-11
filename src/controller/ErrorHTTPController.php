<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 16:15
 */
use config\Controller;
class ErrorHTTPController extends Controller
{

    public function errorHttp() {
        //$this->view->assign('errorMsg', 'PAGE NOT FOUND IN THIS SERVER');
        return $this->view->load("errors/404");
    }
}