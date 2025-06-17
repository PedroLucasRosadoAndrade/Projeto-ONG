create database bd_Ong;
use bd_Ong;

create table Funcionario(
id_fun int primary key auto_increment,
nome_fun varchar(50),
email_fun varchar(50),
senha_fun varchar(50),
comfirmaSenha_fun varchar(50)
);

create table Evento(
id_eve int primary key auto_increment,
tipo_eve varchar(50),
data_eve date,
id_fun_fk int,
foreign key (id_fun_fk) references Funcionario (id_fun)
);
select * from Evento;


create table Denuncia(
id_den int primary key auto_increment,
descricao_den varchar(50),
tipoAnimal_den varchar(50),
cidade_den varchar(50),
situacao_den varchar(50),
endereco_den varchar(50),
id_fun_fk int,
foreign key (id_fun_fk) references Funcionario (id_fun)
);

create table Usuario(
id_usu int primary key auto_increment,
nome_usu varchar(50),
email_usu varchar(50),
senha_usu varchar(50),
comfirmaSenha_usu varchar(50),
id_den_fk int not null,
foreign key (id_den_fk) references Denuncia (id_den)
);

select * from Usuario;

create table Login(
id_log int primary key auto_increment,
email_usu varchar(50),
senha_usu varchar(50),
id_usu_fk int,
foreign key (id_usu_fk) references Usuario (id_usu),
id_fun_fk int,
foreign key (id_fun_fk) references Funcionario (id_fun)
);

create table Doacao(
id_doa int primary key auto_increment,
tipo_doa varchar(50),
nomeProd_doa varchar(50),
quantidade_doa varchar(50),
id_usu_fk int,
foreign key (id_usu_fk) references Usuario (id_usu)
);

alter TABLE login ADD nome_usu VARCHAR(50);
ALTER TABLE Usuario MODIFY id_den_fk INT NULL;
