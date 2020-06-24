CREATE DATABASE sgev;

CREATE TABLE veiculo
(
    id INTEGER AUTO_INCREMENT,
    placa VARCHAR (7) NOT NULL,
    cliente VARCHAR (50) NOT NULL,

    PRIMARY KEY (id)
);

CREATE TABLE estadia
(
    id INTEGER AUTO_INCREMENT,
    data date NOT NULL,
    horaInicio DATETIME NOT NULL,
    horaFim DATETIME,
    valor INTEGER,
    idVeiculo INTEGER NOT NULL,
    situacao INTEGER NOT NULL,
    
    PRIMARY KEY (id)
);