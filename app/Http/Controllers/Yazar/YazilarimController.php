<?php

namespace App\Http\Controllers\Yazar;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Yazilarim;
use Illuminate\Http\Request;
class YazilarimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yazilarim=auth()->user()->yazilarim;
        return view('yazar_admin.yazilarim.listele',compact('yazilarim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yazar_admin.yazilarim.olustur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs=$request->validate([
            'yazar_adSoyad'=>'required',
            'yazar_img'=>'file',
            'yazar_universiteSirket'=>'required',
            'yazar_eposta'=>'required',
            'yazar_telNo'=>'required',
            'yazi_basligi'=>'required',
            'yazi_img'=>'file',
            'yazi_alani'=>'required',
            'yazi_icerik'=>'required',
            'yazi_dosya'=>'file',
            'user_id'=>'required',
        ]);
        //return dd($inputs);
        if(request('yazar_img')){
            $inputs['yazar_img'] = request('yazar_img')->store('images');
        }else{
            $inputs['yazar_img']='Yok';
        }
        if(request('yazi_img')){
            $inputs['yazi_img'] = request('yazi_img')->store('images');
        }else{
            $inputs['yazi_img'] = 'Yok';
        }
        if(request('yazi_dosya')){
            $inputs['yazi_dosya'] = request('yazi_dosya')->store('files');
            $orginalFileName =request('yazi_dosya')->getClientOriginalName();
        }else{
            $inputs['yazi_dosya'] = '';
            $orginalFileName='';
        }
        $yonetici_id = User::findOrFail($inputs['user_id']);

        $yazi=auth()->user()->yazilarim()->create([
            'yazar_adSoyad'=>$inputs['yazar_adSoyad'],
            'yazar_img'=>$inputs['yazar_img'],
            'yazar_universiteSirket'=>$inputs['yazar_universiteSirket'],
            'yazar_eposta'=>$inputs['yazar_eposta'],
            'yazar_telNo'=>$inputs['yazar_telNo'],
            'yazi_basligi'=>$inputs['yazi_basligi'],
            'yazi_img'=>$inputs['yazi_img'],
            'yazi_alani'=>$inputs['yazi_alani'],
            'yazi_icerik'=>$inputs['yazi_icerik'],
            'yazi_dosya'=>$inputs['yazi_dosya'],
            'original_file_name'=>$orginalFileName,
            'user_id'=>$inputs['user_id'],
        ]);
        $yonetici_id->yonetici_yazar()->save($yazi);
        session()->flash('message-yazilarim-create','Basariyla Olusturuldu');
        return redirect()->route('yazar_admin.index');
        //return dd($yazi);
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
        $yazim = Yazilarim::findOrFail($id);
        return view('yazar_admin.yazilarim.duzenle',compact('yazim'));
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
        $yazim = Yazilarim::findOrFail($id);
        $inputs=$request->validate([
            'yazar_adSoyad'=>'required',
            'yazar_img'=>'file',
            'yazar_universiteSirket'=>'required',
            'yazar_eposta'=>'required',
            'yazar_telNo'=>'required',
            'yazi_basligi'=>'required',
            'yazi_img'=>'file',
            'yazi_alani'=>'required',
            'yazi_icerik'=>'required',
            'yazi_dosya'=>'file',
        ]);

        if(request('yazar_img')){
            $inputs['yazar_img'] = request('yazar_img')->store('images');
            $yazim->yazar_img = $inputs['yazar_img'];

        }
        if(request('yazi_img')){
            $inputs['yazi_img'] = request('yazi_img')->store('images');
            $yazim->yazi_img=$inputs['yazi_img'];

        }
        if(request('yazi_dosya')){
            $inputs['yazi_dosya'] = request('yazi_dosya')->store('files');
            $orginalFileName =request('yazi_dosya')->getClientOriginalName();
            $yazim->yazi_dosya=$inputs['yazi_dosya'];
            $yazim->original_file_name=$orginalFileName;
        }
        $yazim->yazar_adSoyad=$inputs['yazar_adSoyad'];
        $yazim->yazar_universiteSirket=$inputs['yazar_universiteSirket'];
        $yazim->yazar_eposta=$inputs['yazar_eposta'];
        $yazim->yazar_telNo=$inputs['yazar_telNo'];
        $yazim->yazi_basligi=$inputs['yazi_basligi'];
        $yazim->yazi_alani=$inputs['yazi_alani'];
        $yazim->yazi_icerik=$inputs['yazi_icerik'];

       $yazim->save();
       session()->flash('message-yazilarim-update','Basariyla Guncellendi');
        //return dd($inputs);
        return redirect()->route('yazar_admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yazim = Yazilarim::findOrFail($id);
        $yazim->silindiMi = 1;
        $yazim->save();
        session()->flash('message-yazilarim-delete','Basariyla Silindi');
        return back();
    }
}
