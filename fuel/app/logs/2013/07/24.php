<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

ERROR - 2013-07-24 01:24:44 --> Runtime Notice - Non-static method Model_Deck::get_cards() should not be called statically, assuming $this from incompatible context in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 204
ERROR - 2013-07-24 01:38:34 --> Notice - Undefined variable: cards in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/card.php on line 106
ERROR - 2013-07-24 03:49:49 --> Notice - Use of undefined constant deck_id - assumed 'deck_id' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 117
ERROR - 2013-07-24 04:12:36 --> Notice - Undefined variable: data in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resourse.php on line 32
ERROR - 2013-07-24 04:16:12 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 226
ERROR - 2013-07-24 04:20:19 --> Warning - Missing argument 2 for Model_Resourse::save_resource(), called in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 227 and defined in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resourse.php on line 30
ERROR - 2013-07-24 04:34:19 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '108' for key 'PRIMARY' with query: "INSERT INTO `resources` (`user_id`, `deck_id`, `card_id`, `resource`, `created_at`, `updated_at`) VALUES (('3'), '51c12d64eace1', '108', 'practice', 1374654859, null)" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-07-24 04:34:38 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '110' for key 'PRIMARY' with query: "INSERT INTO `resources` (`user_id`, `deck_id`, `card_id`, `resource`, `created_at`, `updated_at`) VALUES (('3'), '51c12d64eace1', '110', 'practice', 1374654878, null)" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-07-24 04:35:51 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '103' for key 'PRIMARY' with query: "INSERT INTO `resources` (`user_id`, `deck_id`, `card_id`, `resource`, `created_at`, `updated_at`) VALUES (('3'), '51c12d64eace1', '103', 'practice', 1374654951, null)" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-07-24 04:36:33 --> Error - SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'field list' with query: "INSERT INTO `resources` (`user_id`, `deck_id`, `card_id`, `resource`, `created_at`, `updated_at`) VALUES (('3'), '51c12d64eace1', '109', 'practice', 1374654993, null)" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-07-24 11:59:03 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`WFP_2sided`.`resources`, CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)) with query: "INSERT INTO `resources` (`user_id`, `deck_id`, `card_id`, `resource`, `created_at`, `updated_at`) VALUES ((''), '51c12d64eace1', '110', 'practice', 1374681543, null)" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-07-24 12:17:52 --> Parsing Error - syntax error, unexpected 'function' (T_FUNCTION), expecting identifier (T_STRING) in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resourse.php on line 56
ERROR - 2013-07-24 12:18:13 --> Runtime Notice - Non-static method Model_Resourse::check_resource() should not be called statically, assuming $this from incompatible context in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:18:16 --> Runtime Notice - Non-static method Model_Resourse::check_resource() should not be called statically, assuming $this from incompatible context in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:18:17 --> Runtime Notice - Non-static method Model_Resourse::check_resource() should not be called statically, assuming $this from incompatible context in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:18:17 --> Runtime Notice - Non-static method Model_Resourse::check_resource() should not be called statically, assuming $this from incompatible context in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:18:55 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:33 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:34 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:35 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:35 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:36 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:37 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:37 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 12:19:38 --> Notice - Undefined property: Controller_Ajax::$user in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 239
ERROR - 2013-07-24 13:17:19 --> Error - Class 'Model_Resource' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 248
ERROR - 2013-07-24 13:17:46 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:46 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:47 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:47 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:48 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:48 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:48 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:48 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:50 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:50 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:50 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:50 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:51 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:51 --> Error - Class 'Model_Resourse' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:52 --> Error - Class 'Model_Resource' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:52 --> Error - Class 'Model_Resource' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:52 --> Error - Class 'Model_Resource' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:52 --> Error - Class 'Model_Resource' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:55 --> Error - Class 'Model_Resource' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:17:55 --> Error - Class 'Model_Resource' not found in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/ajax.php on line 242
ERROR - 2013-07-24 13:29:45 --> Error - Call to a member function delete() on a non-object in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 84
ERROR - 2013-07-24 13:30:08 --> Error - Call to a member function delete() on a non-object in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 84
ERROR - 2013-07-24 13:38:22 --> Error - Call to a member function delete() on a non-object in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 84
ERROR - 2013-07-24 13:38:38 --> Error - Call to a member function delete() on a non-object in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 84
ERROR - 2013-07-24 13:39:03 --> Parsing Error - syntax error, unexpected 'return' (T_RETURN) in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 87
ERROR - 2013-07-24 13:39:03 --> Parsing Error - syntax error, unexpected 'return' (T_RETURN) in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 87
ERROR - 2013-07-24 13:40:58 --> Error - Call to a member function delete() on a non-object in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 84
ERROR - 2013-07-24 13:41:17 --> Error - Call to a member function delete() on a non-object in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 84
ERROR - 2013-07-24 17:48:12 --> Notice - Undefined index: resource in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 41
ERROR - 2013-07-24 17:51:17 --> Notice - Undefined index: resource in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 41
ERROR - 2013-07-24 18:40:20 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 38
ERROR - 2013-07-24 18:41:03 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:05 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:05 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:06 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:06 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:09 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:09 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:09 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:10 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:10 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:10 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:11 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:11 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:11 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:11 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:11 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:12 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:12 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:12 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:12 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:13 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:13 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:13 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:13 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:32 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:32 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:32 --> Parsing Error - syntax error, unexpected ';', expecting ')' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 39
ERROR - 2013-07-24 18:41:40 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:41 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:41 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:41 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:41 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:42 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:42 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:42 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:42 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:43 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:43 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:43 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:43 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:44 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:44 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:44 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:44 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:45 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:41:45 --> Notice - Undefined property: Controller_Study::$user_id in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/controller/study.php on line 27
ERROR - 2013-07-24 18:42:50 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:50 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:51 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:51 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:51 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:52 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:52 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:52 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:53 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:53 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:53 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:53 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:54 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 18:42:54 --> Notice - Undefined variable: resources in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/views/study/index.php on line 4
ERROR - 2013-07-24 19:21:10 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`WFP_2sided`.`resources`, CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)) with query: "INSERT INTO `resources` (`user_id`, `deck_id`, `card_id`, `resource`, `created_at`, `updated_at`) VALUES ('', '51c12d64eace1', '109', 'practice', 1374708069, null)" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-07-24 19:35:21 --> Notice - Use of undefined constant Model_Card - assumed 'Model_Card' in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/app/classes/model/resource.php on line 50
ERROR - 2013-07-24 19:35:37 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'deck_id' in where clause is ambiguous with query: "SELECT * FROM `resources` JOIN `cards` ON (`cards`.`id` = `resources`.`card_id`) WHERE `user_id` = '3' AND `deck_id` = '51c12d64eace1'" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
ERROR - 2013-07-24 19:35:38 --> 23000 - SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'deck_id' in where clause is ambiguous with query: "SELECT * FROM `resources` JOIN `cards` ON (`cards`.`id` = `resources`.`card_id`) WHERE `user_id` = '3' AND `deck_id` = '51c12d64eace1'" in /Users/kristymiller/Sites/2013-07_WFP-2sided/fuel/core/classes/database/pdo/connection.php on line 208
