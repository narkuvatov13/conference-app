<?php

namespace App\Http\Controllers\Hakem;

use App\Http\Controllers\Controller;
use App\Models\Yazilarim;
use Illuminate\Http\Request;

class GelenYazilarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yazilarim=auth()->user()->hakem_yazar;
        //return dd($yazilarim);
        return view('hakem_admin.yazilar.yazi_listele',compact('yazilarim'));
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
        $yazi=Yazilarim::findOrFail($id);
        //return dd($yazi);
        return view('hakem_admin.yazilar.detayli-bak',compact('yazi'));
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
        $yazi =Yazilarim::findOrFail($id);
        //return dd($yazi);
        if($request->input('onaylandi')){
            $yazi->onay_durum ='Onaylandi';
        }
        if($request->input('rededildi')){
            $yazi->onay_durum ='Reddedildi';
        }
        if($request->input('yorum')){
            $yazi->hakem_yorum =$request->input('yorum');
        }
        $yazi->save();
        return redirect()->route('hakem-admin_gelen-yazilar.index');

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
