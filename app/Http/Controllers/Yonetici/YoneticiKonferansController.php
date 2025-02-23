<?php

namespace App\Http\Controllers\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\Konferans;
use Illuminate\Http\Request;

class YoneticiKonferansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konferans = auth()->user()->konferans;
        return view('konferans_admin.konferans.konferans_aktif_pasif',compact('konferans'));
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
        $konferans = Konferans::findOrFail($id);
        return view('konferans_admin.konferans.konferans_duzenle',compact('konferans'));
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
        $inputs =request()->validate([
            'konferans_baslik' =>'required|min:3|max:255',
            'konferans_img' => 'file',
            'konferans_kategori' =>'required|min:2|max:255',
            'konferans_date' => 'required',
            'konferans_zaman' => 'required',
            'konferans_turu' => 'required',
            'konferans_adres' => 'required',
            'konferans_icerik' => 'required|min:3|max:255',
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
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konferans = Konferans::findOrFail($id);
        if($konferans->silindiMi == 0){
            $konferans->silindiMi=1;
        }elseif($konferans->silindiMi == 1){
            $konferans->silindiMi = 0;
        }
        $konferans->save();
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
