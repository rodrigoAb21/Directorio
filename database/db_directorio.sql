use directorio;

create table rubro(
id int auto_increment primary key,
nombre varchar(255) not null,
icono varchar(255) not null
);

create table empresa(
id int auto_increment primary key,
nombre varchar(255) not null,
logo varchar(255),
email varchar(255),
web varchar(255),
clave varchar(255) not null,
claveBusqueda varchar(255) not null,
descripcion varchar(255) not null,
rubro_id int not null,
foreign key(rubro_id) references rubro(id) on delete cascade
);

create table ubicacion(
id int auto_increment primary key,
nombre varchar(255) not null,
telefono varchar(255),
departamento varchar(255) not null,
direccion varchar(255) not null,
longitud float not null,
latitud float not null,
empresa_id int not null,
foreign key(empresa_id) references empresa(id) on delete cascade
);

	INSERT INTO `rubro` (`id`, `nombre`, `icono`) VALUES
	(NULL, 'Otros', 'plus'),
	(NULL, 'Alojamientos', 'bed'),
	(NULL, 'Hoteles', 'h-square '),
	(NULL, 'Peluquerias', 'cut'),
	(NULL, 'Talleres', 'wrench'),
	(NULL, 'RadioMoviles', 'taxi'),
	(NULL, 'Universidades', 'university'),
	(NULL, 'Farmacias', 'pills'),
	(NULL, 'Hospitales', 'ambulance'),
	(NULL, 'Veterinarias', 'paw'),
	(NULL, 'Colegios', 'graduation-cap'),
	(NULL, 'Bancos', 'dollar-sign	'),
	(NULL, 'Supermercados', 'shopping-cart '),
	(NULL, 'Florerias', 'leaf'),
	(NULL, 'Laboratorios', 'flask'),
	(NULL, 'Cooperativas', 'money-bill-alt'),
	(NULL, 'Cafeterias', 'coffee'),
	(NULL, 'Pasteleria', 'birthday-cake'),
	(NULL, 'Librerias', 'book'),
	(NULL, 'Institutos', 'pencil-alt '),
	(NULL, 'Tintorerias', 'black-tie'),
	(NULL, 'Restaurantes', 'utensils'),
	(NULL, 'Industrias', 'industry'),
	(NULL, 'Cines', 'film');

INSERT INTO `empresa` (`id`, `nombre`, `logo`, `email`, `web`, `clave`, `claveBusqueda`, `descripcion`, `rubro_id`) VALUES
(1, 'Alojamiento Abasto', 'default_img.png', 'abasto@gmail.com', NULL, 'Cama, Alojamiento Abasto, Hostal, Habitaciones', 'Cama, Alojamiento Abasto, Hostal, Habitaciones', 'Lugar muy placentero donde poder dormir.', 2);



INSERT INTO `ubicacion` (`id`, `nombre`, `telefono`, `departamento`, `direccion`, `latitud`, `longitud`, `empresa_id`) VALUES
(1, 'Suc. Pirai', '3540700', 'Santa Cruz', 'Av Pirai esq 4to anillo', '-17.796689819635517', '-63.21557109961395', 1),
(2, 'Suc. Universidad', '73948575', 'Santa Cruz', 'Av. Busch entre 2do y 3er anillo #45', '-17.77601017535819', '-63.19643055452116', 1),
(3, 'Suc. Parque Industrial', '4456846', 'Santa Cruz', 'Parque industrial entre 3er y 4to anillo, frente a famosa.', '-17.789577321629643', '-63.154002547064124', 1);

