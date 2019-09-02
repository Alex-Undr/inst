<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test;

/**
 * Test controller
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        $list = Test::getNewsList(3);

        return $this->render('index', [
            'list' => $list
        ]);
    }
}
