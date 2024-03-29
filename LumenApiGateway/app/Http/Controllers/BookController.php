<?php

namespace App\Http\Controllers;

use App\Book;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

/**
 *  Retorna livros do micro service
 *
 * @var BookService
 */
    public $bookServie;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookServie)
    {
        $this->bookServie = $bookServie;
        //
    }

    /**
     * Return the list of books
     * @return Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Create one new book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Obtains and show one book
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {

    }

    /**
     * Update an existing book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {

    }

    /**
     * Remove an existing book
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {

    }
}
