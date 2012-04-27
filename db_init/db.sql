CREATE TABLE  `urllibrary`.`tbl_user` (
`user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`username` VARCHAR( 32 ) NULL ,
`realname` VARCHAR( 512 ) NULL ,
`email` VARCHAR( 512 ) NULL ,
`password` VARCHAR( 64 ) NULL ,
`reg_code` VARCHAR( 12 ) NOT NULL ,
`activated` TINYINT NULL DEFAULT  '0'
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;