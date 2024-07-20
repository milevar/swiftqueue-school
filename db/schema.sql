create database if not exists school;

use school;

CREATE TABLE `users`
(
    `id`       int(11)      NOT NULL auto_increment,
    `name`     varchar(100) NOT NULL,
    `email`    varchar(100) NOT NULL UNIQUE,
    `password` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `statuses`
(
    `id`   int(11)      NOT NULL auto_increment,
    `name` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `courses`
(
    `id`         int(11)      NOT NULL auto_increment,
    `name`       varchar(100) NOT NULL,
    `start_date` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `end_date`   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status_id`  int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_courses_statuses`
        FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
);
