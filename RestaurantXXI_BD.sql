
-- USO DE LA BASE DE DATOS
use restaurantxxi;


-- DROP DE TABLAS, SI NO ESTAN CREADAS, EJECUTAR CREATE TABLES PRIMERO.
drop table if exists Ordencompra;
drop table if exists Proveedor;
drop table if exists Detallecompra;
drop table if exists Productoscocina;
drop table if exists HistorialInsumos;
drop table if exists Insumos;
drop table if exists Categoriainsumos;
drop table if exists Detalleventas;
drop table if exists PanelCocina;
drop table if exists Carrito;
drop table if exists Producto;
drop table if exists Tipoproducto;
drop table if exists Ventas;
drop table if exists Egresos;
drop table if exists Gastos;
drop table if exists Tipopago;
drop table if exists Reserva;
drop table if exists Clientes;
drop table if exists Mesa;
drop table if exists registrocajero;
drop table if exists Tipousuario;
drop table if exists Invitados;
drop table if exists Recetas;







-- CREACION DE TABLAS
create table Proveedor (
id_proveedor int not null auto_increment primary key,
rut_proveedor varchar(50) not null,
nombre_proveedor varchar(50) not null,
tipo_proveedor varchar(50) not null,
contacto_proveedor varchar(50) not null,
estado_proveedor boolean
);

create table Ordencompra (
id_ordencompra int not null auto_increment primary key,
detallecompra_id int not null,
proveedor_id int not null,
subtotal_ordencompra int
);

create table Detallecompra(
id_detallecompra int not null auto_increment primary key,
insumos_id int not null,
cantidad_detallecompra varchar(50),
fecha_hora_ordencompra datetime
);

create table Insumos (
id_insumos int not null auto_increment primary key,
nombre_insumo varchar(50) not null,
cantidad_disponible varchar(50),
cantidad_ideal varchar(50),
categoriainsumos_id int not null,
estado_insumos boolean
);

create table Categoriainsumos (
id_categoriainsumos int not null auto_increment primary key,
categoria varchar(50) not null,
estado_categoriainsumo boolean
);

create table Productoscocina (
id_productoscocina int not null auto_increment primary key,
insumos_id int not null,
panelcocina_id int not null
);

create table PanelCocina (
id_panelcocina int not null primary key auto_increment,
estado_cocina boolean,
estado_garzon boolean,
carrito_id int
);

create table Producto (
id_producto int not null auto_increment primary key,
nombre_producto varchar(50) not null,
precio_producto int not null,
imagen_producto varchar(1000),
estado_producto boolean,
tipoproducto_id int not null
);

create table Tipoproducto (
id_tipoproducto int not null auto_increment primary key,
nombre_tipoproducto varchar(50) not null,
estado_tipoproducto boolean
);

create table Detalleventas (
id_detalleventas int not null auto_increment primary key,
ventas_id int not null
);

create table Ventas (
id_ventas int not null auto_increment primary key,
clavetransaccion varchar(250) not null,
fecha_newventa datetime,
total_newventa int,
estado_newventa varchar(200),
tipopago varchar(50)
);

create table Tipopago(
id_tipopago int not null auto_increment primary key,
tipo_pago_usado varchar(50)
);

create table Egresos (
id_egresos int not null auto_increment primary key,
ventas_id int not null,
gastos_id int,
fecha_egreso datetime,
cantidad_egreso int,
observaciones_egreso varchar(200)
);

create table Gastos (
id_gastos int not null auto_increment primary key,
nombre_gasto varchar(50)
);

create table Clientes (
id_clientes int not null auto_increment primary key,
nombre_cliente varchar(50) not null,
apellido_cliente varchar(50) not null,
rut_cliente varchar(11) not null,
telefono_cliente varchar(50),
correo_cliente varchar(200) not null
);

create table Reserva (
id_reserva int not null auto_increment primary key,
clientes_id int,
mesa_id int not null,
fecha_hora_reserva datetime
);

create table Mesa (
id_mesa int not null auto_increment primary key,
numero_mesa int not null,
mesa_disponible boolean
);

create table Invitados(
id_invitado int not null primary key auto_increment,
rut_invitado varchar(13),
fecha_ingreso datetime
);

create table Tipousuario (
id_usuario int not null auto_increment primary key,
nombre_usuario varchar(50),
contrasenia_usuario varchar(50),
correo_usuario varchar(200),
rol_usuario varchar(50),
estado_tipousuario boolean
);

create table Carrito (
id_carrito int not null primary key auto_increment,
producto_id int not null,
cantidad_carrito int not null,
reserva_id int
);

create table Recetas (
id_recetas int not null primary key auto_increment,
nombre_receta varchar(100),
descripcion_receta varchar(200),
estado_receta boolean
);

create table HistorialInsumos (
id_historialinsumos int not null primary key auto_increment,
nombre_insumo_historial varchar(100),
fecha_historial date,
cantidad_inicial_historial int,
cantidad_final_historial int,
responsable varchar(50),
insumos_id int
);

create table RegistroCajero (
id_registrocajero int primary key auto_increment not null,
usuario_id int,
monto_inicial int,
monto_final int,
fecha_apertura datetime,
fecha_cierre datetime
);





