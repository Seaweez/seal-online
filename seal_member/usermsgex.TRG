TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `totgoldUpdate` BEFORE UPDATE ON `usermsgex` FOR EACH ROW begin\n\n	#if NEW.gold > OLD.gold then\n	#  set NEW.totalgold = NEW.totalgold + NEW.gold - OLD.gold +1;\n	#end if;\n	set @session_user = SESSION_USER();\n	if LEFT(@session_user, 4) = "pay@" then\n	#if LEFT(@session_user, 5) = "3pay@" then\n		insert into seal_member.ChargingLog(\n			id, userId, beforeGold, afterGold, updateTime, sessionUser\n		) values(\n			uuid(), OLD.userId, OLD.gold, NEW.gold, NOW(), @session_user\n		);\n	end if;\nend'
sql_modes=0
definers='root@localhost'
client_cs_names='latin1'
connection_cl_names='latin1_swedish_ci'
db_cl_names='latin1_swedish_ci'
