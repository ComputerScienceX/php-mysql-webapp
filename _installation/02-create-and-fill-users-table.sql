CREATE TABLE IF NOT EXISTS `login`.`users3` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  'prem' boolean(),
  `os` VARCHAR(200) NULL,
`browser` VARCHAR(200) NULL,
`device` VARCHAR(200) NULL,
`ip` VARCHAR(200) NULL,

  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


CREATE TABLE IF NOT EXISTS `login`.`admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';


USE csx2;
INSERT likes2
SET count = count + 1, views = views + 1, pageName = 'page2', ID = 2;

CREATE TABLE `csx2`.`likes2` (
ID int NOT NULL,
`pageName` VARCHAR(50) NULL,
`count` BIGINT NOT NULL,
`views` BIGINT NOT NULL,
  PRIMARY KEY (ID)
);

USE csx2; SELECT count FROM likes2 WHERE pageName = 'page1';


CREATE TABLE `csx2`.`deviceinfo4` (
ID int NOT NULL,
`os` VARCHAR(200) NULL,
`browser` VARCHAR(200) NULL,
`device` VARCHAR(200) NULL,

`ip` VARCHAR(200) NULL,
  PRIMARY KEY (ID)
);
