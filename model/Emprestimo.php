<?php
require_once("controller/CategoriaController.php");


class Produto
{
    private $nome, $email, $documento; //Varchar
    private $ra, $idProduto, $quantidade, $idEmprestimo; // Int
    private $dataEmprestimo; // Date
    

    public function __construct() {

    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getDocumento(): string{
        return $this->documento;
    }

    public function getRa(): int{
        return $this->ra;
    }

    public function getIdProduto(): int{
        return $this->idProduto;
    }

    public function getQuantidade(): int{
        return $this->quantidade;
    }

    public function getIdEmprestimo(): int{
        return $this->idEmprestimo;
    }

    public function getDataEmprestimo(): string{
        return $this->nome;
    }

    public function setNome(string $nome){
        if($nome != null){
            if(strlen ($nome) <= 100){
                $feedback['status'] = 1;
                $this->nome = $nome;
            }else{
                $feedback['nome_do_campo'] = "nome";       
                $feedback['mensagem'] = "O nome excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "nome";       
            $feedback['mensagem'] = "O campo nome está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
    }

    public function setEmail(string $email){
        if($email != null){
            if(strlen ($email) <= 60){
                $feedback['status'] = 1;
                $this->email = $email;
            }else{
                $feedback['nome_do_campo'] = "email";       
                $feedback['mensagem'] = "O email excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "email";       
            $feedback['mensagem'] = "O campo email está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
    }

    public function setDocumento(string $documento){
        if($documento != null){
            if(strlen ($documento) <= 13){
                $feedback['status'] = 1;
                $this->documento = $documento;
            }else{
                $feedback['nome_do_campo'] = "documento";       
                $feedback['mensagem'] = "O documento excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "documento";       
            $feedback['mensagem'] = "O campo documento está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
    }

    public function setRa(string $ra){
        if($ra != null){
            if(is_numeric($ra)){
                if(strlen ($ra) <= 11){
                    $feedback['status'] = 1;

                    $this->ra = intval($ra);
                }else{
                    $feedback['nome_do_campo'] = "ra";       
                    $feedback['mensagem'] = "O ra excedeu o tamanho máximo";
                    $feedback['status'] = -1;
                }
            }else{
                $feedback['nome_do_campo'] = "ra";       
                $feedback['mensagem'] = "O campo ra deve ser numerico";  
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "ra";       
            $feedback['mensagem'] = "O campo ra está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;   
    }

    public function setIdProduto(string $idProduto){
        if($idProduto != null){
            if(is_numeric($idProduto)){
                if(strlen ($idProduto) <= 11){
                    $feedback['status'] = 1;

                    $this->idProduto = intval($idProduto);
                }else{
                    $feedback['nome_do_campo'] = "idProduto";       
                    $feedback['mensagem'] = "O idProduto excedeu o tamanho máximo";
                    $feedback['status'] = -1;
                }
            }else{
                $feedback['nome_do_campo'] = "idProduto";       
                $feedback['mensagem'] = "O campo idProduto deve ser numerico";  
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "idProduto";       
            $feedback['mensagem'] = "O campo idProduto está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;   
    }

    public function setQuantidade(string $quantidade){
        if($quantidade != null){
            if(is_numeric($quantidade)){
                if(strlen ($quantidade) <= 6){
                    $feedback['status'] = 1;

                    $this->quantidade = intval($quantidade);
                }else{
                    $feedback['nome_do_campo'] = "quantidade";       
                    $feedback['mensagem'] = "O quantidade excedeu o tamanho máximo";
                    $feedback['status'] = -1;
                }
            }else{
                $feedback['nome_do_campo'] = "quantidade";       
                $feedback['mensagem'] = "O campo quantidade deve ser numerico";  
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "quantidade";       
            $feedback['mensagem'] = "O campo quantidade está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;   
    }

    public function setDataEmprestimo(string $dataEmprestimo){
        if($dataEmprestimo != null){
            if(is_numeric($dataEmprestimo)){
                if(strlen ($dataEmprestimo) <= 6){
                    $feedback['status'] = 1;

                    $this->dataEmprestimo = intval($dataEmprestimo);
                }else{
                    $feedback['nome_do_campo'] = "dataEmprestimo";       
                    $feedback['mensagem'] = "O campo data emprestimo excedeu o tamanho máximo";
                    $feedback['status'] = -1;
                }
            }else{
                $feedback['nome_do_campo'] = "quantidade";       
                $feedback['mensagem'] = "O campo data emprestimo deve ser numerico";  
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "dataEmprestimo";       
            $feedback['mensagem'] = "O campo data emprestimo está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;   
    }
}