-- ALTERAR TABLAS PARA AGREGAR LLAVES FORANEAS
ALTER TABLE ordencompra ADD FOREIGN KEY(proveedor_id) REFERENCES proveedor(id_proveedor);
ALTER TABLE ordencompra ADD FOREIGN KEY(detallecompra_id) REFERENCES detallecompra(id_detallecompra);
ALTER TABLE detallecompra ADD FOREIGN KEY(insumos_id) REFERENCES insumos(id_insumos);
ALTER TABLE productoscocina ADD FOREIGN KEY(insumos_id) REFERENCES insumos(id_insumos);
ALTER TABLE productoscocina ADD FOREIGN KEY(panelcocina_id) REFERENCES panelcocina(id_panelcocina);
ALTER TABLE producto ADD FOREIGN KEY(tipoproducto_id) REFERENCES tipoproducto(id_tipoproducto);
ALTER TABLE detalleventas ADD FOREIGN KEY(ventas_id) REFERENCES ventas(id_ventas);
ALTER TABLE egresos ADD FOREIGN KEY(gastos_id) REFERENCES gastos(id_gastos);
ALTER TABLE reserva ADD FOREIGN KEY(clientes_id) REFERENCES clientes(id_clientes);
ALTER TABLE reserva ADD FOREIGN KEY(mesa_id) REFERENCES mesa(id_mesa);
ALTER TABLE insumos ADD FOREIGN KEY(categoriainsumos_id) REFERENCES categoriainsumos(id_categoriainsumos);
ALTER TABLE historialinsumos ADD FOREIGN KEY (insumos_id) REFERENCES insumos(id_insumos);
ALTER TABLE carrito ADD FOREIGN KEY(producto_id) REFERENCES producto(id_producto);
ALTER TABLE carrito ADD FOREIGN KEY(reserva_id) REFERENCES reserva(id_reserva);
ALTER TABLE panelcocina ADD FOREIGN KEY(carrito_id) REFERENCES carrito(id_carrito);
ALTER TABLE registrocajero ADD FOREIGN KEY(usuario_id) REFERENCES tipousuario(id_usuario);



-- INYECCION DE REGISTROS ORDENADOS POR TABLAS
insert into gastos (nombre_gasto) values ("Agua");
insert into gastos (nombre_gasto) values ("Electricidad");
insert into gastos (nombre_gasto) values ("Gas");
insert into gastos (nombre_gasto) values ("Telefono");
insert into gastos (nombre_gasto) values ("Internet");
insert into gastos (nombre_gasto) values ("Materia prima");
insert into gastos (nombre_gasto) values ("Equipamiento");
insert into gastos (nombre_gasto) values ("Mobiliario");

insert into Mesa (numero_mesa, mesa_disponible) values (01,false);
insert into Mesa (numero_mesa, mesa_disponible) values (02,false);
insert into Mesa (numero_mesa, mesa_disponible) values (03,true);
insert into Mesa (numero_mesa, mesa_disponible) values (04,true);
insert into Mesa (numero_mesa, mesa_disponible) values (05,true);
insert into Mesa (numero_mesa, mesa_disponible) values (06,true);
insert into Mesa (numero_mesa, mesa_disponible) values (07,true);
insert into Mesa (numero_mesa, mesa_disponible) values (08,true);
insert into Mesa (numero_mesa, mesa_disponible) values (09,true);
insert into Mesa (numero_mesa, mesa_disponible) values (10,true);
insert into Mesa (numero_mesa, mesa_disponible) values (11,true);
insert into Mesa (numero_mesa, mesa_disponible) values (12,true);
insert into Mesa (numero_mesa, mesa_disponible) values (13,true);
insert into Mesa (numero_mesa, mesa_disponible) values (14,true);
insert into Mesa (numero_mesa, mesa_disponible) values (15,true);

insert into clientes (nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente) values ("Javier","Torres","20576204-3","930249980","htorres332.jt@gmail.com");
insert into clientes (nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente) values ("Jorge","Munoz","20532131-4","934199027","jorl.munoz@duocuc.cl");
insert into clientes (nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente) values ("Matias","Sepulveda","20420624-4","965322154","m.sepulveda15@gmail.com");
-- insert into clientes (nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente) values ("Bernardita","Urbina","7991452-5","971929887","bernarditaurbina.19@gmail.com");

insert into reserva (clientes_id, mesa_id, fecha_hora_reserva) values (2,9,now());
insert into reserva (clientes_id, mesa_id, fecha_hora_reserva) values (3,4,now());
insert into reserva (clientes_id, mesa_id, fecha_hora_reserva) values (1,3,now());

insert into tipopago (tipo_pago_usado) values ("Debito");
insert into tipopago (tipo_pago_usado) values ("Credito");
insert into tipopago (tipo_pago_usado) values ("Efectivo");


insert into egresos (ventas_id, gastos_id, fecha_egreso, cantidad_egreso, observaciones_egreso) values (1,3,now(),70000,"Se ha emitido una boleta para el presunto pago de 3 galones de gas de 45kg a la fecha del dia de hoy");

insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Especialidades",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Agregados",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Ensaladas",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Delicias del pueblo",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Postres caseros y otros",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Aperitivos",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Tragos",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Bajativos",true);
insert into tipoproducto (nombre_tipoproducto,estado_tipoproducto) values ("Vinos",true);

insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Empanadas de horno",1990,'https://locales.unimarc.cl/wp-content/files_mf/1662763905800x800EMPANADASDEPINOALHORNO.jpg',true,1); #Especialidades
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Lomo liso vacuno a lo pobre",12980,'https://nosepreocupenporcocinar.files.wordpress.com/2014/09/a-uno-388808.jpeg?w=640',true,1);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Pastel de choclo",10980,'https://mundosjumbo.cl/wp-content/uploads/sites/3/2016/09/receta_carnes_vinos-1.jpg',true,1);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Costillar al horno a lo pobre",12980,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkBsg7wIqIH9NftNJVnaRKW54IdhyiY8J-og&usqp=CAU',true,1);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Arroz graneado",2880,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTawEW6mpGT6G1LkFCHrVABVY9jAk2-D1Hp5w&usqp=CAU',true,2); #Agregados
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Pure de papas",2980,'https://sibeti.com/wp-content/uploads/2021/09/pure-de-papas-e1631910762761.jpg',true,2);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Papas fritas",2980,'https://www.recetas360.com/wp-content/uploads/2019/07/como-hacer-papas-fritas-de-mcdonals-500x500.jpg',true,2);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Papas al vapor",2980,'https://www.gastronomiavasca.net/uploads/image/file/3694/patatas_vapor1.jpg',true,2);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Chilena",2980,'https://img-global.cpcdn.com/recipes/01100169f7b7b2ca/680x482cq70/ensalada-a-la-chilena-foto-principal.jpg',true,3); #ensaladas
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Lechuga",2980,'https://primicia.com.ve/wp-content/uploads/2022/08/Lechuga.jpeg',true,3);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Pebre tomate",3980,'https://images2-mega.cdn.mdstrm.com/mega/2020/09/17/107121_1_5f63961cbea6a.jpg',true,3);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Papas mayo",2980,'https://www.papachile.cl/wp-content/uploads/2018/09/9807326f-b600-4271-9822-b486839cc86b.jpg',true,3);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Prietas",6990,'https://emporiolaclinica.cl/wp-content/uploads/2021/04/Prietas-min.jpg',true,4); #delicias del pueblo
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Ubres",6990,'https://cloudfront-us-east-1.images.arcpublishing.com/radiomitre/P7S3MWKB7ZAKPBS4G2Q4WUV44A.jpg',true,4);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Chunchules",6990,'https://s.cornershopapp.com/product-images/1579848.jpg?versionId=P7W82N1KVP_K4.NipILcyCaAresAKdqr',true,4);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Longanizas",6900,'https://www.ahumadores.cl/wp-content/uploads/Longanizas-ahumadas.jpg',true,4);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Leche asada",2980,'http://cdn.shopify.com/s/files/1/0104/4391/5319/articles/LECHE_ASADA1117x745_1024x1024.jpg?v=1630695822',true,5); #postres
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Copa Helado",3990,'https://static5.depositphotos.com/1029233/453/i/450/depositphotos_4537530-stock-photo-bowl-with-ice-cream-and.jpg',true,5);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Cafe helado",3990,'https://comidaschilenas.com/wp-content/uploads/2019/11/Receta-de-caf%C3%A9-helado-chileno.jpg',true,5);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Duraznos con crema",3570,'https://d1kxxrc2vqy8oa.cloudfront.net/wp-content/uploads/2019/07/12111712/RFB-0807-8-duraznosconcrema.jpg',true,5);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Pisco sour",3280,'https://lamechadapatagona.cl/wp-content/uploads/2021/03/Pisco-Sour-1.jpg',true,6); #aperitivos
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Tequila margarita",6580,'https://www.gourmet.cl/wp-content/uploads/2011/10/Margarita-e1319802606185.jpg',true,6);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Bebidas",2290,'https://resources.uss.cl/upload/2021/02/Las-bebidas-gaseosas-y-la-alimentaci%C3%B3n-de-los-chilenos.jpg',true,6);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Cerveza",3280,'https://assets.diarioconcepcion.cl/2021/08/FOTO-CERVEZA.jpg',true,6);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Wisky J.Walker Rojo",5980,'https://media.karousell.com/media/photos/products/2021/11/11/johnnie_walker_red_label_1_lit_1636599802_2cd15616.jpg',true,7); #tragos
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Vodka absolut",6580,'https://www.stirchleywines.co.uk/wp-content/uploads/2020/04/absolut_vodka.jpg',true,7);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Ron havana",6580,'https://havana-club.com/wp-content/uploads/cache/2020/10/044A-original-Havana_Club-HOTU-1/3956177406.jpg',true,7);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Combinados alto del carmen 35°",5980,'https://vpo.dyudigital.cl/wp-content/uploads/2020/07/piscola.jpg',true,7);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Fernet",2980,'https://d3ugyf2ht6aenh.cloudfront.net/stores/001/129/410/products/fernet-7501-a492b4c5f21d47bb2b15869256310225-1024-1024.jpg',true,8); #bajativos
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Manzanilla",2980,'https://www.800.cl/galeriasitios/Och/2018/8/31/Och_21615_Fl-11376-La%20Salvacion-Fp1.jpg',true,8);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Menta frape",2980,'https://www.rinconmaritimo.cl/wp-content/uploads/2022/01/IMG-20220108-WA0019.jpg',true,8);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Amareto nacional",3280,'https://santaisabel.vtexassets.com/arquivos/ids/175634/Licor-de-amaretto-20%C2%B0-750-cc.jpg?v=637599661749470000',true,8);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Casillero del diablo",10980,'https://pbs.twimg.com/media/E0QHmc7X0AIk3Me.jpg',true,9); #vinos
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Santa emiliana",6980,'https://i.pinimg.com/originals/db/a7/4d/dba74d2872356a20d547fce9a3a1fb62.jpg',true,9);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Medalla real",10980,'https://media-cdn.tripadvisor.com/media/photo-s/13/d6/0c/4a/santa-rita-medalla-real.jpg',true,9);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Don Matias",10980,'https://tolivmarket-production.s3.sa-east-1.amazonaws.com/products/7c0d4058191e00ec20ba0b45a6e2de8887a33ac19376cc6ece3dc6da035c4501.jpg',true,9);
insert into producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) values ("Chorrillana",12980,'https://media.cnnchile.com/sites/2/2018/08/chorillana.jpg',true,1);

insert into proveedor (rut_proveedor, nombre_proveedor, tipo_proveedor, contacto_proveedor, estado_proveedor) values ("760306784","Agrocomercial LTDA","Carnes y productos cárnicos","despacho@agrocomercial.cl",true);
insert into proveedor (rut_proveedor, nombre_proveedor, tipo_proveedor, contacto_proveedor, estado_proveedor) values ("904568241","Gazpacho express","Frutas y verduras","contacto@gazpacho.cl",true);

