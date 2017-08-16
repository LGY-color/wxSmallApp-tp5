/**
 * Created by Administrator on 2017/7/21.
 */
//获取checkbox的值
function getCheckBox(ele) {
    var box_array=new Array();
    $("input[name='"+ele+"']:checked").each(function(){
        box_array.push($(this).val());//向数组中添加元素
    });
    var box_str=box_array.join(',');//将数组元素连接起来以构建一个字符串
//        console.log(idstr);
    return box_str;
}
