CREATE TABLE  `urllibrary`.`tbl_user` (
`user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`username` VARCHAR( 32 ) NULL ,
`realname` VARCHAR( 512 ) NULL ,
`email` VARCHAR( 512 ) NULL ,
`password` VARCHAR( 64 ) NULL
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `urllibrary`.`tbl_url` ( 
`url_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
`shorturl_code` VARCHAR(10) NULL, 
`description` TEXT NULL, 
`user_id` INT(11) NOT NULL, 
FOREIGN KEY (user_id) 
	REFERENCES tbl_user(user_id) ON DELETE CASCADE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
