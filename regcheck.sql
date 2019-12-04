SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `requests_cache` (
  `reg` varchar(7) NOT NULL,
  `cache` json NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `temp_requests` (
  `client_ip` varchar(15) DEFAULT NULL,
  `reg` varchar(7) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `requests_cache`
  ADD PRIMARY KEY (`reg`);
COMMIT;
