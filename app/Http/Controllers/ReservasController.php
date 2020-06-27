<?php

namespace App\Http\Controllers;
use App\Reservas;
use App\Duenios;
use App\Animales;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('create','store');
    }
    
    public function index(Request $request)
    {
        //
        $request->user()->authorizeRoles(['admin','user']);
        return view('reservas.index',[
            'reservas' => Reservas::paginate(5)
        ]);
    }
    public function search(Request $request)
    {
        return view('reservas.index',[
            'reservas'=>Reservas::name($request->get('date'))->paginate()
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin','user']);
        return view('reservas.create', [
            'reservas' => new Reservas(),
            'animales'=>Animales::get(),
            'duenios'=>Duenios::get()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                
                'phone'=>'required',
                'date'=>'required'
                
            ]
        );
        Reservas::create(request()->all());
        return redirect('reservas')->with('status','Se Registro correctamente');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('reservas.show', [
            'reserva' => Reservas::findOrfail($id),
            'duenio' => Duenios::findOrfail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);

        $reservas=Reservas::FindOrFail($id);    
        $animales=Animales::select('id','name')
        ->orderBy('name')->get();
        $duenios=Duenios::select('id','name')
        ->orderBy('name')->get();
        return view('reservas.edit')
        ->with('reservas',$reservas)
        ->with('animales',$animales)
        ->with('duenios',$duenios);
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
        $datos=$request->all();
        $reservas=Reservas::findOrFail($id);
        $reservas->update($datos);
        
        return redirect('reservas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        Reservas::destroy($id);
        return redirect('reservas')->with('status', 'La reserva se elimino correctamente');
    }
}
