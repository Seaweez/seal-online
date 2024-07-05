TYPE=TRIGGERS
triggers='CREATE DEFINER=`lulu`@`%` TRIGGER `log_itemBeforeInsert` BEFORE INSERT ON `log_item` FOR EACH ROW begin\n\n  SET @fId = (\n    SELECT AUTO_INCREMENT \n    FROM information_schema.TABLES \n    WHERE TABLE_SCHEMA = DATABASE() \n      AND TABLE_NAME = \'log_item\'\n  );\n\n  SET @afterGold = (\n    select gold\n	  from seal_member.usermsgex\n	  where userId = NEW.user_id\n  );\n\n  insert into log_itemEx (log_itemCode, originalGold, afterGold)\n  values ( @fId, @afterGold + new.item_price, @afterGold );\n\nend'
sql_modes=0
definers='lulu@%'
client_cs_names='latin1'
connection_cl_names='latin1_swedish_ci'
db_cl_names='latin1_swedish_ci'
