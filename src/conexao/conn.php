<?php

 // Carregar as credenciais do banco de dados
 $hostname = "sql111.epizy.com";
 $database = "epiz_31856824_sysrifa";
 $user = "	epiz_31856824";
 $password = "F4wlASI48gp";

 try{

 }catch{
     $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $password);
     $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo 'Conexão com o banco de dados'.$database.', foi realizado com sucesso!';
 }catch (PDOException $e){
     echo 'Erro: '.$e ->getMenssage();
 }