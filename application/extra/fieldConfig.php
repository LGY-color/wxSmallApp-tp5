<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/1
 * Time: 23:16
 */
return [
    'FIELD' => [
        'i.*',
        'bi.item_name,bi.id as bi_id'
    ],
    'JOIN'=>[
        ['pdzg_big_item bi','bi.id=i.big_item_id','LEFT'],
    ],
];