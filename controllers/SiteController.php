<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\filters\VerbFilter;


class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */

    public function fact($n){
        if (!is_numeric($n))$n='Ошибка, не число';
        else if ($n<0)$n='Ошибка факториал не может быть меньше нуля';
        else if ($n==0)$n=1;
        else if($n>1) return $n*$this->fact($n-1);
        return $n;
    }

    public function actionOtvet(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $n = $request->get('factorial');
        return $this->fact($n);
    }
}
