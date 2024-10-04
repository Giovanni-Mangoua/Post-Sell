<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

/**
 * @Developper : Mangoua Giovanni
*/

class AdminController extends Controller
{
    public function index(){
        //dd($this->funAPI('list/vendeurs')['data']);

        $today = Carbon::now();
        $today->format('Y-m-d');
        $today->addDay();

        return view('admin.page',[
            'nbVend' => $this->funAPI('nbs/vendeurs')['nbVend'],
            'nbCommand' => $this->funAPI('nbs/commandes')['nbCommande'],
            'nbPost' => $this->funAPI('nbs/posts')['nbPost'],
            'listeFour' => $this->funAPI('list/vendsquator')['listVendQuat'],
            'listVend' => $this->funAPI('list/vendeurs')['data'],
            'date' => $today
        ]);
    }

    public function verify(LoginFormRequest $req){
        $credentials = $req->validated();
        //si tout est valide
        if (Auth::attempt($credentials)) {
           $req->session()->regenerate();
           //on le redirige vers la page admin
           return redirect()->intended(route('vue.admin'));
        }
        //si non
        return to_route('login')->with('error','Ce compte n\'existe pas.');
    }

    public function connecting(){
        return view('admin.login');
    }

    public function doLogout(){
        Auth::logout();
        return to_route('vue.admin');
    }

    public function funAPI(string $chaine){
        $curl_options = array(
            CURLOPT_URL => "http://localhost:8000/$chaine",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 5
        );
                        
        $curl = curl_init();
        curl_setopt_array( $curl, $curl_options );
        $result = curl_exec( $curl );
                        
        $result = (array) json_decode($result);

        return $result;
    }

    public function listing(Request $req){
        $n = (int) $req->id;
        //dd($this->funAPI('list/post/vendeurs/'.$n)['postVend']);

        /*foreach ($this->funAPI('list/post/vendeurs/'.$n)['postVend'] as $key => $value) {
            dd($value->id);
        }*/

        return view('admin.liste',[
            'liste' => $this->funAPI('list/post/vendeurs/'.$n)['postVend']
        ]);
    }

}
