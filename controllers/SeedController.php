<?php
namespace app\controllers;
use yii\console\Controller;
use app\models\Users;
use app\models\Profile;

class SeedController extends Controller{

    public function actionIndex(){
        // $user = new Users();    
        $this->render('index');
    }
}
