CREATE DATABASE gestor;
use gestor;

create table t_usuarios(id_usuario int PRIMARY KEY AUTO_INCREMENT,
                        nombre varchar(255),
                        fechaNacimiento date,
                        email varchar(255),
                        usuario varchar(255),
                        password text,
                        inser datetime);


create table t_categorias(id_categoria int PRIMARY KEY  AUTO_INCREMENT,
                          id_usuario int, foreign key(id_usuario) references t_usuarios(id_usuario),
                          nombre varchar(255),
                          fechaInsert datetime now());

create table t_archivos(id_archivo int PRIMARY KEY AUTO_INCREMENT,
                        id_categoria int, foreign key(id_categoria) references t_categorias(id_categoria),
                        nombre varchar(255),
                        tipo varchar(255),
                        ruta text,
                        fecha datetime,
                        id_usuario int, foreign key(id_usuario) references t_usuarios(id_usuario));