insert into categoriainsumos (categoria, estado_categoriainsumo) values ("Carnes", true);
insert into categoriainsumos (categoria, estado_categoriainsumo) values ("Verduras", true);
insert into categoriainsumos (categoria, estado_categoriainsumo) values ("Frutas", true);
insert into categoriainsumos (categoria, estado_categoriainsumo) values ("Masas", true);

insert into insumos (nombre_insumo, cantidad_disponible, cantidad_ideal, categoriainsumos_id, estado_insumos) values ("Lomo liso","50","200","1",true);
insert into insumos (nombre_insumo, cantidad_disponible, cantidad_ideal, categoriainsumos_id, estado_insumos) values ("Costillar","20","200","1",true);
insert into insumos (nombre_insumo, cantidad_disponible, cantidad_ideal, categoriainsumos_id, estado_insumos) values ("Papas","40","100","2",true);
insert into insumos (nombre_insumo, cantidad_disponible, cantidad_ideal, categoriainsumos_id, estado_insumos) values ("Tomates","80","80","3",true);
insert into insumos (nombre_insumo, cantidad_disponible, cantidad_ideal, categoriainsumos_id, estado_insumos) values ("Masas de empanadas","50","70","4",true);
insert into insumos (nombre_insumo, cantidad_disponible, cantidad_ideal, categoriainsumos_id, estado_insumos) values ("Cebollas","30","100","2",true);

insert into tipousuario(nombre_usuario, contrasenia_usuario, correo_usuario, rol_usuario, estado_tipousuario) values ('admin','admin','admin@restaurantxxi.com','Administrador',true);
insert into tipousuario(nombre_usuario, contrasenia_usuario, correo_usuario, rol_usuario, estado_tipousuario) values ('f','f','finanzas@restaurantxxi.com','Finanzas',true);
insert into tipousuario(nombre_usuario, contrasenia_usuario, correo_usuario, rol_usuario, estado_tipousuario) values ('c','c','cocina@restaurantxxi.com','Cocina',true);


insert into detallecompra (insumos_id, cantidad_detallecompra, fecha_hora_ordencompra) values (1,"170kg",curdate());
insert into detallecompra (insumos_id, cantidad_detallecompra, fecha_hora_ordencompra) values (2,"160kg",curdate());


insert into ordencompra (detallecompra_id, proveedor_id ,subtotal_ordencompra) values (1,1,150000);
insert into ordencompra (detallecompra_id, proveedor_id ,subtotal_ordencompra) values (2,1,145000);
/*
insert into carrito (producto_id, cantidad_carrito, reserva_id) values ('25','5','1');
insert into carrito (producto_id, cantidad_carrito, reserva_id) values ('14','9','1');
insert into carrito (producto_id, cantidad_carrito, reserva_id) values ('6','2','1');
*/
/* 
	***CREACION DE VISTAS*** 
*/

drop view if exists informacionfinal;
create view informacionfinal as
select nombre_producto as producto,
precio_producto as precio_unitario,
cantidad_carrito as cantidad,
numero_mesa as mesa,
concat(nombre_cliente,' ',apellido_cliente) as cliente,
precio_producto * cantidad_carrito as total
from carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa;

drop view if exists paneldecocina;
create view paneldecocina as
select 
id_panelcocina,
cantidad_carrito,
nombre_producto,
estado_cocina,
estado_garzon,
numero_mesa,
concat(nombre_cliente,' ',apellido_cliente) as cliente,
correo_cliente
from panelcocina
inner join carrito
on carrito_id = carrito.id_carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa;

/*
	*** DISPARADORES ***
*/

drop trigger if exists insercion_panel_cocina;
create trigger insercion_panel_cocina
after insert
on carrito
for each row insert into panelcocina (estado_cocina, estado_garzon, carrito_id) values (false,false,NEW.id_carrito);


drop trigger if exists deleteo_panelcocina;
create trigger deleteo_panelcocina
after insert
on ventas
for each row 
delete from panelcocina;

drop trigger if exists deleteo_carrito;
create trigger deleteo_carrito
after insert
on ventas
for each row 
delete from carrito;

/* 
	***CREACION DE PROCEDIMIENTOS ALMACENADOS*** 
*/


/* 
	*** MODULO WEB *** 
 */
delimiter //
drop procedure if exists SP_reservacion //
create procedure SP_reservacion (
	in nombrecliente varchar(50),
    in apellidocliente varchar(50),
    in rutcliente varchar(50),
    in telefonocliente varchar(50),
    in correocliente varchar(50),
    in mesaid int,
	in fechareserva datetime
)

begin 
if not exists(select * from clientes where rut_cliente = rutcliente) then
insert into clientes (nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente)
values (nombrecliente, apellidocliente, rutcliente, telefonocliente, correocliente);

insert into reserva (clientes_id, mesa_id, fecha_hora_reserva)
values ((select id_clientes from clientes where rut_cliente = rutcliente), mesaid, fechareserva);
update mesa set mesa_disponible = false where id_mesa = mesaid;

else
-- update de correo telefono con un if
insert into reserva (clientes_id, mesa_id, fecha_hora_reserva)
values ((select id_clientes from clientes where rut_cliente = rutcliente), mesaid, fechareserva);
update mesa set mesa_disponible = false where id_mesa = mesaid;
end if;
end//
delimiter ;

delimiter //
drop procedure if exists SP_eliminarReserva //
create procedure SP_eliminarReserva(
  in idreserva int
)
begin
  declare idEliminacion int;
  declare numeromesa_update int;

select id_reserva,
id_mesa
from reserva
inner join clientes
on clientes.id_clientes = reserva.clientes_id
inner join mesa
on mesa_id = mesa.id_mesa
where id_reserva = idreserva
into idEliminacion, numeromesa_update;


