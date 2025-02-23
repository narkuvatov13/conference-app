<?php

namespace App\Http\Controllers\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\Konferans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HakemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('konferans_admin.hakem.konferans_hakem_listele',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('konferans_admin.hakem.konferans_hakem_ekle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs =$request->validate([
            'name'=>'required', 'string', 'max:255',
            'user_img'=>'file',
            'dogum_tarih'=>'required',
            'unvan'=>'required',
            'universite'=>'required',
            'alani'=>'required',
            'password'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
        $role_id=3;
        if($request->user_img){
            $inputs['user_img'] = $request->user_img->store('images');
        }

        if(strlen($request->phone) != 10){
            session()->flash('message-phone','Lutfen telefon numaraniz 10 haneli giriniz');
            return back();
        }
        $konferans = auth()->user()->konferans;
        //$id=$konferans->user_id;
        $users = User::all();
        $hakem='yok';
        foreach ($users as $user) {
            if($user->email == $inputs['email']){
                $hakemId=$user->id;
                $hakem='var';
                break;
            }
        }
        if($hakem == 'yok'){
            $newHakem = User::create([
                'name'=>$inputs['name'],
                'user_img'=>$inputs['user_img'],
                'dogum_tarih'=>$inputs['dogum_tarih'],
                'unvan'=>$inputs['unvan'],
                'universitesi'=>$inputs['universite'],
                'alani'=>$inputs['alani'],
                'password' => Hash::make($inputs['password']),
                'email'=>$inputs['email'],
                'phone'=>$inputs['phone'],
                'role_id'=>$role_id,
            ]);
            $konferans->hakemYoneticUsers()->save($newHakem);
        }elseif($hakem == 'var'){
            $oldHakem = User::findOrFail($hakemId);
            foreach ($oldHakem->hakemYoneticKonferans as $konferanss) {
                foreach ($konferans->hakemYoneticUsers as $hakems){
                    if($hakems->id == $oldHakem->id && $konferanss->id == $konferans->id ){
                        session()->flash('message-hakem-has-store','Bu hakem zaten bu konferansa atanmisdir');
                        return redirect()->route('hakem.index');
                    }
                }
            }
            $konferans->hakemYoneticUsers()->save($oldHakem);
        }
        session()->flash('message-hakem-store','Hakem Basariyla Olusturuldu Ve Atandi');
        return redirect()->route('hakem.index');
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
        $user = User::findOrFail($id);
        return view('konferans_admin.hakem.konferans_hakem_guncelle',compact(['user']));
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
        $user =User::findOrFail($id);

        $inputs =$request->validate([
            'name'=>'required',
            'user_img'=>'file',
            'dogum_tarih'=>'required',
            'unvan'=>'required',
            'universite'=>'required',
            'alani'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
        //return dd($inputs);
        //img check
        if($request->user_img){
            $inputs['user_img'] = $request->user_img->store('images');
            $user->user_img = $inputs['user_img'];
        }

        if($request->password != null) {
            $user->password = Hash::make($inputs['password']);
        }

        $user->name = $inputs['name'];
        $user->dogum_tarih = $inputs['dogum_tarih'];
        $user->unvan = $inputs['unvan'];
        $user->universitesi = $inputs['universite'];
        $user->alani = $inputs['alani'];
        $user->email = $inputs['email'];
        $user->phone = $inputs['phone'];
        $user->save();
        session()->flash('message-hakem-update',$user->name . ' > Hakem Basariyla Guncellendi');
        return redirect()->route('hakem.index');
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
        if($user->silindiMi == 0){
            $user->silindiMi = 1;
        }

        $user->save();
        session()->flash('message-hakem-delete',$user->name . ' > Hakem Basariyla Silindi');
        return redirect()->route('hakem.index');    }
}
