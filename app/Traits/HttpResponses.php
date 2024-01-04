<?php

namespace App\Traits;

trait HttpResponses{

    protected function success($data,$code=200)
    {
    return response()->json([
         'statuts'=>'Request was successful',
          'data'=>$data
    ], $code);
}
   
    protected function error($data,$code)
    {
    return response()->json([
         'statuts'=>'error was occured',
         'data'=>$data
    ], $code);
}

}