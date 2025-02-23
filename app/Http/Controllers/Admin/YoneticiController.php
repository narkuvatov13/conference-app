<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class YoneticiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users= User::all();
       return view('admin.yonetici.konferans_yonetici_listele',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.yonetici.konferans_yonetici_ekle');
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
           'name'=>'required',
           'user_img'=>'file',
           'dogum_tarih'=>'required',
           'unvan'=>'required',
           'fakulte'=>'required',
           'alani'=>'required',
           'password'=>'required',
           'email'=>'required',
           'phone'=>'required',
        ]);
        $role_id=2;

        if($request->user_img){
            $inputs['user_img'] = $request->user_img->store('images');
        }

        if(strlen($request->phone) != 10){
            session()->flash('message-phone','Lutfen telefon numaraniz 10 haneli giriniz');
            return back();
        }
        //return dd($inputs);
        User::create([
            'name'=>$inputs['name'],
            'user_img'=>$inputs['user_img'],
            'dogum_tarih'=>$inputs['dogum_tarih'],
            'unvan'=>$inputs['unvan'],
            'fakulte'=>$inputs['fakulte'],
            'alani'=>$inputs['alani'],
            'password' => Hash::make($inputs['password']),
            'email'=>$inputs['email'],
            'phone'=>$inputs['phone'],
            'role_id'=>$role_id,
        ]);
        session()->flash('message-yonetici-store','Yonetici Basariyla Olusturuldu');
        return redirect()->route('yonetici.index');
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
        return view('admin.yonetici.konferans_yonetici_duzenle',compact(['user']));
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
            'name'=>'required','string','max:255',
            'user_img'=>'file',
            'dogum_tarih'=>'required',
            'unvan'=>'required',
            'fakulte'=>'required',
            'alani'=>'required',
            'password'=>'min:0|max:255',
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
        $user->fakulte = $inputs['fakulte'];
        $user->alani = $inputs['alani'];
        $user->email = $inputs['email'];
        $user->phone = $inputs['phone'];
        $user->save();
        session()->flash('message-yonetici-update',$user->name . ' > Yoneticisi Basariyla Guncellendi');
        return redirect()->route('yonetici.index');
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
        session()->flash('message-yonetici-delete',$user->name . ' > Yonetici Basariyla Silindi');
        return redirect()->route('yonetici.index');
    }
}