update mesa set mesa_disponible = true where id_mesa = numeromesa_update;
delete from reserva where id_reserva = idEliminacion;


end //
delimiter ;

delimiter //
drop procedure if exists SP_buscarReserva //
create procedure SP_buscarReserva(
  in rutcliente varchar(13)
)
begin
select 
id_reserva,
concat(nombre_cliente ,' ',apellido_cliente) as Cliente,
rut_cliente,
telefono_cliente,
numero_mesa,
correo_cliente,
fecha_hora_reserva
from reserva
inner join clientes
on clientes.id_clientes = reserva.clientes_id
inner join mesa
on mesa_id = mesa.id_mesa
where rut_cliente = rutcliente;

end //
delimiter ;


delimiter //
drop procedure if exists SP_reservacionTotem //
create procedure SP_reservacionTotem (
	in rutcliente varchar(13),
    in correocliente varchar(200)
)

begin 

select @identificacionmesa := min(id_mesa) from mesa where mesa_disponible = true;

if not exists(select * from clientes where rut_cliente = rutcliente) then
insert into clientes (nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente)
values ('Invitado', '-' , rutcliente, null , correocliente);

insert into reserva (clientes_id, mesa_id, fecha_hora_reserva)
values ((select id_clientes from clientes where rut_cliente = rutcliente), @identificacionmesa , now());
update mesa set mesa_disponible = false where id_mesa = @identificacionmesa;


else


insert into reserva (clientes_id, mesa_id, fecha_hora_reserva)
values ((select id_clientes from clientes where rut_cliente = rutcliente), @identificacionmesa , now());
update mesa set mesa_disponible = false where id_mesa = @identificacionmesa;

end if;
end//
delimiter ;

/* 
	*** MODULO DE ESCRITORIO ***
*/


use restaurantxxi;

