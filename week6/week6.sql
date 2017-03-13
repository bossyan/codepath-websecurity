ALTER TABLE users
DROP hashed_password;

ALTER TABLE users
ADD hashed_password varchar(255);

DROP TABLE IF EXISTS `failed_logins`;
CREATE TABLE `failed_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `count` varchar(255) DEFAULT NULL,
  `last_attempt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1;