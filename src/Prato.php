<?php

namespace GoEat;

class Prato extends Model
{
    protected ?int $id;
    protected string $nome;
    protected string $descricao;
    protected float $preco;
    protected string $imagem;
    protected ?int $tipo;
    protected ?int $disponivel;
    protected ?int $restaurante;
    
    public function __construct(
        string $nome  = '',
        string $descricao = '',
        float $preco = 0,
        string $imagem = '',
        int $tipo = 0,
        int $disponivel = 0,
        int $restaurante = 0
    )
    {
        parent::__construct('pratos', 'id');

        $this->id = null;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->imagem = $imagem;
        $this->tipo = $tipo;
        $this->disponivel = $disponivel;
        $this->restaurante = $restaurante;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * Get the value of imagem
     */ 
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */ 
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of disponivel
     */ 
    public function getDisponivel()
    {
        return $this->disponivel;
    }

    /**
     * Set the value of disponivel
     *
     * @return  self
     */ 
    public function setDisponivel($disponivel)
    {
        $this->disponivel = $disponivel;

        return $this;
    }

    /**
     * Get the value of restaurante
     */ 
    public function getRestaurante()
    {
        return $this->restaurante;
    }

    /**
     * Set the value of restaurante
     *
     * @return  self
     */ 
    public function setRestaurante($restaurante)
    {
        $this->restaurante = $restaurante;

        return $this;
    }

   /* public static function all() {
        // Conexão com o banco de dados
        $conexao = new Conexao(); // Supondo uma classe de conexão 
    
        // Query para buscar todos os pratos
        $query = "SELECT * FROM pratos"; // Substitua 'tabela_de_pratos' pelo nome correto da sua tabela
    
        // Executar a query
        $resultado = $conexao->query($query);     
        // Verificar se a query foi bem-sucedida
        if ($resultado) {
            // Inicializar um array para armazenar os pratos
            $pratos = [];
    
            // Iterar sobre os resultados e armazenar na variável $pratos
            while ($prato = $resultado->fetch_assoc()) {
                $pratos[] = $prato;
            }
    
            return $pratos;
        } else {
            // Se a query falhou, retorne null ou trate o erro de acordo com sua lógica
            return null;
        }
    } */
    
}
    