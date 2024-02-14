<?php 
/***********************************************************************************
 * Objetivo: Arquivo responsável por manipular os dados de contato dentro do BD 
 *      (insert, update, select e delete)
 * Autor: Bianca Leão
 * Data: 08/02/2024
 * Versão: 1.0
***********************************************************************************/


require_once('./model/bd/conexao.php');


function selectCartas()
{
 
    $conexao = conexaoMysql();

   
    $sql = "SELECT 
    c.id_carta,
    c.nome_carta,
    c.descricao_carta,
    c.elixir_carta,
    c.img_carta,
    r.nome_raridade,  
    t.nome_tipo      
FROM 
    tbl_carta c
INNER JOIN 
    tbl_raridade r ON c.id_raridade = r.id_raridade
INNER JOIN 
    tbl_tipo t ON c.id_tipo = t.id_tipo;";
    
  
    $result = mysqli_query($conexao, $sql);

  
    if($result)
    {
        $cartas = array(); 
        
        while ($rsDados = mysqli_fetch_assoc($result))
        {
           
            $cartas[] = array (
                "id_carta"           =>  $rsDados['id_carta'],
                "nome_carta"         =>  $rsDados['nome_carta'],
                "descricao_carta"    =>  $rsDados['descricao_carta'],
                "elixir_carta"       =>  $rsDados['elixir_carta'],
                "nome_raridade"      =>  $rsDados['nome_raridade'],
                "nome_tipo"          =>  $rsDados['nome_tipo'],
                "img_carta"          =>  $rsDados['img_carta']
            );
        }

       
        return json_encode($cartas);
    } else {
        return false;
    }
}

?>
