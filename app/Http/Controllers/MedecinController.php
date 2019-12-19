<?php

namespace App\Http\Controllers;

use App\Medecin;
use Illuminate\Http\Request;

class MedecinController extends Controller
{
    public function add()
    {
       return view('medecin.add'); 
    }
    public function listAll()
    {
      
      $listMedecins = Medecin::all();
       //pagination en laravel
       $listMedecins = Medecin::paginate(2);
       
       return view('medecin.listAll', ['listMedecins'=>$listMedecins]); 
    }

    public function edit($id)
    {
       $medecin = Medecin::find($id);

       return view('medecin.edit', ['medecin'=>$medecin]); 
    }
    public function update(Request $request)
    {
       $medecin = Medecin::find($request->id);

       $medecin->nom=$request->nom;
       $medecin->prenom=$request->prenom;
       $medecin->telephone=$request->telephone;

       $medecin->save();
       //return $this->listAll();  
       return redirect('/medecin/listAll');
    }
    public function delete($id)
    {
       $medecin = Medecin::find($id);
       if($medecin != null)
       {
          $medecin->delete();
       }
       return $this->listAll(); 
    }

    public function persist(Request $request)
    {
       $med = new Medecin();
       $med->nom=$request->nom;
       $med->prenom=$request->prenom;
       $med->telephone=$request->telephone;

       $result = $med->save();

       return view("medecin.add", ['confirmation'=>$result]);
    }

}
