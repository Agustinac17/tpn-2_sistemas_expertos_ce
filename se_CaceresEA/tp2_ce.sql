create database dengue_bd;
use dengue_bd;

create table historial (
    id int auto_increment primary key,
    fecha timestamp default current_timestamp,
    sintomas text,
    diagnostico text
);

select * from historial;