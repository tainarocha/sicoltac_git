CREATE DATABASE SICOLTAC;
USE SICOLTAC;


CREATE TABLE IF NOT EXISTS cooperativa(
	id int(10) NOT NULL auto_increment,
    nome VARCHAR(100) NOT NULL,
    cnpj VARCHAR(18) NOT NULL,
    endereco VARCHAR(40) DEFAULT NULL,
    numero INT(10) DEFAULT NULL,
    bairro VARCHAR(25) DEFAULT NULL,
    cidade VARCHAR(25) DEFAULT NULL,
    cep VARCHAR(10) DEFAULT NULL,
    telefone VARCHAR(14) NOT NULL,
    email VARCHAR(50)NOT NULL,
    PRIMARY KEY(id)
);


CREATE TABLE IF NOT EXISTS produtor(
	id int(10) NOT NULL auto_increment,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    endereco VARCHAR(40) DEFAULT NULL,
    numero INT(10) DEFAULT NULL,
    bairro VARCHAR(25) DEFAULT NULL,
    cidade VARCHAR(25) DEFAULT NULL,
    cep VARCHAR(10) DEFAULT NULL,
    telefone VARCHAR(14) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS entrega(
	id INT(10) NOT NULL auto_increment,
    quantidade DOUBLE NOT NULL,
    dat DATE NOT NULL,
    hora TIME NOT NULL,
    produtor_id INT(10) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (produtor_id) REFERENCES produtor (id)
);


