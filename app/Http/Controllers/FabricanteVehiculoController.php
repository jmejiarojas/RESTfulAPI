<?php namespace App\Http\Controllers;

use App\Fabricante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vehiculo;
use Illuminate\Http\Request;

class FabricanteVehiculoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function  __construct(){
		$this->middleware('auth.basic',['only'=>['store','update','destroy']]);
	}

	public function index($id)
	{

		$fabricante = Fabricante::find($id);
		if(!$fabricante){
			return response()->json(['mensaje' => 'No existe el fabricante de id: '.$id, 'codigo' => 404],404);
		}else{
			return response()->json(['data' => $fabricante->vehiculos, 'codigo' => 202], 202);
		}
	}

	public function store(Request $request, $id)
	{

		if(!$request->input('color') || !$request->input('cilindraje') ||
			!$request->input('potencia') || !$request->input('peso')){

			return response()->json(['mensaje' => 'Complete los datos ...' , 'codigo' => 422], 422);
			//return "Complete todos los datos";
		}

		$fabricante = Fabricante::find($id);

		if(!$fabricante){
			return response()->json(['mensaje' => 'No se encuentra el fabricante con id: '.$id, 'codigo' => 422],422);
		}

		$fabricante->vehiculos()->create($request->all());
		return response()->json(['mensaje' => 'Vehiculo insertado', 'codigo' => 201],201);
	}

	public function update(Request $request, $idFabricante, $idVehiculo)
	{
        /*
         * As� como esta nuestra estructura se podr�a actualizar el veh�culo de "frente",
         * pero si buscamos robustez deber�amos acceder de la siguiente manera, buscando
         * al fabricante y luego a sus vehiculos, con el metodo find accedemos a un
         * veh�culo en particular.
         */
		$metodo = $request->method();
		$fabricante = Fabricante::find($idFabricante);

		if(!$fabricante){
			return response()->json(['mensaje' => 'No se encuentra este fabricante', 'codigo' => 404],404);
		}
		//Si llegamos ac�, es porque fabricante si existe
		$vehiculo = $fabricante->vehiculos()->find($idVehiculo);

		if(!$vehiculo){
            return response()->json(['mensaje' => 'No se encuentra este vehiculo asociado al fabricante', 'codigo' => 404], 404);
        }

        $color = $request->input('color');
        $cilindraje = $request->input('cilindraje');
        $potencia = $request->input('potencia');
        $peso = $request->input('peso');
        $bandera = false; //Para controlar que el usuario haya ingresado al menos uno de los atributos

        if($metodo === 'PATCH'){

           if($color != null || $color != ''){
               $vehiculo->color = $color;
               $bandera = true;
           }

           if($cilindraje != null || $cilindraje != ''){
                $vehiculo->cilindraje = $cilindraje;
               $bandera = true;
            }

           if($potencia != null || $potencia != ''){
               $vehiculo->potencia = $potencia;
               $bandera = true;
           }

            if($peso != null || $peso != ''){
                $vehiculo->peso = $peso;
                $bandera = true;
            }

            if($bandera == true){ // Es lo mismo poner if($bandera)
                $vehiculo->save();
                return response()->json(['mensaje' => 'Vehiculo actualizado', 'codigo' => 200], 200);
            }else{
                return response()->json(['mensaje' => 'No se modifico ningun vehiculo', 'codigo' => 200], 200);
            }

        }else{ //Es porque usa el m�todo 'PUT'
            if(!$color || !$cilindraje || !$potencia || !$peso){
                return response()->json(['mensaje' => 'No se pudieron procesar los valores', 'codigo' => 422],422);
            }else{
                $vehiculo->color = $color;
                $vehiculo->cilindraje = $cilindraje;
                $vehiculo->potencia = $potencia;
                $vehiculo->peso = $peso;

                $vehiculo->save();
                return response()->json(['mensaje' => 'Se actualizo el vehiculo', 'codigo' => 200], 200);
            }
        }
	}


	public function destroy($idFabricante, $idVehiculo)
	{
		//Comentado
	}

}










