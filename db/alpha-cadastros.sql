create database alphaCadastros;
use alphaCadastros;

create table tblcontatos (
	id int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(150) not null,
    telefone varchar(17) not null,
    dataDeNascimento date not null,
    profissao varchar(50) not null,
    celular varchar(17) not null,
    possuiWhatsapp boolean,
    notificacoesSMS boolean,
    notificacoesEmail boolean
);

insert into tblcontatos(nome, email, telefone, dataDeNascimento, profissao, celular, possuiWhatsapp, notificacoesSMS, notificacoesEmail) values(
	"Kevin Alves Da Silva",
    "kagamer455677@gmail.com",
    "(12) 4548 4644",
    "2020-12-12 12:12:12",
    "Programador",
    "(11) 99116-5873",
    1,
    1,
    1
);

select * from tblcontatos;