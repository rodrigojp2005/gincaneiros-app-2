<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gincana;

class GincanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('teste');
        $gincanas= Gincana::all();
      //  dd($gincanas);
        return view('gincana.index',['gincana'=>$gincanas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gincana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gincana::create($request->all());
        return redirect()->route('gincana.index');

        //Outra opção
        
        //$gincana = new Gincana();
        //$gincana->palavra = $request->palavra;
        //$gincana->dica = $request->dica;
        //$gincana->id_user = $request->id_user;
        //dd($gincana);
        //$gincana->save();
        //return redirect()->route('gincana.index');

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
        $gincana= Gincana::find($id);
       // dd($gincana);
        return view('gincana.show',['gincana'=>$gincana]);
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
    //dd($id);

        $gincana = Gincana::where('id',$id)->first();
        if(!empty($gincana)){
            //dd($gincana);
             return view('gincana.edit',['gincana'=>$gincana]);
        }else{
            return redirect()->route('gincana.index');
        }
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
      //  dd($request->all());
        
        $gincana = Gincana::where('id',$id)->first();
        if(!empty($gincana)){
            $gincana->update($request->all());
            return redirect()->route('gincana.index');
        }else{
            return redirect()->route('gincana.index');
        }

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
        $gincana = Gincana::where('id',$id)->first();
        if(!empty($gincana)){
            $gincana->delete();
            return redirect()->route('gincana.index');
        }else{
            return redirect()->route('gincana.index');
        }
        
    }

  

    public function resposta(Request $request, $id)
    {

        $gincana_form = new Gincana();
        $gincana_form->resposta = $request->resp;
    //    dd('Resposta input: '.$gincana_form->resposta.' Id Gincana: '.$id);
        //$gincana->dica = $request->dica;
        //$gincana->id_user = $request->id_user;
        //dd($gincana);
        //$gincana->save();
        //return redirect()->route('gincana.index');
        //
        $gincana = Gincana::where('id',$id)->first();
      //  dd('Resposta input: '.$gincana_form->resposta.' Id Gincana: '.$id.' Resposta BD: '.$gincana['resposta']);

        //dd("id da gincana:".$id." e a resp.:".$gincana->resposta);
        if($gincana['resposta']== $gincana_form->resposta){
            echo "<script>alert('acertou')</script>";
          //  return redirect()->route('gincana.show',['id'=>$id]);
//            return redirect()->route('gincana.show',['id'=>$id,'resposta'=>'true']);   
           //return true;
        }else{
            echo "<script>alert('errou')</script>";
            //return redirect()->route('gincana.show',['id'=>$id]);
           // echo "errou";
            //return redirect()->route('gincana.show',['id'=>$id,'resposta'=>'false']);
//return false;
        }
    }
}
