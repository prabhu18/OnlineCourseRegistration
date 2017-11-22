CREATE DEFINER=`yuruk`@`%` TRIGGER `Course_Registration`.`cr_course_student_instructor_AFTER_DELETE` AFTER DELETE ON `cr_course_student_instructor` FOR EACH ROW
BEGIN

	update cr_course_enrollment a
	set a.remaining_seats=a.remaining_seats + 1
	where a.course_id=old.course_id
	and instructor_id=old.instructor_id
	and semester=old.semester;


END;



CREATE DEFINER=`yuruk`@`%` TRIGGER `Course_Registration`.`cr_course_student_instructor_AFTER_INSERT` 
AFTER INSERT ON `cr_course_student_instructor` FOR EACH ROW
BEGIN

	update cr_course_enrollment a
	set a.remaining_seats=a.remaining_seats - 1
	where a.course_id=new.course_id
	and instructor_id=new.instructor_id
	and semester=new.semester;

END;