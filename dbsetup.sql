CREATE TABLE `data` (
  `timestamp` timestamp NOT NULL,
  `heating` tinyint unsigned NOT NULL,
  `target` numeric(7,3) NOT NULL,
  `current` numeric(7,3) NOT NULL,
  `humidity` tinyint unsigned NOT NULL,
  `updated` timestamp NOT NULL,
  PRIMARY KEY (`timestamp`),
  UNIQUE KEY `timestamp` (`timestamp`)
);
