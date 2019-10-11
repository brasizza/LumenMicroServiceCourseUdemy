<?php
namespace App\Services;

use App\Traits\ConsumesExternalServices;

class BookService
{

use ConsumesExternalServices;
/**
 * Base Uri
 *
 * @var string
 */
public $baseUri;


public function __construct()
{
    $this->baseUri = config('services.books.base_uri');
}


}
