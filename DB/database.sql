create database blog;
use blog;
create table if not exists users(
id int auto_increment primary key ,
name varchar(100) not null,
email varchar(100) unique not null,
phone varchar (12),
password varchar(50),
role enum('subscriber','admin'),
created_at timestamp default current_timestamp,
updated_at timestamp  default current_timestamp
);

create table if not exists posts(
id int auto_increment primary key ,
title varchar(100),
content text,
created_at timestamp default current_timestamp,
updated_at timestamp default current_timestamp,
 user_id int ,  
 constraint fk_user_id_users 
 foreign key (user_id)
 references users(id)
 on update cascade
 on delete cascade
 
);

create table if not exists commints(
id int auto_increment primary key ,
content text not null,
created_at timestamp default current_timestamp,
updated_at timestamp default current_timestamp,
user_id int ,
post_id int ,   
 constraint fk_user_id_commints_users 
 foreign key (user_id)
 references users(id)
 on update cascade
 on delete cascade,
constraint fk_post_id_posts 
 foreign key (post_id)
 references posts(id)
 on update cascade
 on delete cascade
 
);
create table if not exists image(
id int auto_increment primary key ,
name varchar(100),
url text,
post_id int ,  
 constraint fk_post_id_image_users 
 foreign key (post_id)
 references posts(id)
 on update cascade
 on delete cascade
 
);
create table if not exists likes(
id int auto_increment primary key ,
created_at timestamp default current_timestamp,
updated_at timestamp default current_timestamp,
user_id int ,
post_id int ,   
 constraint fk_user_id_likes_users 
 foreign key (user_id)
 references users(id)
 on update cascade
 on delete cascade,
constraint fk_post_id_likes_posts 
 foreign key (post_id)
 references posts(id)
 on update cascade
 on delete cascade
 
);

create table if not exists categories(
id int primary key auto_increment,
name varchar(100)
);
create table if not exists postCategory(
category_id int,
post_id int,
constraint fk_post_id_category_posts
foreign key (post_id)
references posts(id)
on update cascade
on delete cascade,
constraint fk_category_id_category
foreign key (category_id)
references categories(id)
on update cascade
on delete cascade
);
select * from users;
use blog;
drop table posts;
drop table image;
alter table users
change  image image_user varchar(255) ;

