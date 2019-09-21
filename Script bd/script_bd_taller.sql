drop database if exists db_taller;
create database db_taller;
use db_taller;

CREATE TABLE empleado(
	cui bigint primary key,
    nombre varchar(255),
    nickname varchar(255),
    pass varchar(255),
    correo varchar(255),
    direccion varchar(255),
    telefono varchar(255),
    nit varchar(30),
    fechaContratacion date,
    tipo int,  -- 1 mecanico , 2 admin
    estado int -- 1 si todo esta bien, 0 si esta de vacaciones, -1 si ya no trabaja en el lugar
);

--agregando la tabla de facturación 

CREATE TABLE factura(
	id bigint primary key,
    empleado varchar(255),
    cliente varchar(255),
    servicio varchar(255),
    descripcion varchar(255),
    precio varchar(255),
    subtotal varchar(255),
    fecha date,
    tipo int,  
    estado int 
);

CREATE TABLE cliente(
	cui BIGINT primary key,
    nombre varchar(255),
    nickname varchar(255),
    correo varchar(255),
    pass varchar(255),
    direccion varchar(255),
	telefono varchar(255),
    nit varchar(30)
);

CREATE TABLE vehiculo(
	placa varchar(7) primary key,
    marca varchar(255),
    modelo varchar(255),
    anio_fabricacion int
);

CREATE TABLE entrada_vehiculo(
	id int auto_increment primary key,
    cliente bigint,
    empleadoEncargado bigint,
    vehiculo varchar(7),
    descripcionDelProblema varchar(255),
    fecha_ingreso date,
    fecha_salidaEstimada date,
    fecha_salida date, -- si no esta vacio es que ya se devolvio
    estado int, -- -1 cancelado, 0 no iniciado, 1 iniciado, 2 listo para recoger, 3 devuelto al cliente
    prioridad int,
    foreign key(cliente) references cliente(cui),
    foreign key(empleadoEncargado) references empleado(cui),
    foreign key(vehiculo) references vehiculo(placa)
);

CREATE TABLE servicio(
	id int auto_increment primary key,
    nombre varchar(30),
    descripcion varchar(255)
);

CREATE TABLE detalleServicio(
	id int auto_increment primary key,
    entrada_vehiculo int,
    mecanico bigint,
    servicio int,
    descripcion varchar(255), -- aparte de decir que servicio es, esto sirve para saber si hubo algun inconveniente o si todo salio bien
    fecha date,
    foreign key(servicio) references servicio(id)  ON DELETE CASCADE,
    foreign key(entrada_vehiculo) references entrada_vehiculo(id)  ON DELETE CASCADE,
    foreign key(mecanico) references empleado(cui)  ON DELETE CASCADE
);
