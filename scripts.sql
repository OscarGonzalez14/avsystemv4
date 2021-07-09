CREATE TABLE ventas_flotantes(
	id_flot int not null auto_increment,
    tipo_venta varchar(50),
    correlativo varchar(25),
    sucursal varchar(50),
    id_producto int,
    categoria_prod varchar(50),
    id_paciente int,
    id_usuario int,
    primary key(id_flot),
    foreign key(id_producto) references productos(id_producto),
    foreign key(id_paciente) references pacientes(id_paciente),
    foreign key(id_usuario) references usuarios(id_usuario)
);

ALTER TABLE `ventas_flotantes` 
ADD COLUMN `id_ingreso` VARCHAR(4) NULL DEFAULT NULL AFTER `id_usuario`,
ADD COLUMN `categoria_ub` VARCHAR(100) NULL DEFAULT NULL AFTER `id_ingreso`,
ADD COLUMN `num_compra` VARCHAR(45) NULL DEFAULT NULL AFTER `categoria_ub`;

/*/////////////////////////BUS ORDENES DE DESCUENTO EN PLANILLA ///////*/
alter table creditos  add column numero_orden varchar(50) null DEFAULT '0';
alter table ventas add add column n_orden varchar(50) null DEFAULT '0'; 
-- #######

create table correlativo_ventas(
id_correlativo INT auto_increment not null,
numero_correlativo varchar(50) not null unique,
sucursal varchar(100),
primary key(id_correlativo)
);
