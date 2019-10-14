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
            return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create one new author
     *
     * @return Iluminate\Http\Response
     */
    public function store(Request $request)
    {

        return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Obtains an show one athor
     *
     * @return Iluminate\Http\Response
     */
    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));


    }

    /**
     * Update an author
     *
     * @return Iluminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(),$author));
    }


    /**
     * Remove an author
     *
     * @return Iluminate\Http\Response
     */
    public function destroy($author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));

    }
    //
}
