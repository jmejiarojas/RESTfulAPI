<?php namespace App\Http\Controllers;

use App\Fabricante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FabricanteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(){
		$this->middleware('auth.basic',['only' => ['store','update','destroy']]);
	}

	public function index()
	{
		$fabricantes = Fabricante::all();
		return response()->json(['datos' => $fabricantes],200);

	}


	public function store(Request $request)
	{
		//Si no recibimos los valores
		if((!$request->input('nombre') || (!$request->input('telefono')))){
			return response()->json(['mensaje' => 'Complete datos...','codigo' => 422],422);
		}
		Fabricante::create($request->all());
		return response()->json(['mensaje' => 'datos insertados', 'codigo'=>201], 201);
	}

	public function show($id)
	{
		$fabricante= Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje' => 'No se encuentra este fabricante','codigo' => 404],404);
		}
		return response()->json(['dato'=>$fabricante],200);
	}

	public function update($id)
	{
		return "Recibiendo , estamos en update, metodo POST";
	}


}
