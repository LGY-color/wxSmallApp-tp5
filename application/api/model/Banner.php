<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/30
 * Time: 16:46
 */

namespace app\api\model;

//banner图片
class Banner extends BaseModel
{
//    不用获取的字段
    protected $hidden = [
        'url_text',
        'create_time',
        'update_time',
        'status'
    ];
//    获取banner的imgurl内容
    public static function getBannerImgUrl(){
        $condition = [
            'url_text' => 1,
            'status' => 1
        ];
        $data = Banner::all($condition);
        return $data;
    }
//    获取banner的textcontent内容
    public static function getBannerTextContent(){
        $condition = [
            'url_text' => 2
        ];
        $data = Banner::all($condition);
        return $data;
    }
}