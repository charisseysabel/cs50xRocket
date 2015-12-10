-- 
-- Editor SQL for DB table expense
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE `expense` (
	`exp_no` int(10) NOT NULL auto_increment,
	`id` varchar(255),
	`exp_trans` varchar(255),
	`exp_category` varchar(255),
	`exp_amount` varchar(255),
	`exp_date` varchar(255),
	PRIMARY KEY( `exp_no` )
);