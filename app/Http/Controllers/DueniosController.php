<?php

namespace App\Http\Controllers;
use App\Duenios;
use Illuminate\Http\Request;

class DueniosController extends Controller
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
        $request->user()->authorizeRoles(['user', 'admin']);
        return view('duenios.index',[
            'duenios' => Duenios::paginate(5)
        ]);
    }
    public function search(Request $request)
    {
        return view('duenios.index',[
            'duenios'=>Duenios::name($request->get('name'))->paginate()
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $request->user()->authorizeRoles(['user', 'admin']);
        return view('duenios.create', ['duenio' => new Duenios])->with('status','Se guardo Correctamente los Datos');

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
                'ci'=>'required|numeric',
                'name'=>'required',
                'lastname'=>'required',
                'address'=>'required',
                'phone'=>'required|min:7',
                'email'=>'required',
                'genero'=>'required|in:masculino,femenino'
            ],[
                'genero.in'=>'Debe elegir una opcion'
            ]);
            $duenios = new Duenios;

            $duenios->ci = $request->ci;
            $duenios->name = $request->name;
            $duenios->lastname = $request->lastname;
            $duenios->address = $request->address;
            $duenios->phone = $request->phone;
            $duenios->email = $request->email;
            $duenios->genero = $request->genero;
            $duenios->save();

        //Duenios::create(request()->all());
        //return redirect()->route('duenios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('duenios.show', [
            'duenio' => Duenios::findOrfail($id)
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
        $duenio=Duenios::FindOrFail($id);
        return view('duenios.edit', compact('duenio'));
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
        $duenio=request()->except(['_token','_method']);
        Duenios::where('id','=',$id)->update($duenio);

        $duenio=Duenios::FindOrFail($id);
        return view('duenios.show', compact('duenio'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        Duenios::destroy($id);
        return redirect('duenios')->with('status', 'Se elimino el registro del Dueño correctamente');
    }
}
