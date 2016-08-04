CREATE TABLE `ezpz`.`admin` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `created` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
SELECT * FROM `restaurants`
ALTER TABLE `restaurants` ADD `created` DATE NOT NULL AFTER `email`;