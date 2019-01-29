<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovel;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ImovelController extends Controller
{
    
    protected function validarImovel($request){
        $validator = Validator::make($request->all(),[
            "descricao" => "required",
            "logradouroEndereco" => "required",
            "bairroEndereco" => "required",
            "numeroEndereco" => "required | numeric",
            "cepEndereco" => "required",
            "preco" => "required | numeric",
            "qtdQuartos" => "required | numeric",
            "tipo" => "required",
            "finalidade" => "required"
        ]);
        return $validator;
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ? : 2;
        $page = $request['page'] ? : 1;

        Paginator::currentPageResolver( function () use ($page){
            return $page;
        });

        $imoveis  = DB::table('imoveis')->paginate($qtd);
        $imoveis  = $imoveis->appends(Request::capture()->except('page'));

        return view('imoveis.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
        return view('imoveis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarImovel($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        Imovel::create($dados);
 
        return redirect()->route('imoveis.index');
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
        $imovel = Imovel::find($id);
        
        return view('imoveis.show', compact('imovel'));
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
        $imovel = Imovel::find($id);

        return view('imoveis.edit', compact('imovel'));
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
        $validator = $this->validarImovel($request);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $imovel = Imovel::find($id);
        $dados = $request->all();

        $imovel->update($dados);

        return redirect()->route('imoveis.index');

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
<<<<<<< HEAD
        Imovel::find($id)->delete();
        return redirect()->route('imoveis.index');
=======
>>>>>>> 99ee62b7674909348f4d981b1ad8c152b4db30cb
        
    }

    public function remover($id){

        $imovel = Imovel::find($id);
                
        return view('imoveis.remove', compact('imovel'));

    }
}