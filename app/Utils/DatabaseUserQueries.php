<?php

namespace App\Utils;

class DatabaseUserQueries
{
    public function getSQL()
    {
        return [
            "CREATE TABLE product (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                amount INT(4) NOT NULL,
                brand VARCHAR(50),
                price DECIMAL(10, 2) NOT NULL,
                status TINYINT DEFAULT 1
            ) engine = InnoDB;",
            "CREATE TABLE address (
                id INT PRIMARY KEY AUTO_INCREMENT,
                address VARCHAR(100) NOT NULL,
                number VARCHAR(5),
                district VARCHAR(100),
                city VARCHAR(50),
                state VARCHAR(50),
                cep VARCHAR(8) NOT NULL
            ) engine = InnoDB;",
            "CREATE TABLE costumer (
                cpf VARCHAR(11) PRIMARY KEY,
                name VARCHAR(150) NOT NULL,
                rg VARCHAR(9),
                email VARCHAR(150),
                telephone VARCHAR(11),
                fk_address INT,
                FOREIGN KEY (fk_address) REFERENCES address(id)
            ) engine = InnoDB;",
            "CREATE TABLE request (
                id CHAR(36) PRIMARY KEY,
                date DATE NOT NULL,
                value DECIMAL(10, 2) NOT NULL,
                fk_costumer VARCHAR(11),
                FOREIGN KEY (fk_costumer) REFERENCES costumer(cpf)
            ) engine = InnoDB;",
            "CREATE TABLE product_request (
                id INT PRIMARY KEY AUTO_INCREMENT,
                fk_product INT NOT NULL,
                fk_request CHAR(36) NOT NULL,
                FOREIGN KEY(fk_product) REFERENCES product(id),
                FOREIGN KEY(fk_request) REFERENCES request(id)
            ) engine = InnoDB;",
            "CREATE TABLE employee (
                cpf VARCHAR(11) PRIMARY KEY,
                name VARCHAR(150) NOT NULL,
                rg VARCHAR(9),
                email VARCHAR(150),
                telephone VARCHAR(11),
                role VARCHAR(20)
            ) engine = InnoDB;",
            "CREATE TABLE sysLog (
                id INT PRIMARY KEY AUTO_INCREMENT,
                occurrence VARCHAR(250) NOT NULL,
                date DATE NOT NULL,
                fk_costumer VARCHAR(11),
                FOREIGN KEY (fk_costumer) REFERENCES costumer(cpf),
                fk_employee VARCHAR(11),
                FOREIGN KEY (fk_employee) REFERENCES employee(cpf)
            ) engine = InnoDB;",
            "CREATE TABLE sale (
                id INT PRIMARY KEY AUTO_INCREMENT,
                date DATE NOT NULL,
                fk_request CHAR(36),
                FOREIGN KEY (fk_request) REFERENCES request(id),
                fk_employee VARCHAR(11),
                FOREIGN KEY (fk_employee) REFERENCES employee(cpf)
            ) engine = InnoDB;",
            "CREATE TABLE provider (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(100),
                pk_address INT,
                FOREIGN KEY (pk_address) REFERENCES address(id)
            ) engine = InnoDB;",
            "CREATE TABLE product_provider (
                id INT PRIMARY KEY AUTO_INCREMENT,
                fk_product INT,
                FOREIGN KEY(fk_product) REFERENCES product(id),
                fk_provider INT,
                FOREIGN KEY(fk_provider) REFERENCES provider(id)
            ) engine = InnoDB;",
        ];
    }
}
