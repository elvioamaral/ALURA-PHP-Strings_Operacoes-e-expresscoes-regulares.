<?php

spl_autoload_register(function ($classe){

    $prefixo = "App\\";

    $diretorio = __DIR__ . "/src/";

    if (strncmp($prefixo, $classe, strlen($prefixo)) !== 0) {
        return;
    }
    
    $namespace = substr($classe, strlen($prefixo));

    $namespaceSeparador = (str_replace('\\', DIRECTORY_SEPARATOR, $namespace));
    
    $arquivo = $diretorio . $namespaceSeparador . '.php';

    var_dump($arquivo);

});