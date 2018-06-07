

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



INSERT INTO users (`user_id`,`first_name`,`last_name`,`user_email`,`user_pass`,`joining_date`) 
VALUES ('1','psn','karki','psn@psn.com','psn','5/28/2018'),
VALUES ('36','test','test','test@test.com','testtest','5/28/2018'),
VALUES ('31','test1','val','test1@val.com','test1val','5/28/2018')

-- TO reset password 
-- but its hash value is stored in database ; we will update from the update function in user class
UPDATE INTO users 
  SET user_email ="test@test.com", user_pass ="poshan"
  WHERE user_email="test@test.com";



-- PRODUCTS TABLE
-- PRODUCTS


CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
    `description` varchar(60) NOT NULL,
  `price` varchar(15) NOT NULL,
  `category_id` int(15) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



UPDATE `products` SET `p_id` = '2', `name` = 'Bio', `category_id` = '2', `category_name` = 'Vodka' WHERE `products`.`p_id` = 5;
-- dropping colum category_name
ALTER TABLE products DROP COLUMN category_name;

-- Category Table
-- category

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `category` (`c_id`, `name`, `created`) VALUES ('1', 'wine', CURRENT_TIMESTAMP);
INSERT INTO `category` (`c_id`, `name`, `created`) VALUES ('2', 'Vodka', CURRENT_TIMESTAMP);
INSERT INTO `category` (`c_id`, `name`, `created`) VALUES ('3', 'Rum', CURRENT_TIMESTAMP);
INSERT INTO `category` (`c_id`, `name`, `created`) VALUES ('4', 'Whisky', CURRENT_TIMESTAMP);
INSERT INTO `category` (`c_id`, `name`, `created`) VALUES ('5', 'Soft Darinks', CURRENT_TIMESTAMP);

-- department table

CREATE TABLE IF NOT EXISTS `department` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(15) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `department` (`d_id`, `d_name`) VALUES ('1', 'IT');
INSERT INTO `department` (`d_id`, `d_name`) VALUES ('2', 'Civil');
INSERT INTO `department` (`d_id`, `d_name`) VALUES ('3', 'Mechanical');
INSERT INTO `department` (`d_id`, `d_name`) VALUES ('4', 'Account');
INSERT INTO `department` (`d_id`, `d_name`) VALUES ('5', 'Health');


-- Employee Table
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(15) NOT NULL,
    `e_add` varchar(60) NOT NULL,
  `e_depart` varchar(25) NOT NULL,
  `e_title` varchar(25) NOT NULL,
  `e_dob` timestamp NOT NULL,
  `e_join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


ALTER TABLE `employee` ADD UNIQUE(`emp_id`);


INSERT INTO `employee` (`emp_id`, `e_name`, `e_add`, `e_depart`, `e_title`, `e_dob`, `e_join_date`) 
VALUES ('11', 'Psn', 'kmpt', 'it', 'prg', '2018-06-21', '2018-06-11'),
VALUES ('12', 'rsn', 'npl', 'Civil', 'Eng', '2018-06-21', '2018-06-11'),
VALUES ('13', 'gsn', 'kmpt', 'Mechanical', 'Eng', '2018-06-21', '2018-06-11'),
VALUES ('14', 'tsn', 'npl', 'it', 'prg', '2018-06-21', '2018-06-11'),
VALUES ('15', 'Ps', 'kmpt', 'Account', 'Accountant', '2018-06-21', '2018-06-11'),
VALUES ('16', 'sn', 'kmpt', 'Health', 'Doctor', '2018-06-21', '2018-06-11');

-- to eliminate duplicate for unique key drop the rows
DELETE FROM `employee` WHERE `employee`.`e_id` BETWEEN 7 AND 100

-- adding employee_id
ALTER TABLE `employee`
ADD `emp_id` int(11) NOT NULL;


-- making it unique
ALTER TABLE `employee`
ADD CONSTRAINT employee_unique UNIQUE (emp_id);


CREATE TABLE task (
  emp_id varchar(10) NOT NULL,
  t_title varchar(50) NOT NULL,
  t_desc varchar(50) NOT NULL,
  t_attach LONGBLOB NOT NULL,
  t_deadline date NOT NULL,

) ENGINE=INNODB;



INSERT INTO `task` (`emp_id`, `t_title`, `t_desc`, `t_attach`, `t_deadline`)
 VALUES ('11', 'task2', 'task', 'image/image2.jpg', '2018-06-04')

-- altering table employee engine type to create the relation
ALTER TABLE employee ENGINE = InnoDB;

-- making same data type for foreign key
ALTER TABLE `task` CHANGE `emp_id` `emp_id` INT(10) NOT NULL;

-- adding foreign key emp_id on table task from reference table employee
ALTER TABLE `task` ADD CONSTRAINT `ftaskemp1` FOREIGN KEY (`emp_id`) 
REFERENCES `employee`(`emp_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

INSERT INTO `task` (`emp_id`, `t_title`, `t_desc`, `t_attach`, `t_deadline`) 
VALUES ('101', 'task2', 'task', 'image2.jpg', '2018-06-06');