项目采用ThinkPHP5.0 开发api 规范参考豆瓣api
版本 thinkphp_5.0.9_full
统一编码UTF-8


1.规定http协议作用
GET    用来获取资源，
POST  用来新建资源（也可以用于更新资源），
PUT    用来更新资源，
DELETE  用来删除资源。

2.规定api返回格式
json
{
    code:;<!--状态吗-->
    msg:;<!--提示消息-->
    data:;<!--数据-->
}

3.返回状态说明
状态码	含义	        说明
200	   OK	        请求成功
201	   CREATED  	创建成功
202	   ACCEPTED	    更新成功
400	   BAD REQUEST	请求的地址不存在或者包含不支持的参数
401	   UNAUTHORIZED	未授权
403	   FORBIDDEN	被禁止访问
404	   NOT FOUND	请求的资源不存在

