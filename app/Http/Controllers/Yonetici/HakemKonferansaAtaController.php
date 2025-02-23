<?php

namespace App\Http\Controllers\Yonetici;

use App\Http\Controllers\Controller;
use App\Models\Konferans;
use App\Models\User;
use Illuminate\Http\Request;

class HakemKonferansaAtaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::all();
        $konferanslar = Konferans::with(['user','hakemYoneticUsers'])->get();
        $isHakem='';
        return view('admin.hakem.konferans_hakem_ata',compact('konferanslar','users','isHakem'));
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
    public function store(Request $request ,$id)
    {
        $user_id = $request->validate([
            'user_id'=>'required'
        ]);
            //$user=User::findOrFail($user_id);
            $konferans=Konferans::findOrFail($id);
            /*if($user->atandiMi == 0){
            $user->atandiMi=1;
            $konferans->hakemYoneticUsers()->save($user);
             }*/
            //return dd($konferans);


        return dd($konferans);

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
       $inputs = $request->validate([
            'user_id'=>'required',
            'secret'=>'required'
        ]);
        /*if($request->secret == 'cikar'){
            $konferans =Konferans::findOrFail($id);
            foreach ($inputs as $input){
                $users = User::findOrFail($input);
                foreach($users as $user){
                    if($user->atandiMi == 1){
                        $user->atandiMi = 1;
                        $konferans->hakemYoneticUsers()->save($user);
                    }
                    // return dd($user);
                }
                $konferans->hakemYoneticUsers()->detach($user);
                return redirect()->route('hakemKonferansaAta.index');
            }
        }
*/

            $konferans =Konferans::findOrFail($id);
            foreach ($inputs as $input){
                $users = User::findOrFail($input);
                /*if($user->atandiMi == 0){
                    $user->toQuery()->update([
                        'atandiMi'=>1,
                    ]);
                    $konferans->hakemYoneticUsers()->attach($user);
                }*/

                    foreach($users as $user){
                        if($user->atandiMi == 0){
                            $user->atandiMi=1;
                            $konferans->hakemYoneticUsers()->save($user);
                        }
                       // return dd($user);
                    }

                return redirect()->route('hakemKonferansaAta.index');
            }

        //return dd($inputs);
        return redirect()->route('hakemKonferansaAta.index');

    }
    /*
    public function update(Request $request, $id)
    {
        $inputs = $request->validate([
            'user_id'=>'required',
            'secret'=>'required'
        ]);
        if($request->secret == 'cikar'){
            $konferans =Konferans::findOrFail($id);
            foreach ($inputs as $input){
                $user = User::findOrFail($input);
                $user->toQuery()->update([
                    'atandiMi'=>0,
                ]);
                $konferans->hakemYoneticUsers()->detach($user);
                return redirect()->route('hakemKonferansaAta.index');
            }
        }


        if($request->secret == 'ata'){
            $konferans =Konferans::findOrFail($id);
            foreach ($inputs as $input){
                $user = User::findOrFail($input);

                $user->toQuery()->update([
                    'atandiMi'=>1,
                ]);
                $konferans->hakemYoneticUsers()->attach($user);
                //return dd($user);
                return redirect()->route('hakemKonferansaAta.index');
            }
        }

        //return dd($inputs);
        return redirect()->route('hakemKonferansaAta.index');
    }
    */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $inputs = request()->validate([
            'user_id'=>'required'
        ]);*/
        $konferans=Konferans::findOrFail($id);
        return dd($konferans);
    }
}
