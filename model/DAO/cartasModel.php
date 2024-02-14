<?php 
/***********************************************************************************
 * Objetivo: Arquivo responsável por manipular os dados de contato dentro do BD 
 *      (insert, update, select e delete)
 * Autor: Bianca Leão
 * Data: 08/02/2024
 * Versão: 1.0
***********************************************************************************/

// Import do arquivo que estabelece a conexão com o BD
require_once('./model/bd/conexao.php');

// Função para listar todas as cartas de Clash Royale
function selectCartas()
{
    // Abre a conexão com o BD
    $conexao = conexaoMysql();

    // Script para listar todos os dados da tabela tbl_carta
    $sql = "SELECT 
    c.id_carta,
    c.nome_carta,
    c.descricao_carta,
    c.elixir_carta,
    c.img_carta,
    r.nome_raridade,  -- Nome da raridade
    t.nome_tipo      -- Nome do tipo
FROM 
    tbl_carta c
INNER JOIN 
    tbl_raridade r ON c.id_raridade = r.id_raridade
INNER JOIN 
    tbl_tipo t ON c.id_tipo = t.id_tipo;";
    
    // Executa o script SQL no BD e guarda o retorno dos dados, se houver
    $result = mysqli_query($conexao, $sql);

    // Valida se o BD retornou registros
    if($result)
    {
        $cartas = array(); // Array para armazenar os dados das cartas
        
        while ($rsDados = mysqli_fetch_assoc($result))
        {
            // Adiciona os dados da carta ao array de cartas
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

        // Retorna os dados das cartas em formato JSON
        return json_encode($cartas);
    } else {
        return false;
    }
}

?>
