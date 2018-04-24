
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- administrator
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `administrator`;

CREATE TABLE `administrator`
(
    `admin_id` INTEGER NOT NULL AUTO_INCREMENT,
    `user_info_id` INTEGER NOT NULL,
    PRIMARY KEY (`admin_id`),
    INDEX `fk_Administrator_user_info1_idx` (`user_info_id`),
    CONSTRAINT `fk_Administrator_user_info1`
        FOREIGN KEY (`user_info_id`)
        REFERENCES `user_info` (`user_id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `categorie_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45),
    `description` VARCHAR(45),
    PRIMARY KEY (`categorie_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- customer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer`
(
    `customer_id` INTEGER NOT NULL AUTO_INCREMENT,
    `men` INTEGER,
    `cat` INTEGER,
    `user_info_id` INTEGER NOT NULL,
    PRIMARY KEY (`customer_id`),
    INDEX `fk_Customer_Mentor1_idx` (`men`),
    INDEX `fk_Customer_Category1_idx` (`cat`),
    INDEX `fk_Customer_user_info1_idx` (`user_info_id`),
    CONSTRAINT `fk_Customer_Category1`
        FOREIGN KEY (`cat`)
        REFERENCES `category` (`categorie_id`),
    CONSTRAINT `fk_Customer_Mentor1`
        FOREIGN KEY (`men`)
        REFERENCES `mentor` (`mentor_id`),
    CONSTRAINT `fk_Customer_user_info1`
        FOREIGN KEY (`user_info_id`)
        REFERENCES `user_info` (`user_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- customer_has_questions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `customer_has_questions`;

CREATE TABLE `customer_has_questions`
(
    `Customer_id` INTEGER NOT NULL,
    `Questions_id` INTEGER NOT NULL,
    PRIMARY KEY (`Customer_id`,`Questions_id`),
    INDEX `fk_Customer_has_Questions_Questions1_idx` (`Questions_id`),
    INDEX `fk_Customer_has_Questions_Customer1_idx` (`Customer_id`),
    CONSTRAINT `fk_Customer_has_Questions_Customer1`
        FOREIGN KEY (`Customer_id`)
        REFERENCES `customer` (`customer_id`),
    CONSTRAINT `fk_Customer_has_Questions_Questions1`
        FOREIGN KEY (`Questions_id`)
        REFERENCES `questions` (`question_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- media
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media`
(
    `Media_id` INTEGER NOT NULL AUTO_INCREMENT,
    `video` TINYINT(1),
    `link` VARCHAR(255),
    `question_id` INTEGER NOT NULL,
    PRIMARY KEY (`Media_id`),
    INDEX `fk_Media_Questions1_idx` (`question_id`),
    CONSTRAINT `fk_Media_Questions1`
        FOREIGN KEY (`question_id`)
        REFERENCES `questions` (`question_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mentor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mentor`;

CREATE TABLE `mentor`
(
    `mentor_id` INTEGER NOT NULL AUTO_INCREMENT,
    `categorie` INTEGER NOT NULL,
    `info` INTEGER NOT NULL,
    PRIMARY KEY (`mentor_id`),
    INDEX `fk_Mentor_Category1_idx` (`categorie`),
    INDEX `fk_Mentor_user_info1_idx` (`info`),
    CONSTRAINT `fk_Mentor_Category1`
        FOREIGN KEY (`categorie`)
        REFERENCES `category` (`categorie_id`),
    CONSTRAINT `fk_Mentor_user_info1`
        FOREIGN KEY (`info`)
        REFERENCES `user_info` (`user_id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- questions
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions`
(
    `question_id` INTEGER NOT NULL AUTO_INCREMENT,
    `question` TEXT,
    `response` TEXT,
    `Category_id` INTEGER NOT NULL,
    `answered` TINYINT(1),
    `datecreated` DATETIME,
    PRIMARY KEY (`question_id`),
    INDEX `fk_Questions_Category1_idx` (`Category_id`),
    CONSTRAINT `fk_Questions_Category1`
        FOREIGN KEY (`Category_id`)
        REFERENCES `category` (`categorie_id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- schedule
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule`
(
    `schedule_id` INTEGER NOT NULL AUTO_INCREMENT,
    `time` DATETIME,
    `datemade` DATETIME,
    `Mentor_id` INTEGER NOT NULL,
    `Customer_id` INTEGER NOT NULL,
    `room` INTEGER,
    PRIMARY KEY (`schedule_id`,`Mentor_id`,`Customer_id`),
    UNIQUE INDEX `datemade_UNIQUE` (`datemade`),
    INDEX `fk_schedule_Mentor1_idx` (`Mentor_id`),
    INDEX `fk_schedule_Customer1_idx` (`Customer_id`),
    CONSTRAINT `fk_schedule_Customer1`
        FOREIGN KEY (`Customer_id`)
        REFERENCES `customer` (`customer_id`),
    CONSTRAINT `fk_schedule_Mentor1`
        FOREIGN KEY (`Mentor_id`)
        REFERENCES `mentor` (`mentor_id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `username` VARCHAR(16) NOT NULL,
    `email` VARCHAR(255),
    `password` VARCHAR(32) NOT NULL,
    `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_info
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info`
(
    `first_name` VARCHAR(45),
    `last_name` VARCHAR(45),
    `phonenum` VARCHAR(45),
    `address` VARCHAR(45),
    `state` VARCHAR(45),
    `city` VARCHAR(45),
    `zipcode` VARCHAR(45),
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(45),
    `username` VARCHAR(45),
    `password` VARCHAR(45),
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