delimiter //
drop procedure if exists SP_ActualizarCategoria //
CREATE PROCEDURE `SP_ActualizarCategoria`(
in _categoriaAnterior varchar(50),
in _nombreCategoria varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @idCat := id_categoriainsumos from categoriainsumos where categoria = _categoriaAnterior;

UPDATE categoriainsumos
SET categoria = _nombreCategoria, estado_categoriainsumo = _estado
WHERE id_categoriainsumos = @idCat;
END // 
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarInsumos //
CREATE PROCEDURE `SP_ActualizarInsumos`(
in _id int,
in _nombreInsumo varchar(50),
in _cantidadDisponible varchar(50),
in _cantidadIdeal varchar(200),
in _categoria varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @idCat := id_categoriainsumos from categoriainsumos where categoria = _categoria;

UPDATE insumos
SET nombre_insumo = _nombreInsumo, cantidad_disponible = _cantidadDisponible, cantidad_ideal = _cantidadIdeal, estado_insumos = _estado, categoriainsumos_id = @idCat
WHERE id_insumos = _id;
END //
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarMesas //
CREATE PROCEDURE `SP_ActualizarMesas`(
in _id int,
in _numeroMesa int,
in _estado tinyint(1)
)
BEGIN
UPDATE mesa
SET numero_mesa = _numeroMesa, mesa_disponible = _estado
WHERE id_mesa = _id;
END //
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarProductos //
CREATE PROCEDURE `SP_ActualizarProductos`(
in _id int,
in _nombre varchar(50),
in _precio int,
in _urlImagen varchar(1000),
in _estado tinyint(1),
in _tipoProducto varchar(50)
)
BEGIN
SELECT @idCat := id_tipoproducto from tipoproducto where nombre_tipoproducto = _tipoProducto;

UPDATE producto
SET nombre_producto = _nombre, precio_producto = _precio, imagen_producto = _urlImagen, estado_producto = _estado, tipoproducto_id = @idCat
WHERE id_producto = _id;
END //
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarProveedores //
CREATE PROCEDURE `SP_ActualizarProveedores`(
in _id int,
in _rut varchar(50),
in _nombre varchar(50),
in _tipoProveedor varchar(200),
in _contacto varchar(50),
in _estado tinyint(1)
)
BEGIN
UPDATE proveedor
SET rut_proveedor = _rut, nombre_proveedor = _nombre, tipo_proveedor = _tipoProveedor, contacto_proveedor = _contacto, estado_proveedor = _estado
WHERE id_proveedor = _id;
END //
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarUsuario //
CREATE PROCEDURE `SP_ActualizarUsuario`(
in _id int,
in _usuario varchar(50),
in _contrasenia varchar(50),
in _correo varchar(200),
in _rol varchar(50),
in _estado tinyint(1)
)
BEGIN
UPDATE Tipousuario
SET nombre_usuario = _usuario, contrasenia_usuario = _contrasenia, correo_usuario = _correo, rol_usuario = _rol, estado_tipousuario = _estado
WHERE id_usuario = _id;
END //
delimiter ;

delimiter //
drop procedure if exists SP_AgregarCategoria //
CREATE PROCEDURE `SP_AgregarCategoria`(
in _nombre varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @existe := categoria FROM categoriainsumos WHERE categoria = _nombre;
IF (@existe = _nombre) THEN	
	SELECT @existe := categoria FROM categoriainsumos WHERE categoria = _nombre;
ELSE 
	INSERT INTO categoriainsumos (categoria, estado_categoriainsumo) VALUES (_nombre, _estado);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_AgregarCategoriaProducto //
CREATE PROCEDURE `SP_AgregarCategoriaProducto`(
in _nombre varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @existe := nombre_tipoproducto FROM tipoproducto WHERE nombre_tipoproducto = _nombre;
IF (@existe = _nombre) THEN	
	SELECT @existe := nombre_tipoproducto FROM tipoproducto WHERE nombre_tipoproducto = _nombre;
ELSE 
	INSERT INTO tipoproducto (nombre_tipoproducto, estado_tipoprdoucto) VALUES (_nombre, _estado);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_AgregarInsumos //
CREATE PROCEDURE `SP_AgregarInsumos`(
in _nombre varchar(50),
in _categoria varchar(50),
in _cantidadDisponible varchar(50),
in _cantidadIdeal varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @existe := nombre_insumo FROM insumos WHERE nombre_insumo = _nombre;
IF (@existe = _nombre) THEN	
	SELECT @existe := nombre_insumo FROM insumos WHERE nombre_insumo = _nombre;
ELSE 
	SELECT @idCat := id_categoriainsumos FROM categoriainsumos WHERE categoria = _categoria;
	INSERT INTO insumos (nombre_insumo, cantidad_disponible, cantidad_ideal, estado_insumos, categoriainsumos_id) VALUES (_nombre,  _cantidadDisponible,  _cantidadIdeal, _estado, @idCat);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_AgregarMesas //
CREATE PROCEDURE `SP_AgregarMesas`(
in _numeroMesa int,
in _estado tinyint(1)
)
BEGIN
SELECT @existe := numero_mesa FROM mesa WHERE numero_mesa = _numeroMesa;
IF (@existe = _numeroMesa) THEN	
	SELECT @existe := numero_mesa FROM mesa WHERE numero_mesa = _numeroMesa;
ELSE 
	INSERT INTO mesa (numero_mesa, mesa_disponible) VALUES (_numeroMesa, _estado);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_AgregarProductos //
CREATE PROCEDURE `SP_AgregarProductos`(
in _nombre varchar(50),
in _precio int,
in _urlImagen varchar(1000),
in _estado tinyint(1),
in _tipoProducto varchar(50)
)
BEGIN
SELECT @existe := nombre_producto FROM producto WHERE nombre_producto = _nombre;
IF (@existe IS NOT NULL) THEN	
	SELECT @existe := nombre_producto FROM producto WHERE nombre_producto = _nombre;
ELSE 
	SELECT @idCat := id_tipoproducto from tipoproducto where nombre_tipoproducto = _tipoProducto;
	INSERT INTO producto (nombre_producto, precio_producto, imagen_producto, estado_producto, tipoproducto_id) VALUES (_nombre, _precio, _urlImagen, _estado, @idCat);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_AgregarProveedor //
CREATE PROCEDURE `SP_AgregarProveedor`(
in _rut varchar(50),
in _nombre varchar(50),
in _tipoProveedor varchar(200),
in _contacto varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @existe := rut_proveedor FROM proveedor WHERE rut_proveedor = _rut;
IF (@existe = _rut) THEN	
	SELECT @existe := rut_proveedor FROM proveedor WHERE rut_proveedor = _rut;
ELSE 
	INSERT INTO proveedor (rut_proveedor, nombre_proveedor, tipo_proveedor, contacto_proveedor, estado_proveedor) values (_rut, _nombre, _tipoProveedor, _contacto, _estado);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_AgregarUsuario //
CREATE PROCEDURE `SP_AgregarUsuario`(
in _usuario varchar(50),
in _contrasenia varchar(50),
in _correo varchar(200),
in _rol varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @existe := nombre_usuario FROM tipousuario WHERE nombre_usuario = _usuario;
IF (@existe = _usuario) THEN
	SELECT @existe := nombre_usuario FROM tipousuario WHERE nombre_usuario = _usuario;
ELSE 
	INSERT INTO tipousuario (nombre_usuario, contrasenia_usuario, correo_usuario, rol_usuario, estado_tipousuario) VALUES (_usuario, _contrasenia, _correo, _rol, _estado);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_LoginUsuarios //
CREATE PROCEDURE `SP_LoginUsuarios`(
in _usuario varchar(50),
in _contrasenia varchar(50)
)
begin

SELECT rol_usuario
  FROM tipousuario
  WHERE nombre_usuario = _usuario AND contrasenia_usuario = _contrasenia AND estado_tipousuario = 1;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarInsumos //
CREATE PROCEDURE `SP_MostrarInsumos`()
BEGIN
SELECT id_insumos, nombre_insumo, categoria, cantidad_disponible, cantidad_ideal, IF(estado_insumos = true, "Activo", "Inactivo") estado_insumos
FROM insumos 
INNER JOIN categoriainsumos   
ON insumos.categoriainsumos_id = categoriainsumos.id_categoriainsumos ORDER BY id_insumos ASC;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarMesas //
CREATE PROCEDURE `SP_MostrarMesas`()
BEGIN
SELECT id_mesa, numero_mesa, IF(mesa_disponible = true, "Disponible", "No Disponible") mesa_disponible
FROM mesa;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarProductos //
CREATE PROCEDURE `SP_MostrarProductos`()
BEGIN

SELECT id_producto, nombre_producto, precio_producto, imagen_producto, nombre_tipoproducto, IF(estado_producto = true, "Disponible", "No Disponible") estado_producto 
FROM producto 
INNER JOIN tipoproducto   
ON producto.tipoproducto_id = tipoproducto.id_tipoproducto ORDER BY id_producto ASC;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarProveedores //
CREATE PROCEDURE `SP_MostrarProveedores`()
BEGIN
SELECT id_proveedor, rut_proveedor, nombre_proveedor, tipo_proveedor, contacto_proveedor, IF(estado_proveedor = true, "Activo", "Inactivo") estado_proveedor FROM proveedor;
END //
delimiter ;


delimiter //
drop procedure if exists SP_MostrarUsuarios //
CREATE PROCEDURE `SP_MostrarUsuarios`()
BEGIN
SELECT id_usuario, nombre_usuario, contrasenia_usuario, correo_usuario, rol_usuario, IF(estado_tipousuario = true, "Activo", "Inactivo") estado_tipousuario FROM tipousuario;
END //
delimiter ;



delimiter //
drop procedure if exists SP_ActualizarCategoriaProducto //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarCategoriaProducto`(
in _categoriaAnterior varchar(50),
in _nombreCategoria varchar(50),
in _estado tinyint(1)
)
BEGIN
SELECT @idCat := id_tipoproducto from tipoproducto where nombre_tipoproducto = _categoriaAnterior;

UPDATE tipoproducto
SET nombre_tipoproducto = _nombreCategoria, estado_tipoprdoucto = _estado
WHERE id_tipoproducto = @idCat;
END //
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarEstadoCocina //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarEstadoCocina`(
in _numeroMesa varchar(50),
in _estado tinyint(1),
in _producto varchar(50)
)
BEGIN
UPDATE panelcocina
inner join carrito
on carrito_id = carrito.id_carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa
SET estado_cocina = _estado
WHERE numero_mesa = _numeroMesa AND nombre_producto = _producto;
END //
delimiter ;


delimiter //
drop procedure if exists SP_ActualizarEstadoGarzon //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarEstadoGarzon`(
in _numeroMesa varchar(50),
in _estado tinyint(1),
in _producto varchar(50)
)
BEGIN
UPDATE panelcocina
inner join carrito
on carrito_id = carrito.id_carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa
SET estado_garzon = _estado
WHERE numero_mesa = _numeroMesa AND nombre_producto = _producto;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarCategoriaInsumos //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarCategoriaInsumos`()
BEGIN
SELECT categoria, IF(estado_categoriainsumo = true, "Activo", "Inactivo") estado_categoriainsumo
FROM categoriainsumos;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarCategoriaProductos //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarCategoriaProductos`()
BEGIN
SELECT nombre_tipoproducto, IF(estado_tipoproducto = true, "Activo", "Inactivo") estado_tipoproducto
FROM tipoproducto;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarListaPedidos //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarListaPedidos`(
in _numeroMesa varchar(50)
)
BEGIN
select 
id_panelcocina,
sum(cantidad_carrito) cantidad_carrito,
sum(precio_producto) * cantidad_carrito as precio_producto,
nombre_producto,
IF(estado_cocina = true, "Confirmado", "Pendiente") estado_cocina,
IF(estado_garzon = true, "Confirmado", "Pendiente") estado_garzon,
numero_mesa,
concat(nombre_cliente,' ',apellido_cliente) as cliente,
correo_cliente
from panelcocina
inner join carrito
on carrito_id = carrito.id_carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa where estado_cocina and estado_garzon != 0 and numero_mesa = _numeroMesa group by nombre_producto, cliente, correo_cliente order by id_panelcocina desc;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarPedidosCarrito //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarPedidosCarrito`()
BEGIN
select 
id_panelcocina,
sum(cantidad_carrito) cantidad_carrito,
nombre_producto,
IF(estado_cocina = true, "Confirmado", "Pendiente") estado_cocina,
IF(estado_garzon = true, "Confirmado", "Pendiente") estado_garzon,
numero_mesa,
concat(nombre_cliente,' ',apellido_cliente) as cliente,
correo_cliente
from panelcocina
inner join carrito
on carrito_id = carrito.id_carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa group by  nombre_producto, cliente, correo_cliente order by id_panelcocina desc;
END //
delimiter ;


delimiter //
drop procedure if exists SP_MostrarPedidosCocina //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarPedidosCocina`()
BEGIN
select 
id_panelcocina,
sum(cantidad_carrito) cantidad_carrito,
nombre_producto,
IF(estado_cocina = true, "Confirmado", "Pendiente") estado_cocina,
IF(estado_garzon = true, "Confirmado", "Pendiente") estado_garzon,
numero_mesa,
concat(nombre_cliente,' ',apellido_cliente) as cliente,
correo_cliente
from panelcocina
inner join carrito
on carrito_id = carrito.id_carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa where estado_cocina = 0 group by nombre_producto, cliente, correo_cliente order by id_panelcocina desc;
END //
delimiter ;


delimiter //
drop procedure if exists SP_MostrarPedidosGarzon //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarPedidosGarzon`()
BEGIN
select 
id_panelcocina,
sum(cantidad_carrito) cantidad_carrito,
nombre_producto,
IF(estado_cocina = true, "Confirmado", "Pendiente") estado_cocina,
IF(estado_garzon = true, "Confirmado", "Pendiente") estado_garzon,
numero_mesa,
concat(nombre_cliente,' ',apellido_cliente) as cliente,
correo_cliente
from panelcocina
inner join carrito
on carrito_id = carrito.id_carrito
inner join producto
on producto_id = producto.id_producto
inner join reserva
on reserva_id = reserva.id_reserva
inner join clientes
on clientes_id = clientes.id_clientes
inner join mesa
on mesa_id = mesa.id_mesa where estado_cocina and estado_garzon != 1  group by nombre_producto, cliente, correo_cliente order by id_panelcocina desc;
END //
delimiter ;

delimiter //
drop procedure if exists SP_RealizarPagoCajero //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RealizarPagoCajero`(
in _montoActualizar int
)
BEGIN
SELECT @ultimoId := MAX(id_registrocajero)  FROM registrocajero;
SELECT @ultimoIdCerrar := MAX(id_registrocajero)  FROM registrocajero where isnull(fecha_cierre);
                            
IF (isnull(@ultimoIdCerrar)) THEN	
	SELECT MAX(monto_inicial)  FROM registrocajero;

ELSE 
	UPDATE registrocajero
	SET monto_final = monto_final + _montoActualizar
	WHERE id_registrocajero = @ultimoIdCerrar;
    
    
	DELETE FROM panelcocina
	WHERE id_panelcocina = id_panelcocina
	LIMIT 500;
END IF;
END //
delimiter ;


delimiter //
drop procedure if exists SP_RegistrarApertura //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarApertura`(
in _usuario varchar(50),
in _montoInicial int,
in _montoFinal int,
in _fechaApertura datetime
)
BEGIN
SELECT @ultimoId := MAX(id_registrocajero)  FROM registrocajero;
SELECT @ultimoIdCerrar := MAX(id_registrocajero)  FROM registrocajero where isnull(fecha_cierre);

IF (isnull(@ultimoIdCerrar)) THEN	
	SELECT @idUsuarioIngreso := id_usuario from tipousuario where nombre_usuario = _usuario;
	INSERT INTO registrocajero (usuario_id, monto_inicial, monto_final, fecha_apertura) VALUES (@idUsuarioIngreso,  _montoInicial, _montoFinal,  _fechaApertura);

ELSE 
	SELECT MAX(monto_inicial)  FROM registrocajero;
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_TerminarApertura //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TerminarApertura`(
in _usuario varchar(50),
in _montoFinal int,
in _fechaCierre datetime
)
BEGIN
SELECT @ultimoId := MAX(id_registrocajero)  FROM registrocajero;

