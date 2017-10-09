create database patrimonio;
create user queops with password 'piramide';

create table BaixaBemPatrimonial (
numero integer not null,
data date not null,
tipo char(1) not null,
motivo varchar(500) not null,
idUsuario integer not null,
constraint BaixaBemPatrimonial_pk primary key (numero)
);

create table BemPatrimonial (
numero integer not null,
descricao varchar(80) not null,
dataCompra date not null,
prazoGarantia integer not null,
nrNotaFiscal integer not null,
fornecedor varchar (60),
valor numeric (15,2) not null,
situacao char(1) not null,
codCategoria integer not null,
numSala integer not null,
constraint BemPatrimonial_pk primary key (numero)
);

create table Categoria (
codigo integer not null,
nome varchar(50) not null,
descricao varchar(400) not null,
vidaUtil integer not null,
constraint Categoria_pk primary key(codigo)
);

create table MBP (
numero integer not null,
dataSolicitacao date not null,
motivo varchar(200) not null,
dataConfirmacao date,
horaConfirmacao time,
idSolicitante integer not null,
idAutorizador integer,
numeroBem integer not null,
numSalaOrigem integer not null,
numSalaDestino integer not null,
constraint MBP_pk primary key (numero)
);

create table Sala (
numero integer not null,
comprimento numeric(5,2) not null,
descricao varchar(80),
codPredio integer not null,
siglaDpto char(5) not null,
constraint Sala_pk primary key (numero)
);

create table Predio (
codigo integer not null,
nome varchar(50) not null,
cep integer not null,
logradouro varchar(60) not null,
numero varchar(10) not null,
complemento varchar(60) not null,
bairro varchar(40) not null,
cidade varchar(50) not null,
uf char(2) not null,
constraint Predio_pk primary key (codigo)
);

create table Usuario (
id integer not null,
login varchar(20) not null,
nome varchar(50) not null,
senha varchar(32) not null,
email varchar(80) not null,
tipo char(1) not null,
sigla char(5) not null,
constraint Usuario_pk primary key (id)
);

create table Departamento(
sigla char(5) not null,
nome varchar(30) not null,
constraint Departamento_pk primary key(sigla)
);

alter table BemPatrimonial add constraint BemPatrimonial_Categoria_fk
foreign key (codCategoria)
references Categoria (codigo);

alter table BemPatrimonial add constraint BemPatrimonial_Sala_fk
foreign key (numSala)
references Sala (numero);

alter table BaixaBemPatrimonial add constraint BaixaBemPatrimonial_BemPatrimonial_fk
foreign key (numero)
references BemPatrimonial (numero);

alter table BaixaBemPatrimonial add constraint BaixaBemPatrimonial_Usuario_fk
foreign key (idUsuario)
references Usuario (id);

alter table Sala add constraint Sala_Predio_fk
foreign key (codPredio)
references Predio (codigo);

alter table Sala add constraint Sala_Departamento_fk
foreign key (siglaDpto)
references Departamento (sigla);

alter table Usuario add constraint Usuario_Departamento_fk
foreign key (sigla)
references Departamento (sigla);

alter table MBP add constraint MBP_Usuario_soc_fk
foreign key (idSolicitante)
references Usuario (id);

alter table MBP add constraint MBP_Usuario_aut_fk
foreign key (idAutorizador)
references Usuario (id);

alter table MBP add constraint MBP_BemPatrimonial_fk
foreign key (numeroBem)
references BemPatrimonial (numero);

alter table MBP add constraint MBP_Sala_src_fk
foreign key (numSalaOrigem)
references Sala (numero);

alter table MBP add constraint MBP_Sala_dst_fk
foreign key (numSalaDestino)
references Sala (numero);