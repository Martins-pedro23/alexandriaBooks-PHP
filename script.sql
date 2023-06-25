drop database Alexandria_Books;
create database if not exists Alexandria_Books;
Use Alexandria_Books;
create table if not exists Alexandria_Books.Cliente(
    ID_Cliente INT not null AUTO_INCREMENT,
    Nome varchar (150) not null,
    CPF varchar (50) NOT NULL,
    DT_Nasc varchar(150) not null,
    Telefone varchar (20) null default null,
    Email varchar (150) null default null,
    Endereco varchar (250) null default null,
    Senha varchar (50) null default null,
    primary key (ID_Cliente)
);
create table if not exists Alexandria_Books.Imagem_Cliente(
    ID_Imagem_Cliente INT not null AUTO_INCREMENT,
    Caminho_Img_Cliente varchar(200) not null,
    ID_Cliente int not NULL,
    primary key (ID_Imagem_Cliente, ID_Cliente),
    constraint fk_Imagem_Cliente
        foreign key (ID_Cliente)
        references Alexandria_Books.Cliente(ID_Cliente)

);
CREATE TABLE IF NOT EXISTS Alexandria_Books.Fornecedor(
    ID_Fornecedor INT NOT NULL AUTO_INCREMENT,
    Nome_Fornecedor VARCHAR(100) NOT NULL,
    CNPJ_Fornecedor VARCHAR(20) NOT NULL,
    Email_Fornecedor VARCHAR(100) NOT NULL,
    Tel_Fornecedor VARCHAR(20) NOT NULL,
    Endereco_Fornecedor VARCHAR(150) NOT NULL,
    Descricao VARCHAR(150) NULL DEFAULT NULL,
    CEP_Fornecedor VARCHAR(20) NOT NULL,
    PRIMARY KEY(ID_Fornecedor)
);
create table if not exists Alexandria_Books.Genero(
    ID_Genero int not null auto_increment,
    Nome_Genero varchar(60),
    primary key (ID_Genero)
);
create table if not exists Alexandria_Books.Produto(
    ID_Produto int not null auto_increment,
    Nome VARCHAR(150) NOT NULL,
    Descricao varchar(2000) not null,
    Vlr_Unitario decimal(9,2) not null,
    Capa varchar(45) not null,
    Num_Pag int not null,
    Idioma varchar(45) not null,
    Formato varchar(50) not null,
    Peso varchar(20) not null,
    Estoque int not null,
    ID_Fornecedor int not null,
    ID_Genero int not null,
    primary key (ID_Produto),
    constraint fk_Genero_Produto
        foreign key (ID_Genero)
        references Alexandria_Books.Genero(ID_Genero),
    constraint fk_Fornecedor_Produto
        foreign key (ID_Fornecedor)
        references Alexandria_Books.Fornecedor(ID_Fornecedor)

);
create table if not exists Alexandria_Books.Imagem_Produto(
    ID_Imagem_Produto INT not null AUTO_INCREMENT,
    Caminho_Img_Produto varchar(150) not null,
    ID_Produto int not NULL,
    primary key (ID_Imagem_Produto),
    constraint fk_Produto_Imagem
        foreign key (ID_Produto)
        references Alexandria_Books.Produto(ID_Produto)

);

create table if not exists Alexandria_Books.Venda(
    ID_Venda int not null auto_increment,
    `data` datetime not null,
    Valor_Total decimal(9,2) not null,
    ID_Cliente int not NULL,
    primary key (ID_Venda, ID_Cliente),
    constraint fk_Venda_Cliente
        foreign key (ID_Cliente)
        references Alexandria_Books.Cliente(ID_Cliente)
);
create table if not exists Alexandria_Books.Item_venda(
    ID_Item_venda int not null auto_increment,
    Quantidade INT not null,
    ID_Venda int not null,
    ID_Produto int NOT null,
    primary key (ID_Item_venda),
    constraint fk_Item_Venda_Venda
        foreign key (ID_Venda)
        references Alexandria_Books.Venda(ID_Venda),
    constraint fk_Item_Venda_Produto
        foreign key (ID_Produto)
        references Alexandria_Books.Produto(ID_Produto)
);

Insert into Genero (Nome_Genero) Values ("Romance");