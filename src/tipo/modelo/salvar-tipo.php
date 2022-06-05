<?php

   //Obter a nossa conexão com o banco de dados
   include('../../conexao/conn.php');

   //Obter os dados enviados do formulário via $_REQUEST
   $requestData = $_REQUEST;

   //Verificação de campos obrigatórios do formulário
   if(empty($requestData['NOME'])){
       //Caso a variáve venha vazia do formulário, retomar um erro
       $dados = array(
           "tipo" => 'error',
           "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
       );
   } else{
       //Caso os campos obrigatório venham preenchidos, iremos realizar o cadastro
       $ID = isset($requestData['ID']) ? $requestData['ID'] : '';
       $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

       //Verificação para cadastro ou atualização de registro
       if($operacao == 'insert') {
           //Comandos para o INSERT no banco de dados ocorreram
           try{
               $stmt = $pdo ->('INSERT INTO TIPO (NOME) VALUES(:a)');
               $stmt->execute(array(
                   ':a' => utf8_decode($requestData['NOME'])
               ));
               $dados = array(
                   "tipo" => 'success',
                   "mensagem" => 'Registro salvo com sucesso.'
               )
           }catch(PDOException $e) {
               $dados = array(
                   "tipo" => 'error',
                   "mensage" => 'Não foi possivel salvar o registro: '.$e
               );
           }
       }else{
           //Se a nossa operação vir vazia então iremos realizar um UPDATE
           try{
            $stmt = $pdo ->('UPDATE TIPO SER NOME = :a WHERE ID = :id');
            $stmt->execute(array(
                ':id' => 'error',
                ':a' => utf8_decode($requestData['NOME'])
            ));
            $dados = array(
                "tipo" => 'success',
                "mensagem" => 'Registro atualizado com sucesso.'
            )
        }catch(PDOException $e) {
            $dados = array(
                "tipo" => 'error',
                "mensage" => 'Não foi possivel salvar o registro: '.$e
            );
        }
       }
   }

   //Converter o nossa array de retorno em uma representação JSON
   echo json_encode($dados);