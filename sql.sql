

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
VALUES ('1','psn','karki','psn@psn.com','psn','5/28/2018')





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