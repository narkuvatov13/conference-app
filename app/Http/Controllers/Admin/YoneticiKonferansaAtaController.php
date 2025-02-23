<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konferans;
use App\Models\KonferansAta;
use App\Models\User;
use Illuminate\Http\Request;

class YoneticiKonferansaAtaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konferanslar = Konferans::all();
        $users = User::all();
        return view('admin.yonetici.konferans_yonetici_ata',compact('konferanslar','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $konferans = Konferans::findOrFail($id);
        $inputs = $request->validate([
            'user_id'=>'required'
        ]);
        if($request->user_id != 'Seçiniz...'){
            $input = $inputs['user_id'];
        }else{
             session()->flash('message-seciniz','Lutfen Konferans Baskani Seciniz');
             return redirect()->route('yoneticiKonferansaAta.index');
        }
        $user = User::findOrFail($input);
       // $user->konferan_id = $input;
        //return dd($user);

        $user->atandiMi=1;
        $konferans->user()->save($user);
        session()->flash('message-konferansAtandi','Konferans Yoneticisi Basariyla Atandi');
        return redirect()->route('yoneticiKonferansaAta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->atandiMi = 0;
        $user->konferans_id = 0;
        session()->flash('message-cikartildi','Konferans Yoneticisi Basariyla Cikartildi') ;
        $user->save();
        return back();
    }
}
