<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;

class GoodsController extends Controller
{
    public $enableCsrfValidation = false;
    //基本信息
    public function actionIndex(){
        parse_str(file_get_contends("php://input"),$data);
        $id = $data['id'];
        $goods = Goods::findOne($id);
        foreach($data as $key => $val){
            $news -> key = $val;
            $status = $goods ->save();
            if($status){
                echo json_encode(['code'=>0,'msg'=>'修改成功']);exit();
            }else{
                echo json_encode(['code'=>1,'msg'=>'修改失败']);exit();
            }
        }
     }
     //商品属性：
    public function actionShuxing(){
        parse_str(file_get_contends("php://input"),$data);
        $id = $data['id'];
        $str = $this->shuxing_do($data);
        $sql = "UPDATE brand_info SET $str where id = '$id'";
        $info = yii::$app->db->createCommand($sql)->execute();
        if($info){
            echo json_encode(['code'=>0,'msg'=>'商品属性修改成功'])；
        }else{
            echo json_encode(['code'=>1,'msg'=>'商品属性修改失败'])；
        }
    }

    public function shuxing_do($data){
       $str = "";
       foreach($data as $k=>$v){
           $str .= "$k='$v',";
       }
       $str = trim($str,',');
       return $str;
    }

}







?>