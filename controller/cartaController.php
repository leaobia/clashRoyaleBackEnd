<?php

/***********************************************************************
 * Objetivo: Arquivo responsavel para gerenciamento de dados que chegam do banco de dados
 * Autor: Bianca
 * Data: 08/02/2024
 * Versão: 1.0
 ************************************************************************/

// //import do arquivo de configuração do projeto
// require_once('./modulo/config.php');

//import do arquivo que vai buscar os dados no DB
require_once('./model/DAO/cartasModel.php');

//Função para solicitar os dados da model e encaminhar a lista 
//de contatos para a View

function listarCartas()
{
    //chama a função que vai buscar os dados no BD
    $dados = selectCartas();

    if (!empty($dados))
        return array(
            'status' => 200,
            'message' => 'Requisição bem sucedida',
            'cartas' => $dados
        );
    else
        return false;
}

?>