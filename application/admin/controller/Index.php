<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 17:43
 */

namespace app\admin\controller;


use app\admin\model\User as UserModel;
use app\admin\model\Info as InfoModel;
use app\admin\model\Comment as CommentModel;
use app\admin\model\Order as OrderModel;
use app\admin\model\Money as MoneyModel;
use think\Controller;

class Index extends Controller
{
    public function index(){
        //统计字段
        $result['user_count'] = UserModel::getUserCount();
        $result['user_new_count'] = UserModel::getUserTodayNew();
        $result['info_count'] = InfoModel::getInfoCount();
        $result['info_new_count'] = InfoModel::getInfoTodayNew();
        $result['comment_count'] = CommentModel::getCommentCount();
        $result['comment_new_count'] = CommentModel::getCommentTodayNew();
        $result['money_sum'] = MoneyModel::getTodayMoney();
        $data['count_order'] = OrderModel::getTodayNum();
        $result['count_order_format'] =  $this->formatOrder($data['count_order']);
        //统计文章
        $result['info_new'] = InfoModel::getNewInfo();
        $result['comment_new'] = CommentModel::getNewComment();
        $result['money_new'] = MoneyModel::getNewMoney();
//        print_r($result['money_sum']);
//        return json($result);
        $this->assign('result',$result);
        return $this->fetch();
    }
    //格式化类型 统计
    private function formatOrder($arr=[]){
        $result = [];
        for($i=0;$i<count($arr);$i++){
            switch ($arr[$i]['order_style']){
                case 1:
                    $result['top'] =  $arr[$i]['num'];
                    break;
                case 2:
                    $result['red'] =  $arr[$i]['num'];
                    break;
                case 3:
                    $result['blod'] =  $arr[$i]['num'];
                    break;
                case 4:
                    $result['refresh'] =  $arr[$i]['num'];
                    break;
                case 5:
                    $result['unlocked'] =  $arr[$i]['num'];
                    break;
            }
        }
        return $result;
    }
}