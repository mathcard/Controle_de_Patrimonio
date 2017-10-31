-- Crinado banco de dados
create database patrimonio;

-- Conectando no banco
\c patrimonio

-- Criando tabelas
create table BaixaBemPatrimonial (
numero integer not null,
data date not null,
tipo char(1) not null, --[D]oacao, [E]xtravio/Perda, [I]nutilização, [V]enda, [O]utros
motivo varchar(500) not null,
idUsuario integer not null,
constraint BaixaBemPatrimonial_pk primary key (numero)
);

create table BemPatrimonial (
numero serial not null,
descricao varchar(80) not null,
dataCompra date not null,
prazoGarantia integer not null, -- em meses
nrNotaFiscal integer not null,
fornecedor varchar (60) null,
valor numeric (15,2) not null, 
situacao char(1) not null, --[B]aixado, [I]ncorporado
codCategoria integer not null,
numSala integer not null,
constraint BemPatrimonial_pk primary key (numero)
);

create table Categoria (
codigo serial not null,
nome varchar(50) not null,
descricao varchar(400) not null,
vidaUtil integer not null, -- em anos
constraint Categoria_pk primary key(codigo)
);

create table MBP (
numero serial not null,
dataSolicitacao date not null,
motivo varchar(200) not null,
dataConfirmacao date null,
horaConfirmacao time null,
idSolicitante integer not null,
idAutorizador integer null,
numeroBem integer not null,
numSalaOrigem integer not null,
numSalaDestino integer not null,
constraint MBP_pk primary key (numero)
);

create table Sala (
numero integer not null,
comprimento numeric(5,2) not null, -- em metros
largura numeric(5,2) not null, --em metros
descricao varchar(80),
codPredio integer not null,
siglaDpto char(5) not null,
constraint Sala_pk primary key (numero)
);

create table Predio (
codigo serial not null,
nome varchar(50) not null,
cep integer not null,
logradouro varchar(60) not null,
numero varchar(10) not null,
complemento varchar(60) null,
bairro varchar(40) not null,
cidade varchar(50) not null,
uf char(2) not null,
constraint Predio_pk primary key (codigo)
);

create table Usuario (
id serial not null,
login varchar(20) not null unique,
nome varchar(50) not null,
senha varchar(32) not null,
email varchar(80) not null,
tipo char(1) not null, --[F]uncionario, [D] chefe de Departamento, [P] chefe Patrimonio
sigla char(5) not null,
constraint Usuario_pk primary key (id)
);

create table Departamento(
sigla char(5) not null,
nome varchar(30) not null,
constraint Departamento_pk primary key(sigla)
);

-- Chaves estrangeiras 
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

-- Criando grupo de usuarios com acesso ao banco patrimonio;
create role controleAcademicoUsers;

-- Permissões do grupo controleAcademicoUsers
grant ALL on TABLE Usuario, Categoria, Sala, Predio, Departamento to controleAcademicoUsers;
;

grant insert on TABLE BaixaBemPatrimonial, BemPatrimonial, MBP to controleAcademicoUsers; 

grant update on TABLE BaixaBemPatrimonial, BemPatrimonial, MBP to controleAcademicoUsers;

grant select on TABLE BaixaBemPatrimonial, BemPatrimonial, MBP to controleAcademicoUsers;

grant ALL on SEQUENCE categoria_codigo_seq, predio_codigo_seq, usuario_id_seq, bempatrimonial_numero_seq, mbp_numero_seq to controleAcademicoUsers;

-- Criando usuario
create user queops with password 'piramide' in group controleAcademicoUsers;
