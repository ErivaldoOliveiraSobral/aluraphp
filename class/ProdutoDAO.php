<?php
/*
* Classe de acesso ao banco de dados
*/
class ProdutoDAO {

	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	public function listaProdutos(){
		$produtos = array();
		$result = mysqli_query($this->conexao,"select p.*,c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id=c.id;");

		while ($produto_array = mysqli_fetch_assoc($result)) {

			$id = $produto_array['id'];
			$nome = $produto_array['nome'];
			$preco = $produto_array['preco'];
			$descricao = $produto_array['descricao'];
			$categoria_nome = $produto_array['categoria_nome'];
			$usado = $produto_array['usado'];
			$isbn = $produto_array['isbn'];
			$tipoProduto = $produto_array['tipoProduto'];

			$categoria = new Categoria();
			$categoria->setNome($categoria_nome);

			$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
			$produto->setId($id);
			$produto->setIsbn($isbn);
			$produto->setTipoProduto($tipoProduto);

			array_push($produtos, $produto);
		}

		return $produtos;
	}

	public function insereProduto(Produto $produto){
		$nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
		$descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
		$preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
		$isbn = mysqli_real_escape_string($this->conexao, $produto->getIsbn());

		//escrever query
		$query = "insert into produtos (nome,preco,descricao,categoria_id,usado,isbn,tipoProduto) values (
			'{$nome}',
			'{$preco}',
			'{$descricao}',
			'{$produto->getCategoria()->getId()}',
			'{$produto->isUsado()}',
			'{$isbn}',
			'{$produto->getTipoProduto()}'
		);";

		//enviar para o banco
		return mysqli_query($this->conexao,$query);
	}

	public function removeProduto($id){
		$query = "delete from produtos where id={$id};";
		return mysqli_query($this->conexao,$query);
	}

	public function buscaProduto($id){
		$query = "select * from produtos where id={$id}";
		$resultado = mysqli_query($this->conexao,$query);
		$produto_buscado = mysqli_fetch_assoc($resultado);

		$id = $produto_buscado['id'];
		$nome = $produto_buscado['nome'];
		$preco = $produto_buscado['preco'];
		$descricao = $produto_buscado['descricao'];
		$categoria_id = $produto_buscado['categoria_id'];
		$usado = $produto_buscado['usado'];
		$isbn = $produto_buscado['isbn'];
		$tipoProduto = $produto_buscado['tipoProduto'];

		$categoria = new Categoria();
		$categoria->setId($categoria_id);

		$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
		$produto->setId($id);
		$produto->setIsbn($isbn);
		$produto->setTipoProduto($tipoProduto);

		return $produto;
	}

	public function alteraProduto(Produto $produto){
		$nome = mysqli_real_escape_string($this->conexao, $produto->getNome());
		$descricao = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
		$preco = mysqli_real_escape_string($this->conexao, $produto->getPreco());
		$isbn = mysqli_real_escape_string($this->conexao, $produto->getIsbn());

		$query = "update produtos set 
				nome='{$nome}',
				preco={$preco},
				descricao='{$descricao}',
				categoria_id={$produto->getCategoria()->getId()},
				usado={$produto->isUsado()},
				isbn='{$isbn}',
				tipoProduto='{$produto->getTipoProduto()}' 
			where id='{$produto->getId()}'";
		return mysqli_query($this->conexao,$query);
	}
}

?>