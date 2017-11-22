CREATE DEFINER=`yuruk`@`%` PROCEDURE `view_all_courses`(IN indegree varchar(45),IN inbranch varchar(45), IN insemester varchar(45))
BEGIN


	if indegree = 'all' then
		set indegree=null;
	end if;

	if inbranch='all' then
		set inbranch=null;
	end if;


	if insemester='all' then
		set insemester=null;
	end if;


	select a.*,c.instructor_id,c.name,b.remaining_seats,
	b.available_seats,b.class_no,b.class_start_time,
	b.class_end_time,b.class_days,b.semester
	from cr_course a
	join cr_course_enrollment b on ( a.course_id=b.course_id)
	join cr_instructors c on ( b.instructor_id=c.instructor_id)
	where 
		(indegree is null or a.degree=indegree)
	and (inbranch is null or a.branch=inbranch)
	and (insemester is null or b.semester=insemester)
	group by b.course_id,b.instructor_id;


END
