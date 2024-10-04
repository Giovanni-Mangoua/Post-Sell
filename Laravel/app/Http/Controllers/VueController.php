<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\CreateFormRequest;
use App\Http\Requests\PostFormRequest;

class VueController extends Controller
{

    //posts
    public function posts(){
        $vend = DB::table('posts')->where('user_id','=',Auth::user()->id)->paginate(8);
        $last_for_command = Commande::select('commandes.*')->join('posts','commandes.post_id','=','posts.id')->where('posts.user_id','=',Auth::user()->id)->take(4)->latest()->get();
        $total_clients = Commande::select('commandes.nom_pers')->distinct()->join('posts','commandes.post_id','=','posts.id')->where('posts.user_id','=',Auth::user()->id)->count();
        $total_command = Commande::select('commandes.*')->join('posts','commandes.post_id','=','posts.id')->where('posts.user_id','=',Auth::user()->id)->count();
        $total_article = DB::table('posts')->where('posts.user_id','=',Auth::user()->id)->count();
        $listClient = Commande::select('commandes.id',
        'commandes.nom_pers','commandes.prenom_pers',
        'commandes.email_pers','commandes.phone_pers')->join('posts','commandes.post_id','=','posts.id')->where('posts.user_id','=',Auth::user()->id)->get();
        $listCommand = Commande::select('commandes.*')->join('posts','commandes.post_id','=','posts.id')->where('posts.user_id','=',Auth::user()->id)->get();
        //dd( $listClient );
        return view('posts',[
            'posts' => $vend,
            'lastcommand' => $last_for_command,
            'totalClients' => $total_clients,
            'totalCommand' => $total_command,
            'totalArticle' => $total_article,
            'listClient' => $listClient,
            'listCommand' => $listCommand
        ]);
    }

    //
    public function login(){
        return view('login');
    }

    //
    public function connecting(LoginFormRequest $request){
        $credentials = $request->validated();
        //si tout est valide
        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();
           //on le redirige vers la page admin
           return redirect()->intended(route('dash'));
        }
        //si non
        return to_route('login')->with('error','Ce compte n\'existe pas.');
    }

    //
    public function doLogin(){
        Auth::logout();
        return to_route('dash');
    }

    public function createAccount(){
        return view('welcome');
    }
    
    public function creation(CreateFormRequest $request){
        User::create([
            "name" => $request->nom,
            "prenom" => $request->prenom,
            "email" => $request->mail,
            "password" => Hash::make($request->mot_passe),
        ]);
        return view('login');
    }

    //form add&update
    public function view_add_post(){
        return view('form',[
            'posts' => new Post()
        ]);
    }

    //store post
    public function storing(PostFormRequest $req){
        $name = Storage::disk('public')->put('posts',$req->fichier);
        Post::create([
            "nom" => $req->nom,
            "description" => $req->description,
            "quantite" => $req->quantite,
            "prix" => $req->prix,
            "fichier" => $name,
            "fichier_url" => Storage::url($name),
            "user_id" => $req->id
        ]);
        return to_route('dash');
    }

    //Modify 1
    public function modify_1(Request $request){
        $post = Post::find( (int)$request->id );
        return view('form',[
            'posts' => $post
        ]);
    }

    //Modify 2
    public function update_post(PostFormRequest $request){
        $post = Post::find( (int)$request->id );
        $name = Storage::disk('public')->put('posts',$request->fichier);
        $post->nom = $request->nom;
        $post->description = $request->description;
        $post->prix = $request->prix;
        $post->quantite = $request->quantite;
        $post->fichier = $name;
        $post->fichier_url = Storage::url($name);
        $post->save();
        return to_route('dash');
    }

    //delete post
    public function delete(Request $req){
        $post = Post::find( (int)$req->id );
        $post->delete();
        return to_route('dash');
    }

    //
    public function showing(Request $request){
        return view('show',[
            'res' => DB::table('posts')->where('id',(int) $request->id)->get(),
            'qte' => (int) $request->qte
        ]);
    }

    public function loginVendor(Request $request){
       /* $credentials = $request->validate([
            'mail' => 'required|email',
            'mot_passe' => 'required'
        ]);
        $vendor = Vendeur::all();  */

        //On recupere le vendeur qui a l'email $request->mail
        $vend = DB::table('vendeurs')->where('email',$request->mail)->first();

        //Ensuite si ce vendeur a le password $request->mot_passe
        if (Hash::check($request->mot_passe,$vend->password)) {
            return response()->json([
                'id' => $vend->id
            ]);
        }else {
            return response()->json([
                'error' => 'Impossible de se Login'
            ]);
        }
    }



    //Envoie des posts
    public function envoyer(){
        return Post::all();
    }

    //
    public function sendFile(Request $req){
        $post = DB::table('posts')->where('id',$req->id)->first();
        return response()->json([
            'nom' => $post->nom,
            'qte' => $post->quantite,
            'price' => $post->prix,
            'file' => $post->fichier_url
        ]);
    }

    public function sendCommand(Request $request){
        Commande::create([
            'nom_pers' => $request->nom,
            'prenom_pers' => $request->prenom,
            'email_pers' => $request->email,
            'phone_pers' => $request->phone,
            'quantity' => $request->quantity,
            'post_id' => $request->id
        ]);
    }

    //Recherche effectuer par un utilisateur
    public function recherche(Request $req){
        $vend = DB::table('posts')->where('nom','LIKE','%'.$req->search.'%')->get();
        return response()->json([
            'message' => $vend
        ]);
    }

    /*
        Ours API
    */

    public function comptVend(){
        return response()->json([
            'nbVend' => DB::table('users')->count()
        ]);
    }

    public function comptCommande(){
        return response()->json([
            'nbCommande' => DB::table('commandes')->count()
        ]);
    }

    public function comptPost(){
        return response()->json([
            'nbPost' => DB::table('posts')->count()
        ]);
    }

    public function listingVendeur(){
        return DB::table('users')->paginate(20);
    }

    public function listeVendFour(){
        return response()->json([
            'listVendQuat' => DB::table('users')->take(4)->get()
        ]);
    }

    public function listingPostVend(Request $req){
        return response()->json([
            'postVend' => DB::table('posts')->where('user_id',$req->id)->get()
        ]);
    }

    public function listingPostCommand(Request $req){
        return response()->json([
            'postCommand' => DB::table('commandes')->where('post_id',$req->id)->get()
        ]);
    }
}
