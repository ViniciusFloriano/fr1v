create database contaDeLuz;
use contaDeLuz;

create table registro(
numLeitura int primary key,
valPagar double,
dataLeitura int,
mediaConsumo double,
kwGasto int,
dataPagamento int
);
select * from registro;

select numLeitura from registro