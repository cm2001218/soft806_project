create database if not exists `soft806assingment1`;
use soft806assingment1;
create table if not exists `users` (
	`id` int(10) not null auto_increment primary key,
	`username` varchar(20) not null default "" comment 'user name',
	`passwd` char(32) not null comment 'password of user, md5',
	UNIQUE key `username` (`username`) 
)default CHARSET="utf8mb4" engine="INNODB";








