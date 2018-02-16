<?php

class Carro {
	public $marca;
	public $portas;
	public $tipo;
}

function exibeDadosDoCarro($carro) {
	echo $carro->marca;
	echo $carro->portas;
	echo $carro->tipo;
}

$carro = new Carro();
$carro->marca = "Fusca";
$carro->portas = 2;
$carro->tipo = "compacto";

exibeDadosDoCarro($carro);
?>