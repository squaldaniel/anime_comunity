create database animanquadri;

use animanquadri;

create table administration(
	id int unsigned auto_increment,
	email varchar(80) unique,
	pwdsnh text,
	active boolean default 0,
	level_adm enum("1","2","3","4","5"),
	type_user varchar(30) default "administration",
	primary key(id)
)engine=innodb charset=utf8mb4;
insert into administration (email, pwdsnh, active, level_adm) values ("daniel.santos.ap@gmail.com", md5(concat("stunt_",sha1(md5("1a2b3c")))), true, 5);


create table membros(
	id int unsigned auto_increment,
	email varchar(80) unique,
	pwdsnh text,
	active boolean default 0,
	type_user varchar(30) default "member",
	primary key(id)
)engine=innodb charset=utf8mb4;


create table membros_info(
	id int unsigned auto_increment,
	membro int unsigned,
	nome varchar(30),
	sobrenome varchar(70),
	primary key(id),
	foreign key(membro) references membros(id) on delete cascade
)engine=innodb charset=utf8mb4;

create table membros_location(
	id int unsigned auto_increment,
	membro int unsigned,
	cep varchar(8),
    logradouro varchar(250),
    complemento varchar(250),
    bairro varchar(150),
    localidade varchar(100),
    uf varchar(2),
    ibge int,
    gia int,
    ddd varchar(3),
    siafi int,
	foreign key(membro) references membros_info(id) on delete cascade,
	primary key(id)
)engine=innodb charset=utf8mb4;

create table planos (
	id int auto_increment,
	nomeplano varchar(30),
	primary key(id)
)engine=innodb charset=utf8mb4;
insert into planos(nomeplano) values("free member");

create table membro_plano(
	id int unsigned auto_increment,
	membro int unsigned,
	plano int,
	primary key(id),
	foreign key (plano) references planos (id),
	foreign key (membro) references membros_location (id)
)engine=innodb charset=utf8mb4;

delimiter //
create procedure add_membro( arg_email varchar(80),arg_nome varchar(30), arg_sobrenome varchar(70),
arg_cep varchar(8), arg_logradouro varchar(250), arg_complemento varchar(250), arg_bairro varchar(150),
arg_localidade varchar(100), arg_uf varchar(2), arg_ibge int, arg_gia int, arg_ddd varchar(3), arg_siafi int)
	begin
		insert into membros(email) values (arg_email);
		insert into membros_info(nome, sobrenome, membro) values (arg_nome, arg_sobrenome, LAST_INSERT_ID());
		insert into membros_location (membro, cep, logradouro, complemento, bairro, localidade, uf, ibge, gia, ddd, siafi) values
		(LAST_INSERT_ID(), arg_cep, arg_logradouro, arg_complemento, arg_bairro, arg_localidade, arg_uf, arg_ibge, arg_gia, arg_ddd, arg_siafi);
		insert into membro_plano (membro, plano) values (LAST_INSERT_ID(), 1);
	end //
delimiter ;

create table categorias(
	id int unsigned auto_increment,
	categoria varchar(50),
	primary key(id)
)engine=innodb charset=utf8mb4;
insert into categorias (categoria) values ("Anime"), ("Quadrinhos"), ("Mangá"), ("Filme"), ("Série");

create table obj_type(
	id int unsigned auto_increment,
	obj_type varchar(30),
	primary key(id)
)engine=innodb charset=utf8mb4;
insert into obj_type (obj_type) values ("série"), ("OVA"), ("Movie"), ("Especial"), ("Graphic Novel"), ("Book"), ("Marvel"), ("DC"), ("Image");

create table object_fan(
	id int unsigned auto_increment,
	nome varchar(100),
	obj_type int unsigned,
	cover text,
	link text,
	primary key(id),
	foreign key(obj_type) references obj_type (id)
)engine=innodb charset=utf8mb4;

create table obj_info(
	id int unsigned auto_increment,
	object_fan int unsigned,
	page_views int unsigned,
	vote_top int unsigned,
	vote_down int unsigned,
	primary key(id),
	foreign key(object_fan) references object_fan(id)
)engine=innodb charset=utf8mb4;

create table galeria(
	id int unsigned auto_increment,
	namegalery varchar(200),
	Object_fan int unsigned,
	primary key(id)
)engine=innodb charset=utf8mb4;

delimiter //
	create procedure authAdministration(arg_email varchar(80), arg_hash text)
		begin
			set @hashpwd=md5(concat("stunt_", arg_hash));
			select count(*) as existe from administration where email=arg_email and pwdsnh=@hashpwd and active=1;
		end //
delimiter ;

create view allusers as 
	select id, email, pwdsnh, active, type_user from administration union select id, email, pwdsnh, active, type_user from membros;

create table tokens_access(
	id int unsigned auto_increment,
	member_id int unsigned,
	access_token text,
	level_user int,
	user_type varchar(30),
	create_in datetime default CURRENT_TIMESTAMP,
	expire_in datetime default (ADDDATE(CURRENT_TIMESTAMP, INTERVAL 1 DAY)),
	primary key(id)
)engine=innodb charset=utf8mb4;



