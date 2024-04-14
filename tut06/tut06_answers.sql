-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- Create Database named "test"
create database if not exists demo;
use demo;

-- Create tables for importing .csv files
create table students(student_id int primary key, first_name varchar(50), last_name varchar(50), age int, city varchar(50));
create table instructors(instructor_id int primary key, first_name varchar(20), last_name varchar(20));
create table courses(course_id int primary key, course_name varchar(20), instructor_id int, foreign key (instructor_id) references instructors(instructor_id)); 
create table enrollments(enrollment_id int primary key, student_id int, course_id int, grade varchar(5),foreign key (student_id) references students(student_id),foreign key (course_id) references courses(course_id));

-- Load all .csv files into tables
-- Paste the path of .csv file in below apostrophe for all files
load data infile "D:/2201CS84_CS260-main/tut06/students.csv" into table students
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile "D:/2201CS84_CS260-main/tut06/instructors.csv" into table instructors
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;


load data infile "D:/2201CS84_CS260-main/tut06/courses.csv" into table courses
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile "D:/2201CS84_CS260-main/tut06/enrollments.csv" into table enrollments
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

-- Question 1
SELECT s.first_name, s.last_name, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id;

-- Question 2
SELECT c.course_name, e.grade
FROM enrollments e
JOIN courses c ON e.course_id = c.course_id;

-- Question 3
SELECT s.first_name, s.last_name, c.course_name, 
CONCAT(i.first_name, ' ', i.last_name) AS instructor_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
JOIN instructors i ON c.instructor_id = i.instructor_id;

-- Question 4
SELECT s.first_name, s.last_name, s.age, s.city
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
WHERE c.course_name = 'Mathematics';

-- Question 5
SELECT c.course_name, CONCAT(i.first_name, ' ', i.last_name) AS instructor_name
FROM courses c
JOIN instructors i ON c.instructor_id = i.instructor_id;

-- Question 6
SELECT s.first_name, s.last_name, e.grade, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id;

-- Question 7
SELECT s.first_name, s.last_name, s.age
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
GROUP BY s.student_id
HAVING COUNT(*) > 1;

-- Question 8
SELECT c.course_name, COUNT(e.student_id) AS num_students
FROM courses c
LEFT JOIN enrollments e ON c.course_id = e.course_id
GROUP BY c.course_id;

-- Question 9
SELECT first_name, last_name, age
FROM students
WHERE student_id NOT IN (SELECT student_id FROM enrollments);

-- Question 10
SELECT c.course_name, AVG(e.grade) AS avg_grade
FROM courses c
LEFT JOIN enrollments e ON c.course_id = e.course_id
GROUP BY c.course_id;

-- Question 11
SELECT s.first_name, s.last_name, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
WHERE e.grade < 'B' OR e.grade = 'B+';

-- Question 12
SELECT c.course_name, CONCAT(i.first_name, ' ', i.last_name) AS instructor_name
FROM courses c
JOIN instructors i ON c.instructor_id = i.instructor_id
WHERE i.last_name LIKE 'S%';

-- Question 13
SELECT s.first_name, s.last_name, s.age
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
JOIN instructors i ON c.instructor_id = i.instructor_id
WHERE i.first_name = 'Dr. Akhil';

-- Question 14
SELECT c.course_name, MAX(e.grade) AS max_grade
FROM courses c
LEFT JOIN enrollments e ON c.course_id = e.course_id
GROUP BY c.course_id;

-- Question 15
SELECT s.first_name, s.last_name, s.age, c.course_name
FROM students s
JOIN enrollments e ON s.student_id = e.student_id
JOIN courses c ON e.course_id = c.course_id
ORDER BY c.course_name ASC;
