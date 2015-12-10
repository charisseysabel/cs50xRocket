-- 
-- Editor SQL for DB table inventory
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE `inventory` (
	`item_no` int(10) NOT NULL auto_increment,
	`product` varchar(255),
	`supplier_name` varchar(255),
	`category` varchar(255),
	`unit_price` varchar(255),
	`retail_price` varchar(255),
	PRIMARY KEY( `item_no` )
);