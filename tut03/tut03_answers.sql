-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- Create Database named "test"
create database test;
use test;

-- Create tables for importing .csv files
create table students(student_id int primary key, first_name varchar(50), last_name varchar(50), age int, city varchar(50), state varchar(20));
create table instructors(instructor_id int primary key, first_name varchar(20), last_name varchar(20), email varchar(50));
create table courses(course_id int primary key, course_name varchar(20), credit_hours int, instructor_id int, foreign key (instructor_id) references instructors(instructor_id)); 
create table enrollments(enrollment_id int primary key, student_id int, course_id int, enrollment_date date, grade varchar(5),foreign key (student_id) references students(student_id),foreign key (course_id) references courses(course_id));

-- Load all .csv files into tables
-- Paste the path of .csv file in below apostrophe for all files
load data infile './students.csv' into table students
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile './instructors.csv' into table instructors
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile './courses.csv' into table courses
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile './enrollments.csv' into table enrollments
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

-- Question 1
select first_name,last_name  from students;

-- Question 2
select course_name,credit_hours from courses;

-- Question 3
select first_name,last_name,email from instructors;

-- Question 4
select enrollments.student_id, courses.course_name, enrollments.grade
from enrollments
inner join courses
on enrollments.course_id = courses.course_id;

-- Question 5
select first_name, last_name, city from students;

-- Question 6
select courses.course_name, instructors.first_name, instructors.last_name
from courses
inner join instructors
on courses.instructor_id = instructors.instructor_id;

-- Question 7
select first_name, last_name, age from students;

-- Question 8
select enrollments.student_id, courses.course_name, enrollments.enrollment_date
from enrollments
inner join courses
on enrollments.course_id = courses.course_id;

-- Question 9
SELECT CONCAT(first_name, ' ', last_name) AS instructors_name, email
FROM instructors;

-- Question 10
select course_name, credit_hours from courses;

-- Question 11
select courses.course_name, instructors.first_name, instructors.last_name, instructors.email
from courses
inner join instructors
on courses.instructor_id = instructors.instructor_id
where courses.course_name = "Mathematics";

-- Question 12
select enrollments.student_id, courses.course_name, enrollments.grade
from enrollments
inner join courses
on enrollments.course_id = courses.course_id
where enrollments.grade = "A";

-- Question 13
select courses.course_name, students.first_name, students.last_name, students.state
from enrollments
inner join courses
on enrollments.course_id= courses.course_id
inner join students
on enrollments.student_id = students.student_id
where courses.course_name = "Computer Science";

-- Question 14
select enrollments.student_id, courses.course_name, enrollments.enrollment_date
from enrollments
inner join courses
on enrollments.course_id = courses.course_id
where enrollments.grade = "B+";

-- Question 15
select concat(instructors.first_name,' ',instructors.last_name) as instructors_name, instructors.email
from courses
inner join instructors
on courses.instructor_id = instructors.instructor_id
where courses.credit_hours > 3;
