drop database if exists directorio;
create database directorio;
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

create table busqueda(
pal_ingresada varchar(20) primary key
);

create table pal_empresa(
id_empresa int,
palabra varchar(20),
primary key(id_empresa, palabra),
foreign key(id_empresa) references empresa(id)
on update cascade on delete cascade
);


 create index busqueda on busqueda(pal_ingresada);
 create index pal_empresa on pal_empresa(palabra);

 delimiter //
CREATE TRIGGER empresaInsert after insert ON empresa
       FOR EACH ROW
       BEGIN
       declare _palabras varchar(255);
       declare _palabra varchar(20);
       declare _char varchar(1);
       declare _cont int;
       set _palabras=trim(lower(new.clave));
       set _cont=1;
       set _palabra='';
       repeat
			set _char=(select substring(_palabras,_cont,1));
			 IF(_char=' ' or _char=',')
			 THEN
			  set _palabra=(select trim(_palabra));
			  INSERT INTO pal_empresa(id_empresa, palabra) values (new.id,_palabra);
			  set _palabra='';
			 ELSE
			  set _palabra=(select concat(_palabra,_char));
			 END IF;
		   set _cont=_cont+1;
		 until (_cont > LENGTH(_palabras))
		end repeat;
        INSERT INTO pal_empresa(id_empresa, palabra) values (new.id,_palabra);
       END;//
delimiter ;


-- *********************** POBLACION DE DATOS *******************
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
