<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2013-06-13 11:10:14 --> Error - The requested view could not be found: layout in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/view.php on line 388
ERROR - 2013-06-13 11:10:30 --> Warning - Creating default object from empty value in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/dashboard.php on line 8
ERROR - 2013-06-13 11:11:44 --> Notice - Undefined variable: head in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/template.php on line 7
ERROR - 2013-06-13 11:12:18 --> Notice - Undefined variable: head in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/template.php on line 7
ERROR - 2013-06-13 11:12:19 --> Notice - Undefined variable: head in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/template.php on line 7
ERROR - 2013-06-13 11:12:48 --> Notice - Undefined variable: view in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/dashboard.php on line 16
ERROR - 2013-06-13 11:12:49 --> Notice - Undefined variable: view in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/dashboard.php on line 16
ERROR - 2013-06-13 11:12:54 --> Notice - Undefined variable: header in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/template.php on line 10
ERROR - 2013-06-13 11:13:11 --> Error - The requested view could not be found: included/logged_in/header in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/view.php on line 388
ERROR - 2013-06-13 11:13:21 --> Notice - Undefined variable: content in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/template.php on line 11
ERROR - 2013-06-13 11:23:57 --> Error - The requested view could not be found: layout in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/view.php on line 388
ERROR - 2013-06-13 11:24:23 --> Error - The requested view could not be found: layout in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/view.php on line 388
ERROR - 2013-06-13 11:35:49 --> Parsing Error - syntax error, unexpected '}', expecting ',' or ';' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/authentication.php on line 14
ERROR - 2013-06-13 12:58:38 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'password' in 'where clause' with query: "SELECT * FROM `users` WHERE (`username` = 'kmills006' OR `email` = 'kmills006') AND `password` = '4qXtdSvrsa95sWKUVrILEiacLQOIuK+IAft2UWI/XBg='" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-06-13 13:00:45 --> Notice - Array to string conversion in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/user.php on line 23
ERROR - 2013-06-13 13:04:50 --> Error - Call to undefined function PBKDF2() in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/user.php on line 25
ERROR - 2013-06-13 13:08:09 --> Parsing Error - syntax error, unexpected ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/user.php on line 47
ERROR - 2013-06-13 13:08:27 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'profile_fields' in 'field list' with query: "INSERT INTO `users` (`username`, `password`, `email`, `group`, `profile_fields`, `last_login`, `login_hash`, `created_at`) VALUES ('blazer', 'CetjZR+IpMsorQS3oO7xz/ecSbGBONwRE36QM+v8c4k=', 'blazer@gmail.com', 1, 'a:0:{}', 0, '', 1371143307)" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-06-13 13:09:10 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'login_hash' in 'field list' with query: "UPDATE `users` SET `last_login` = 1371143350, `login_hash` = '05a969c51e2c76b546d0d718e778291f99d7ade6' WHERE `username` = 'kmills006'" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
