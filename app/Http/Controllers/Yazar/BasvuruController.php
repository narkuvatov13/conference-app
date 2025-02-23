<?php

namespace App\Http\Controllers\Yazar;

use App\Http\Controllers\Controller;
use App\Models\Konferans;
use App\Models\User;
use App\Models\Yazilarim;
use Illuminate\Http\Request;

class BasvuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $konferans = Konferans::findOrFail($id);
        $yonetici_admin='yok';
        $users = User::all();
        foreach($users as $user){
            if($konferans->id == $user->konferans_id){
                $yonetici_admin=$user;
            }
        }
        if($yonetici_admin == 'yok'){
            session()->flash('konferans-starting','Konferans başvuruları daha başlamadı');
            return view('konferans_show',compact('konferans'));
        }
        //return dd($yonetici);
        return view('yazar_admin.yazilarim.olustur',compact('yonetici_admin'));
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
