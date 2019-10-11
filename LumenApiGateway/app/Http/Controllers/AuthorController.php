<?php

namespace App\Http\Controllers;

use App\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * Serviço para consumir o autor
     *
     * @var AuthorService
     */
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
     $this->authorService = $authorService;   //
    }

    /**
     * Return the list of authors
     * @return Iluminate\Http\Response
     */

    public function index()
    {

    }

    /**
     * Create one new author
     *
     * @return Iluminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Obtains an show one athor
     *
     * @return Iluminate\Http\Response
     */
    public function show($author)
    {

    }

    /**
     * Update an author
     *
     * @return Iluminate\Http\Response
     */
    public function update(Request $request, $author)
    {


    }


    /**
     * Remove an author
     *
     * @return Iluminate\Http\Response
     */
    public function destroy($author)
    {



    }
    //
}
