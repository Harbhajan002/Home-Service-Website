create database webservice;
use webservice;
CREATE TABLE customer (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(50),
    customer_email VARCHAR(100),
    customer_phone VARCHAR(20),
    message TEXT,
    service_id int,
    curr_date date,
    FOREIGN KEY (service_id) REFERENCES service(service_id)
);
alter table customer add column status_id boolean default false;
create table xportsoft(
name varchar(50),
email varchar(50),
phone varchar(15),
message text);
CREATE TABLE user_role (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(50),
    permission  json
);
insert into user_role( role_name, permission)
values('Admin', JSON_ARRAY('1','2','3','4')),
('Sub Admin', JSON_ARRAY('1','2','3')),
('Viewer', JSON_ARRAY('1','2'));
CREATE TABLE navigation (
    nav_id INT PRIMARY KEY AUTO_INCREMENT,
    nav_name VARCHAR(50),
    nav_link  varchar(100)
);
select * from user_role;
select * from navigation;
SELECT nav_id from navigation where nav_link= 'create_service';
insert into navigation(nav_name, nav_link) values
('Dashboard', 'dashboard'),
('Service List', 'service_list'),
('Create User', 'signup'),
('Create Service', 'create_service');
desc customer;
select*from customer;
SELECT * FROM customer WHERE status_id = FALSE and curr_date between '04/07/2024' and '05/06/2024' and service_id = 1;
SELECT * FROM customer where  status_id = FALSE and curr_date between '2024-04-30' and '2024-04-30' ;
SELECT * FROM customer ;
CREATE TABLE admin_dashboard (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    password VARCHAR(100),
    email VARCHAR(50)  ,
    image_path varchar(255),
    role_id int
);

SELECT * FROM admin_dashboard;
desc contact;
create table service (
service_id int primary key auto_increment, 
service_name varchar(50), 
service_image varchar(255),
isactive boolean default true,
service_description text,
gallery json,
prize decimal,
service_detail text
);
desc service;
insert into service (service_name, service_image, service_description, gallery_1, gallery_2, gallery_3, gallery_4, prize, service_detail )
values('Home cleaning',
'./assets/image/service-1.jpg',
'Transform your home into a sanctuary with our meticulous cleaning services.',
'./assets/image/service-gallery-4.jpg',
'./assets/image/service-gallery-6.jpg',
'./assets/image/service-gallery-8.jpg',
'./assets/image/service-gallery-5.jpg',
'20',
'At Homeease, we understand that your time is valuable, and maintaining a clean home can be time-consuming. That''
s why we offer a professional and reliable cleaning service tailored to your needs. Whether you need a one-time deep clean, 
regular maintenance, or specialized cleaning for a special occasion, we''
ve got you covered.');


select*from admin_dashboard;