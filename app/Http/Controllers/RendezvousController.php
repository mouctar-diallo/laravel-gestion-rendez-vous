<?php

namespace App\Http\Controllers;

use App\Medecin;
use App\Rendezvous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller
{
   public function add()
    {
       //gestion cle etrangere, lors de add rendez vous renvoyons la liste des medecins
       $medecins = Medecin::all();

       return view('rendezvous.add', ['medecins'=>$medecins]); 
    }
    public function listAll()
    {
      
      $listrendezvous = Rendezvous::all();
       //pagination en laravel
       $listrendezvous = Rendezvous::paginate(3);
       
       return view('rendezvous.listAll', ['listrendezvous'=>$listrendezvous]); 
    }

    public function edit($id)
    {
       //recuperation de la ligne a modifier a partir de la table
       $rendezvous = Rendezvous::find($id);
       //chargement de la liste des medecins dans la combo
       $medecins = Medecin::all();
       return view('rendezvous.edit', ['rendezvous'=>$rendezvous], ['medecins'=>$medecins]); 
    }

    public function update(Request $request)
    {
       
          $this->validate($request,[
         'libelle'=>'required',
         'date'=>'required',
         'medecins_id'=>'required',
        
       ]);

       $rendezvous = Rendezvous::find($request->id);

       $rendezvous->libelle=$request->libelle;
       $rendezvous->date=$request->date;
       $rendezvous->medecins_id=$request->medecins_id;
       $rendezvous->user_id=auth::id();
       
       $rendezvous->save();
       //return $this->listAll();  
       return redirect('/rendezvous/listAll');
    }

    public function delete($id)
    {
       $rendezvous = Rendezvous::find($id);
       if($rendezvous != null)
       {
          $rendezvous->delete();
       }
       return $this->listAll(); 
    }

    public function persist(Request $request)
    {
       $rendezvous = new Rendezvous();
       $rendezvous->libelle=$request->libelle;
       $rendezvous->date=$request->date;
       $rendezvous->medecins_id=$request->medecins_id;
       $rendezvous->user_id=Auth::id();

       $result = $rendezvous->save();

      // return view("rendezvous.add", ['confirmation'=>$result]);
      return $this->add();
    }
}
