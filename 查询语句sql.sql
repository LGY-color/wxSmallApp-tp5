-- 关联表查询 分别查出大类和小类
SELECT b.item_name AS big,s.item_name AS small FROM
`pdzg_item_relevance` AS l LEFT JOIN `pdzg_small_item` AS s ON
s.id = l.small_item_id LEFT JOIN `pdzg_big_item` AS b ON
b.id = l.big_item_id WHERE b.item_type = 2;

-- 关联表查询 分别查出大类和小类 还有小类的子类
SELECT b.item_name AS big,s.item_name AS small,ss.item_name AS smallson FROM
`pdzg_item_relevance` AS l LEFT JOIN `pdzg_small_item` AS s ON
s.id = l.small_item_id LEFT JOIN `pdzg_big_item` AS b ON
b.id = l.big_item_id LEFT JOIN `pdzg_small_item` AS ss ON
ss.item_type_id = s.id 
WHERE b.item_type = 2;