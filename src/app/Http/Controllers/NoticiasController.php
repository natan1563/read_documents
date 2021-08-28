<?php

namespace App\Http\Controllers;

use App\Models\Noticias;
use Exception;
use Illuminate\Http\Request;

use function Psy\debug;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Noticias::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        switch (true) {
            case (is_array(current($requestData))):
               try {
                foreach ($requestData as $requestUnique)
                    Noticias::create($requestUnique);

                return response()->json(['success' => 'Dados salvos com sucesso'], 201);
               } catch (Exception $e) {
                return response()->json(['error' => 'Falha na gravação dos dados'], 400);
            }
            break;

            case (count($requestData)):
                try {
                    Noticias::create($requestData);
                    return response()->json(['success' => 'Dado salvo com sucesso'], 201);
                } catch (Exception $e) {
                    return response()->json(['error' => 'Falha na gravação do dado'], 400);
                }
            break;

            default:
                return response()->json(['error' => 'Dados invalidos'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
