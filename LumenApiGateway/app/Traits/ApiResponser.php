<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser{

    /**
     *
     * Build Success Response
     * @param  string|array $data
     * @param int $code
     * @return Iluminate\Http\Response
     */

    public function successResponse($data,$code = Response::HTTP_OK){

        return response($data,$code)->header('Content-Type','application/json');
    }



     /**
     *
     * Build Erros Response
     * @param  string|array $message
     * @param int $code
     * @return Iluminate\Http\JsonResponse
     */

    public function errorResponse($message,$code){
        return response()->json(['error' => $message ,'code'=>$code],$code);
    }


  /**
     *
     * Build Erros Response
     * @param  string|array $message
     * @param int $code
     * @return Iluminate\Http\Response
     */

    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}

?>