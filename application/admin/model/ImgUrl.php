<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 9:53
 */

namespace app\admin\model;


use think\Db;

class ImgUrl extends BaseModel
{
    public static function createImgUrl($params=[]){
        $insert = [
            'info_id'=>$params['i_id'],
            'url'=>$params['img_url'],
        ];
        $result = Db::table('pdzg_img_url')->insertGetId($insert);
        return $result;
    }
}