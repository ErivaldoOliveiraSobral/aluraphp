<?php
	/**
	* 
	*/
	class Produto {
		public $id;
		public $nome;
		public $preco;
		public $descricao;
		public $categoria;
		public $usado;

		public function precoComDesconto($valor = 10) {
			//$this->preco -= $this->preco * ($valor / 100);
			return $this->preco - ($this->preco * ($valor / 100));
		}
	}
?>