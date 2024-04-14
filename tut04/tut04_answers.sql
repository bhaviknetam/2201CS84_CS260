-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- Create a database
create database test;
use test;

-- Create tables for storing .csv file
create table departments(
department_id INT Primary Key,
department_name VARCHAR(50),
location VARCHAR(50));

create table employees(
emp_id INT Primary Key,
first_name VARCHAR(50),
last_name VARCHAR(50),
salary DECIMAL,
department_id int,
foreign key (department_id) references departments(department_id));

create table projects(
project_id INT Primary Key,
project_name VARCHAR(50),
budget DECIMAL,
start_date DATE,
end_date DATE);

-- Paste the path of .csv files in the apostrophes.
load data infile 'D:\\2201CS84_CS260-main\\tut04\\departments.csv' into table departments
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile 'D:\\2201CS84_CS260-main\\tut04\\employees.csv' into table employees
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

load data infile 'D:\\2201CS84_CS260-main\\tut04\\projects.csv' into table projects
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 rows;

-- Question 1
select first_name, last_name from employees;

-- Question 2
select * from departments;

-- Question 3
select project_name, budget from projects;

-- Question 4
SELECT e.first_name, e.last_name, e.salary
FROM employees e
JOIN departments d ON e.department_id = d.department_id
WHERE d.department_name = 'Engineering';

-- Question 5
select project_name, start_date from projects;

-- Question 6
SELECT e.first_name, e.last_name, d.department_name
FROM employees e
JOIN departments d ON e.department_id = d.department_id;

-- Question 7
select project_name from projects
where budget > 90000 ;

-- Question 8
SELECT SUM(budget) AS total_budget
FROM projects;

-- Question 9
SELECT first_name, last_name, salary
FROM employees
WHERE salary > 60000;

-- Question 10
SELECT project_name, end_date FROM projects;

-- Question 11
select department_name, location from departments
where location = "New Delhi";

-- Question 12
select avg(salary) as Average_salary from employees;

-- question 13
SELECT e.first_name, e.last_name, d.department_name
FROM employees e
JOIN departments d ON e.department_id = d.department_id
WHERE d.department_name = 'Finance';

-- Question 14
SELECT project_name
FROM projects
WHERE budget BETWEEN 70000 AND 100000;

-- Question 15
SELECT d.department_name, COUNT(e.emp_id) AS employee_count
FROM departments d
LEFT JOIN employees e ON d.department_id = e.department_id
GROUP BY d.department_name;
