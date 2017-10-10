-- INSERTS PARA TESTE
insert into Departamento values 
('FINAN', 'Departamento Financeiro'),
('TI', 'Departamento TI'),
('COMER', 'Departamento Comercial');

insert into Usuario values
(DEFAULT, 'math@teste', 'Matheus', md5('123'), '1@1', 'P', 'FINAN'),
(DEFAULT, 'cristhian@teste', 'Cristhian', md5('123'), '1@1', 'D', 'TI'),
(DEFAULT, 'Denise@teste', 'Denise', md5('123'), '1@1', 'F', 'COMER'),
(DEFAULT, 'Maria@teste', 'Maria', md5('123'), '1@1', 'P', 'COMER');

insert into Predio values
(DEFAULT, 'World Trade Center', 76170000, 'Rua 00', 'SN', '17º Andar', 'Centro', 'Goiânia', 'GO'),
(DEFAULT, 'World Trade Center Two', 76170010, 'Rua 10', 'SN', '15º Andar', 'Centro', 'Goiânia', 'GO');

insert into Categoria values
(DEFAULT, 'Movéis', 'Mesas, Cadeiras, Armarios', 10),
(DEFAULT, 'Eletronicos', 'PCs, Notebooks, Telefone' , 5);

insert into Sala values
(1, 100.00, 50.00, 'Sala Financeiro 1 ', 1, 'FINAN'),
(2, 800.00, 50.00, 'CPD ', 1, 'TI'),
(3, 100.00, 50.00, 'Sala Comercial 1 ', 1, 'COMER'),
(4, 100.00, 50.00, 'Sala Financeiro 1 ', 2, 'FINAN'),
(5, 800.00, 50.00, 'CPD ', 2, 'TI'),
(6, 100.00, 50.00, 'Sala Comercial 1 ', 2, 'COMER');

insert into BemPatrimonial values
(DEFAULT, 'cadeira', '2017-08-15', 10, 10258, 'Casas Bahia', 135.50, 'I', 1, 1),
(DEFAULT, 'cadeira', '2017-08-15', 10, 10258, 'Casas Bahia', 135.50, 'I', 1, 2),
(DEFAULT, 'cadeira', '2017-08-15', 10, 10258, 'Casas Bahia', 135.50, 'I', 1, 3),
(DEFAULT, 'cadeira', '2017-08-15', 10, 10258, 'Casas Bahia', 135.50, 'I', 1, 4),
(DEFAULT, 'mesa', '2016-04-27', 6, 11878, 'Casas Bahia', 175.00, 'I', 1, 1),
(DEFAULT, 'mesa', '2016-04-27', 6, 11878, 'Casas Bahia', 175.00, 'I', 1, 2),
(DEFAULT, 'mesa', '2016-04-27', 6, 11878, 'Casas Bahia', 175.00, 'I', 1, 3),
(DEFAULT, 'mesa', '2016-04-27', 6, 11878, 'Casas Bahia', 175.00, 'I', 1, 4),
(DEFAULT, 'PC', '2016-07-22', 12, 13458, 'DELL', 2835.50, 'I', 2, 2),
(DEFAULT, 'PC', '2016-07-22', 12, 13458, 'DELL', 2835.50, 'I', 2, 2),
(DEFAULT, 'PC', '2016-07-22', 12, 13458, 'DELL', 2835.50, 'I', 2, 5),
(DEFAULT, 'PC', '2016-07-22', 12, 13458, 'DELL', 2835.50, 'I', 2, 5);

insert into MBP values
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 4, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 2, 1, 3, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 2, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 2, 1, 5, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 6, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 2, 1, 8, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 4, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 7, 1, 2),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 1, 2, 1),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 6, 2, 1),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 2, 2, 1),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 2, 1, 4, 2, 1),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 2, 1, 8, 2, 1),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 4, 2, 1),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 9, 2, 1),
(DEFAULT, '2017-05-12', 'nÃO SEI', '2017-05-18', '08:30', 3, 1, 4, 2, 1);

insert into BaixaBemPatrimonial values
(1, '2017-05-05', 'E', 'nÃO SEI', 2),
(2, '2017-05-05', 'E', 'nÃO SEI', 2),
(4, '2017-05-05', 'E', 'nÃO SEI', 2),
(7, '2017-05-05', 'E', 'nÃO SEI', 2),
(3, '2017-05-05', 'E', 'nÃO SEI', 2);

/*
DELETANDO INSERTS DE TESTE
delete from BaixaBemPatrimonial;
delete from MBP;
delete from BemPatrimonial;
delete from Sala;
delete from Categoria;
delete from Predio;
delete from Usuario;
delete from Departamento;
