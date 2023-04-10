create table despesas (
    id_despesa int primary key auto_increment,
    nome_despesa varchar(200) not null,
    valor float not null,
    data_mes date not null
)

create table entradas (
    id_entrada int primary key auto_increment,
    nome_entrada varchar(200) not null,
    valor float not null,
    data_mes date not null
)
