<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 16:15
 */

class ErrorHTTPController extends \config\Controller
{

    public function errorHttp() {
        //$this->view->assign('errorMsg', 'PAGE NOT FOUND IN THIS SERVER');
        return $this->view->load("errors/404.php");
    }
}