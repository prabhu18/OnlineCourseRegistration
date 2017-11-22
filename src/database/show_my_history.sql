CREATE DEFINER=`yuruk`@`%` PROCEDURE `show_my_history`(IN studentID varchar(10), IN currflag INT)
BEGIN

	if currflag=1 then

		select b.course_id,b.instructor_id,b.semester,
		c.name,a.grade_secured
		from cr_course_student_instructor a
		join cr_course_enrollment b on ( a.course_id=b.course_id and 
		a.instructor_id=b.instructor_id and a.semester=b.semester)
		join cr_instructors c on (a.instructor_id=c.instructor_id)
		where a.student_id=studentID and b.curr_Sem=1;

	else


		select b.course_id,b.instructor_id,b.semester,
		c.name,a.grade_secured
		from cr_course_student_instructor a
		join cr_course_enrollment b on ( a.course_id=b.course_id and 
		a.instructor_id=b.instructor_id and a.semester=b.semester)
		join cr_instructors c on (a.instructor_id=c.instructor_id)
		where a.student_id=studentID and b.curr_Sem=0;


	end if;

END