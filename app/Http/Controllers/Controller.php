<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $user = auth()->user();
        if($user->role_id == 1){
            return redirect()->route('admin.index');
        }else if($user->role_id == 2){
            return redirect()->route('konferans_admin');
        }else if($user->role_id == 3){
            return redirect()->route('hakem_admin');
        }

        return redirect()->route('yazar_admin');
    }
}
