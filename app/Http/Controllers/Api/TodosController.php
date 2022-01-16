<?php

namespace App\Http\Controllers\Api;

use App\Todos;
use Illuminate\Http\Request;
use App\Http\Resources\TodosResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;


class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $todos = TodosResource::collection(Todos::all());

        $response = [
            'todos' => $todos,
            'status' => Response::HTTP_OK,
            'message' => 'All Todo List Successfully Retrieved',
        ];
        
        if($request->user_id){
            $currenttodos = $todos->where('user_id', $request->user_id)->first();
            $response = [
                'todos' => $currenttodos,
                'status' => Response::HTTP_OK,
                'message' => 'Todo List Successfully Retrieved',
            ];
        }

        return response()->json($response, Response::HTTP_OK);
    }

}
