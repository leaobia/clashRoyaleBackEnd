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
    $sql = "SELECT * FROM tbl_carta";
    
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
                "id_raridade"        =>  $rsDados['id_raridade'],
                "id_tipo"            =>  $rsDados['id_tipo']
            );
        }

        // Retorna os dados das cartas em formato JSON
        return json_encode($cartas);
    } else {
        return false;
    }
}

?>
