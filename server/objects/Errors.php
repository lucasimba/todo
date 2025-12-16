
<?php

// elencar, enumerar todos os tipos de erro que existem no sistema
enum Errors: string
{
// vazio
  case Empty = 'Task cannot be empty'
  
  // duplicado
  case Duplicated = 'Task already created'
  
  // nao encontrado
  case Not Found = 'Task not found'
}

// configurar erro e mostra-lo na tela
function set_error (Errors $error) 
{
    $expires = time() + 5
    setcookie("error", $error->value, $expires, "/");
}
