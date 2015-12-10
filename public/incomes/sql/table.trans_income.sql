-- 
-- Editor SQL for DB table trans_income
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE `trans_income` (
	`income_no` int(10) NOT NULL auto_increment,
	`id` varchar(255),
	`income_trans` varchar(255),
	`income_category` varchar(255),
	`income_amount` varchar(255),
	`income_date` varchar(255),
	PRIMARY KEY( `income_no` )
);