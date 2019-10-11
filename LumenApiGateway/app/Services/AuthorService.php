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


public function __construct()
{
    $this->baseUri = config('services.authors.base_uri');
}


}
