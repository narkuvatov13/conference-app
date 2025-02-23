<?php

namespace App\Http\Controllers\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Yazilarim;
use Illuminate\Http\Request;

class HakemeGonder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        $user=auth()->user();
        $yazilar=$user->yonetici_yazar;
        return view('konferans_admin.yazilarim.hakeme_gonder',compact('yazilar','users'));
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
        $yazi  = Yazilarim::findOrFail($id);
        $yazi->gonderildiMi=1;
        $user_id =$request->input('user_id');
        $user= User::findOrFail($user_id);
        $user->hakem_yazar()->save($yazi);
        //return dd($user->hakem_yazar());
        return redirect()->route('yonetici_yazilarim_onayDurum.index');
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
