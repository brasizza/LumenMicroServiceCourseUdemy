<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of authors
     * @return Iluminate\Http\Response
     */

    public function index()
    {
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    /**
     * Create one new author
     *
     * @return Iluminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255',
        ];
        $this->validate($request, $rules);
        $author = Author::create($request->all());
        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    /**
     * Obtains an show one athor
     *
     * @return Iluminate\Http\Response
     */
    public function show($author)
    {

        $author = Author::findOrFail($author);
        return $this->successResponse($author, RESPONSE::HTTP_OK);
    }

    /**
     * Update an author
     *
     * @return Iluminate\Http\Response
     */
    public function update(Request $request, $author)
    {

        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'country' => 'max:255',
        ];
        $this->validate($request, $rules);
        $author = Author::findOrFail($author);
        $author->fill($request->all());
        if ($author->isClean()) {
            return $this->errorResponse(' Pelo menos um campo precisa ser alterado', Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $author->save();
            return $this->successResponse($author, Response::HTTP_OK);
        }
    }


    /**
     * Remove an author
     *
     * @return Iluminate\Http\Response
     */
    public function destroy($author)
    {

        $author = Author::findOrFail($author);
        $author->delete();
        return $this->successResponse($author,Response::HTTP_OK);

    }
    //
}