UPDATE registrocajero
SET monto_final = _montoFinal, fecha_cierre = _fechaCierre
WHERE id_registrocajero = @ultimoId;

END //
delimiter ;






delimiter //
drop procedure if exists SP_AgregarCliente //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_AgregarCliente`(
in _nombre varchar(50),
in _apellido varchar(50),
in _rut varchar(11),
in _telefono varchar(50),
in _correo varchar(200)
)
BEGIN
SELECT @existe := rut_cliente FROM clientes WHERE rut_cliente = _rut;
IF (@existe = _rut) THEN
	SELECT @existe := rut_cliente FROM clientes WHERE rut_cliente = _rut;
ELSE 
	INSERT INTO clientes (nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente) VALUES (_nombre, _apellido, _rut, _telefono, _correo);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarCliente //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarCliente`(
in _idCliente int,
in _nombre varchar(50),
in _apellido varchar(50),
in _rut varchar(11),
in _telefono varchar(50),
in _correo varchar(200)
)
BEGIN
UPDATE clientes
SET nombre_cliente = _nombre, apellido_cliente = _apellido, rut_cliente = _rut, telefono_cliente = _telefono, correo_cliente = _correo
WHERE id_clientes = _idCliente;
END //
delimiter ;


delimiter //
drop procedure if exists SP_MostrarClientes //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarClientes`()
BEGIN
SELECT id_clientes, nombre_cliente, apellido_cliente, rut_cliente, telefono_cliente, correo_cliente FROM clientes;
END
 //
