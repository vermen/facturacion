CREATE DATABASE facturacion;

USE facturacion;

CREATE TABLE categorias(
    categoriaID INT PRIMARY KEY AUTO_INCREMENT,
    categoriaNombre VARCHAR (50),
    descripcion VARCHAR (50),
    imagen VARCHAR (50)
);

INSERT INTO categorias (categoriaNombre, descripcion, imagen)
VALUES ("Deportes", "Equipo para hacer deporte y mejorar tu rendimiento", "images/1.jpg"),
("Hogar", "Electrodomesticos para el hogar", "images/2.jpg"),
("Automovil", "Repuestos para tu automovil", "images/3.jpg"),
("Mascotas", "Juguetes para mascotas", "images/4.jpg");