<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

use Qiniu\Auth;
// 应用公共文件
/**
 * @param string $url get请求地址
 * @param int $httpCode 返回状态码
 * @return mixed
 */
function curl_get($url, &$httpCode = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //不做证书校验,部署在linux环境下请改为true
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}

function getRandChar($length)
{
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol) - 1;

    for ($i = 0;$i < $length;$i++) {
        $str .= $strPol[rand(0, $max)];
    }

    return $str;
}

//后台管理返回
function adminRes($code,$msg,$url=''){
    $res = [
        'code'=>$code,
        'msg'=>$msg,
        'url'=>$url
    ];
    return json_encode($res);
}

//计算消费
function countExpenses($params=[]){
    $cost = 0;
    if(array_key_exists('top',$params)){
        switch ($params['top_time']){
            case 1:
                $cost+=config('expenses.day_1');
                break;
            case 3:
                $cost+=config('expenses.day_3');
                break;
            case 10:
                $cost+=config('expenses.day_10');
                break;
            case 20:
                $cost+=config('expenses.day_20');
                break;
            case 30:
                $cost+=config('expenses.day_30');
        }
    }
    if(array_key_exists('red',$params)){
        $cost+=config('expenses.red');
    }
    if(array_key_exists('bold',$params)){
        $cost+=config('expenses.bold');
    }
    if(array_key_exists('refresh',$params)){
        $cost+=config('expenses.refresh');
    }
    return $cost;
}

//计算置顶费用
function countTopMoney($params=[]){
    $cost = 0;
    if(array_key_exists('top',$params)){
        switch ($params['top_time']){
            case 1:
                $cost+=config('expenses.day_1');
                break;
            case 3:
                $cost+=config('expenses.day_3');
                break;
            case 10:
                $cost+=config('expenses.day_10');
                break;
            case 20:
                $cost+=config('expenses.day_20');
                break;
            case 30:
                $cost+=config('expenses.day_30');
        }
    }
    return $cost;
}

//查看用户等级
function countUserLevel($level){
    $lv = '普通用户';
    if($level > 8){
        $lv = '普通会员';
    }
    if($level > 16){
        $lv = '高级会员';
    }
    if($level > 32){
        $lv = '超级会员';
    }
    if($level > 64){
        $lv = '客服';
    }
    if($level > 128){
        $lv = '管理员';
    }
    if($level > 256){
        $lv = '总管理员';
    }
    if($level > 512){
        $lv = '老板';
    }
    if($level > 1024){
        $lv = '如同神一般';
    }
    return $lv;

}
//检查用户设置是否超越权限

//设置密码混淆
function psMD5($password){
    $password = $password+'xcpdlgy';
    return md5($password);
}

//获取用户
function getAdminName(){
    return \think\Session::get('admin_sxxcpd_user');
}

// 定义一个函数获取客户端IP地址
function getIP(){
    global $ip;
    if (getenv("HTTP_CLIENT_IP")){
        $ip = getenv("HTTP_CLIENT_IP");
    }else if(getenv("HTTP_X_FORWARDED_FOR")){
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    }else if(getenv("REMOTE_ADDR")){
        $ip = getenv("REMOTE_ADDR");
    }else{
        $ip = "Unknow IP";
    }
    return $ip;
}

//获取七牛云的Token 后台
function getQiniuToken(){
    require_once APP_PATH . '/../vendor/qiniu/autoload.php';
    $accessKey = config('qiniu.ACCESSKEY');
    $secretKey = config('qiniu.SECRETKEY');
//        $auth = new Auth($accessKey, $secretKey);
    $auth = new Auth($accessKey, $secretKey);
    $bucket = config('qiniu.BUCKET');
    $upToken = $auth->uploadToken($bucket);
    $filename = 'img'.date('YmdHis',time()).rand(10,100);
    $res = [
        'uploadToken'=>$upToken,
        'filename'=>$filename
    ];
    return json($res);
}

//获取七牛云的Token 小程序
function getQiniuTokenWx(){
    require_once APP_PATH . '/../vendor/qiniu/autoload.php';
    $accessKey = config('qiniu.ACCESSKEY');
    $secretKey = config('qiniu.SECRETKEY');
//        $auth = new Auth($accessKey, $secretKey);
    $auth = new Auth($accessKey, $secretKey);
    $bucket = config('qiniu.BUCKET');
    $upToken = $auth->uploadToken($bucket);
    $res = [
        'uptoken'=>$upToken,
    ];
    return json($res);
}

//类型换算数字id
function getItemId($text){
    $itemId = 0;
    switch ($text){
        case '店铺转让':
            $itemId = 5;
            break;
        case '求转店铺':
            $itemId = 6;
            break;
        case '招工信息':
            $itemId = 7;
            break;
        case '求职信息':
            $itemId = 8;
            break;
        case '对外承包':
            $itemId = 9;
            break;
        case '需求承包':
            $itemId = 10;
            break;
        case '餐具设备':
            $itemId = 11;
            break;
        case '其他物品':
            $itemId = 12;
            break;
    }
    return $itemId;
}


