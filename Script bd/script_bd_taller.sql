drop database if exists db_taller;
create database db_taller;
use db_taller; 

CREATE TABLE empleado(
	cui bigint primary key, 
    nit varchar(30), 
    fechaContratacion date,
    tipo int,  -- 1 mecanico , 2 admin 
    estado int -- 1 si todo esta bien, 0 si esta de vacaciones, -1 si ya no trabaja en el lugar
);

CREATE TABLE cliente(
	cui BIGINT primary key,
    nombre varchar(255),
    direccion varchar(255),
    nit varchar(30)
);

CREATE TABLE vehiculo(
	placa varchar(7) primary key, 
    marca varchar(255), 
    modelo varchar(255),
    anio_fabricacion int
);

CREATE TABLE servicio_vehiculo(
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

CREATE TABLE detalleServicio(
	id int auto_increment primary key, 
    servicio_vehiculo int, 
    mecanico bigint, 
    servicio_realizado varchar(255), 
    fecha date,
    foreign key(servicio_vehiculo) references servicio_vehiculo(id),
    foreign key(mecanico) references empleado(cui)
);

