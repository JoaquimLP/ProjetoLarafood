<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $planos = Plano::with('detalhes')->orderBy('preco', 'ASC')->get();
        
        return view('site.home.index', compact('planos'));
    }

    public function plano($url){
        $plano = Plano::where('url', $url)->first();

        if(empty($plano)){
            return redirect()->back();
        }
        session()->put('plano', $plano);
        return redirect()->route('register');
    }
}