delimiter ;


delimiter //
drop procedure if exists SP_AgregarReceta //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_AgregarReceta`(
in _nombreReceta varchar(100),
in _descripcion varchar(200),
in _estado tinyint(1)
)
BEGIN
SELECT @existe := nombre_receta FROM recetas WHERE nombre_receta = _nombreReceta;
IF (@existe = _nombreReceta) THEN
	SELECT @existe := nombre_receta FROM recetas WHERE nombre_receta = _nombreReceta;
ELSE 
	INSERT INTO recetas (nombre_receta, descripcion_receta, estado_receta) VALUES (_nombreReceta, _descripcion, _estado);
END IF;
END //
delimiter ;

delimiter //
drop procedure if exists SP_ActualizarReceta //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarReceta`(
in _idReceta int,
in _nombreReceta varchar(100),
in _descripcion varchar(200),
in _estado tinyint(1)
)
BEGIN
UPDATE recetas
SET nombre_receta = _nombreReceta, descripcion_receta = _descripcion, estado_receta = _estado
WHERE id_recetas = _idReceta;
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarRecetas //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarRecetas`()
BEGIN
SELECT id_recetas, nombre_receta, descripcion_receta, IF(estado_receta = true, "Activo", "Inactivo") estado_receta FROM recetas;
END //
delimiter ;


delimiter //
drop procedure if exists SP_AgregarHistorial //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_AgregarHistorial`(
in _id int,
in _nombreInsumo varchar(50),
in _cantidadDisponible varchar(50),
in _fechaCambio date,
in _cantidadInicial varchar(50),
in _responsable varchar(50)
)
BEGIN
INSERT INTO historialinsumos (nombre_insumo_historial, fecha_historial, cantidad_inicial_historial, cantidad_final_historial, responsable, insumos_id) VALUES (_nombreInsumo,  _fechaCambio,  _cantidadInicial, _cantidadDisponible, _responsable, _id);
END //
delimiter ;

delimiter //
drop procedure if exists SP_MostrarHistorialCambios //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarHistorialCambios`()
BEGIN
SELECT id_historialinsumos, nombre_insumo_historial, fecha_historial, cantidad_inicial_historial, cantidad_final_historial, responsable, insumos_id FROM historialinsumos;
END //
delimiter ;


delimiter //
drop procedure if exists SP_EliminarVentaUsuario //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarVentaUsuario`()
BEGIN
TRUNCATE TABLE panelcocina;

TRUNCATE TABLE carrito;

END
 //
delimiter ;


delimiter //
drop procedure if exists SP_AgregarVenta //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_AgregarVenta`(
in _claveTransaccion varchar(250),
in _fechaVenta datetime,
in _totalVenta int,
in _estadoVenta varchar(200),
in _tipoPago varchar(50)
)
BEGIN
INSERT INTO ventas (clavetransaccion, fecha_newventa, total_newventa, estado_newventa, tipopago) VALUES (_claveTransaccion, _fechaVenta, _totalVenta, _estadoVenta, _tipoPago);
END
 //
delimiter ;

delimiter //
drop procedure if exists SP_TraerMontoTotalCaja //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_TraerMontoTotalCaja`()
BEGIN
SELECT monto_final FROM registrocajero WHERE isnull(fecha_cierre);
END
 //
delimiter ;

