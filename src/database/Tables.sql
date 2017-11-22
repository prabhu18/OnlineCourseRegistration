CREATE TABLE `cr_admin` (
   `user_id` varchar(11) NOT NULL,
   `password` varchar(45) DEFAULT NULL,
   `name` varchar(45) DEFAULT NULL,
   `last_login` timestamp NULL DEFAULT NULL,
   PRIMARY KEY (`user_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 
 CREATE TABLE `cr_cart` (
   `cart_id` varchar(10) NOT NULL,
   `course_id` int(11) NOT NULL,
   `instructor_id` varchar(10) NOT NULL,
   `semester` varchar(10) NOT NULL,
   `add_time` datetime DEFAULT NULL,
   PRIMARY KEY (`cart_id`,`course_id`,`instructor_id`,`semester`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 
 CREATE TABLE `cr_course` (
   `course_id` int(11) NOT NULL,
   `course_name` varchar(45) DEFAULT NULL,
   `degree` varchar(45) DEFAULT NULL,
   `branch` varchar(45) DEFAULT NULL,
   PRIMARY KEY (`course_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 
 
 CREATE TABLE `cr_course_enrollment` (
   `course_id` int(11) NOT NULL,
   `instructor_id` varchar(10) NOT NULL,
   `remaining_seats` int(11) DEFAULT NULL,
   `available_seats` int(11) DEFAULT NULL,
   `class_no` varchar(45) DEFAULT NULL,
   `class_start_time` time DEFAULT NULL,
   `class_end_time` time DEFAULT NULL,
   `class_days` varchar(45) DEFAULT NULL,
   `semester` varchar(45) DEFAULT NULL,
   `curr_Sem` tinyint(1) DEFAULT '0',
   PRIMARY KEY (`course_id`,`instructor_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 
 CREATE TABLE `cr_course_student_instructor` (
   `course_id` int(11) NOT NULL,
   `student_id` varchar(10) NOT NULL,
   `instructor_id` varchar(10) NOT NULL,
   `semester` varchar(45) DEFAULT NULL,
   `grade_secured` varchar(5) DEFAULT NULL,
   PRIMARY KEY (`course_id`,`instructor_id`,`student_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 
 
 CREATE TABLE `cr_courses_for_semester` (
   `course_id` int(11) NOT NULL,
   `semester` varchar(10) NOT NULL,
   `seats` int(11) DEFAULT NULL,
   PRIMARY KEY (`course_id`,`semester`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 
 
 CREATE TABLE `cr_instructors` (
   `instructor_id` varchar(10) NOT NULL,
   `name` varchar(45) DEFAULT NULL,
   `email` varchar(45) DEFAULT NULL,
   `phone` varchar(45) DEFAULT NULL,
   `address` varchar(45) DEFAULT NULL,
   `salary` int(11) DEFAULT NULL,
   PRIMARY KEY (`instructor_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8

 CREATE TABLE `cr_student` (
   `user_id` varchar(30) NOT NULL,
   `name` varchar(45) DEFAULT NULL,
   `degree` varchar(45) DEFAULT NULL,
   `major` varchar(45) DEFAULT NULL,
   `registration_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
   `phone` varchar(45) DEFAULT NULL,
   `email` varchar(45) DEFAULT NULL,
   `gender` varchar(1) DEFAULT NULL,
   `password` varchar(300) DEFAULT NULL,
   PRIMARY KEY (`user_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8
 
 
 CREATE TABLE `cr_university` (
   `net_id` varchar(30) NOT NULL,
   PRIMARY KEY (`net_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8