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

-- 查询表
SELECT i.id,s1.item_name,s2.item_name FROM `pdzg_info` i 
JOIN `pdzg_small_item` s1 ON i.valid_period = s1.id
JOIN `pdzg_small_item` s2 ON i.monthly_rent = s2.id
;

-- 更新关联表数字
UPDATE `pdzg_info` AS i SET valid_period = (SELECT id FROM `pdzg_small_item` AS s WHERE i.valid_period = s.item_name);