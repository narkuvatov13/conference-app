<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konferans;
use Illuminate\Http\Request;

class KonferansController extends Controller
{
    public function index(){
            $konferanslar =Konferans::all();
            return view('admin.konferans.konferans_listele',compact('konferanslar'));
    }

    public function show(Konferans $konferans){

    }
                                    //create
    public function create(){
        return view('admin.konferans.konferans_olustur');
    }
                                    //edit
    public function edit($id){
        $konferans =Konferans::findOrFail($id);
        return view('admin.konferans.konferans_duzenle',compact('konferans'));
    }
                                    //update
    public function update($id){
        $konferans = Konferans::findOrFail($id);
        $inputs =request()->validate([
            'konferans_baslik' =>'required|min:3|max:255',
            'konferans_img' => 'file',
            'konferans_kategori' =>'required|min:2|max:255',
            'konferans_date' => 'required',
            'konferans_zaman' => 'required',
            'konferans_turu' => 'required',
            'konferans_adres' => 'required',
            'konferans_icerik' => 'required',
            'konferans_taglar' => 'required',
            'konferans_email' => 'required',
            'konferans_tel' => 'required',
        ]);
        //return dd($inputs);
        if(request('konferans_img')){
            $inputs['konferans_img']=request('konferans_img')->store('images');
            $konferans->konferans_img=$inputs['konferans_img'];
        }

        $konferans->konferans_baslik =$inputs['konferans_baslik'];
        $konferans->konferans_kategori = $inputs['konferans_kategori'];



                             //Tarih ve zaman Format
        //konferans_tarih = 29 March 2022
        $konferansTarih=$inputs['konferans_date'];
        $konferans->konferans_tarih=$konferansTarih;

        $inputs['konferans_date']=$this->tarih($inputs['konferans_date']);
        $konferans->konferans_date =  $inputs['konferans_date'];
                                //Tarih Formati Son

        $konferans->konferans_zaman = $inputs['konferans_zaman'];
        $konferans->konferans_turu = $inputs['konferans_turu'];
        $konferans->konferans_adres = $inputs['konferans_adres'];
        $konferans->konferans_icerik = $inputs['konferans_icerik'];
        $konferans->konferans_taglar = $inputs['konferans_taglar'];
        $konferans->konferans_email  = $inputs['konferans_email'];
        $konferans->konferans_tel   = $inputs['konferans_tel'];
        $konferans->save();
        session()->flash('message-konferans-update','Konferans Basariyla Guncellendi');
        return redirect()->route('konferans.index');
    }


                                            //Store
    public function store(){
        $inputs = request()->validate([
            'konferans_baslik' =>'required|min:3|max:255',
            'konferans_img'=>'file',
            'konferans_kategori' =>'required|min:2|max:255',
            'konferans_date' =>'required',
            'konferans_zaman' =>'required',
            'konferans_turu' =>'required',
            'konferans_adres' =>'required',
            'konferans_icerik' =>'required',
            'konferans_taglar' =>'required',
            'konferans_email' =>'required',
            'konferans_tel' =>'required',
        ]);
        if(request('konferans_img')){
            $inputs['konferans_img'] =request('konferans_img')->store('images');
        }
       //Tarih ve zaman Format
        $konferansTarih=$inputs['konferans_date'];
        $inputs['konferans_date']=$this->tarih($inputs['konferans_date']);

        //icerik kisminin <br> leri kaldirdik
        $inputs['konferans_icerik']=strip_tags($inputs['konferans_icerik']);
        $text_description=$inputs['konferans_icerik'];
        $text_description= str_replace("&nbsp;"," ",$text_description);
        $text_description = preg_replace("/&#?[a-z0-9]+;/i"," ",$text_description);
        $text_description=html_entity_decode($text_description);
        $inputs['konferans_icerik']=$text_description;



       // return dd($inputs);
       auth()->user()->konferanslar()->create([
                'konferans_baslik'=>$inputs['konferans_baslik'],
                'konferans_img'=>$inputs['konferans_img'],
                'konferans_kategori'=>$inputs['konferans_kategori'],
                'konferans_date'=>$inputs['konferans_date'],
                'konferans_zaman'=>$inputs['konferans_zaman'],
                'konferans_turu'=>$inputs['konferans_turu'],
                'konferans_adres'=>$inputs['konferans_adres'],
                'konferans_icerik'=>$inputs['konferans_icerik'],
                'konferans_taglar'=>$inputs['konferans_taglar'],
                'konferans_email'=>$inputs['konferans_email'],
                'konferans_tel'=>$inputs['konferans_tel'],
                'konferans_tarih'=>$konferansTarih,

        ]);
        session()->flash('message-konferans-store','Konferans-Basariyla-Olusturuldu');
        return redirect()->route('home');
    }
                                                //Destroy


    public function destroy($id,Request $request){
        $konferans =Konferans::findOrFail($id);
        $konferans->delete();
        $request->session()->flash('message-konferans-delete','Konferans Basariyla Silindi');
        return back();
    }





















    public function tarih($tarihAy)
    {
        $dizi = explode(' ', $tarihAy);
        //$gun = $dizi[0];
        $ay = $dizi[1];
        //$yil = $dizi[2];
        switch ($ay) {
            case 'January':
                $ay = 1;
                break;
            case 'February':
                $ay = 2;
                break;
            case 'March':
                $ay = 3;
                break;
            case 'April':
                $ay = 4;
                break;
            case 'May':
                $ay = 5;
                break;
            case 'June':
                $ay = 6;
                break;
            case 'July':
                $ay = 7;
                break;
            case 'August':
                $ay = 8;
                break;
            case 'September':
                $ay = 9;
                break;
            case 'October':
                $ay = 10;
                break;
            case 'November':
                $ay = 11;
                break;
            case 'December':
                $ay = 12;
                break;
        }
        $dizi[1] = $ay;
        $tarih = implode('-', $dizi);
        return date("Y-m-d", strtotime($tarih));
    }

}
