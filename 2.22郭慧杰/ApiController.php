<?php
namespace backend\controllers;

use yii;
use yii\web\Controller;
use backend\models\ExamUser;

class ApiController extends Controller
{
    public $enableCsrfValidation=false;
    
    public function actionFind()//创建商品查找
    {
        $name = $_POST['name'];
        $sql = "select * from brand_info where name like '%$name%'";
        $res = yii::$app->db->createCommand($sql)->queryAll();
        if($res)
        {
            return $this->render("findd",['res'=>$res]);//成功跳转到findd页面
        }else{
            return $this->render("finddd");
        }
        
    }
}