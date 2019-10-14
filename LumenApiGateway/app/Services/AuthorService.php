<?php
namespace App\Services;

use App\Traits\ConsumesExternalServices;

class AuthorService
{

use ConsumesExternalServices;
/**
 * Base Uri
 *
 * @var string
 */
public $baseUri;

/**
 * Secret para o autor
 *
 * @var string
 */
public $secret;


public function __construct()
{
    $this->baseUri = config("services.authors.base_uri");
    $this->secret = config("services.authors.secret");
}

/**
 * Pegar todos os autores do micro servico
 * @return  string
 */

public function obtainAuthors(){

    return $this->performRequest("GET","/authors");

}


public function obtainAuthor($author){
    return $this->performRequest("GET","/authors/{$author}");
}

public function createAuthor($data){

    return $this->performRequest("POST", "/authors", $data);
}


public function editAuthor($data,$author){

    return $this->performRequest("PUT", "/authors/{$author}", $data);
}

public function deleteAuthor($author){
    return $this->performRequest("DELETE", "/authors/{$author}");


}

}
