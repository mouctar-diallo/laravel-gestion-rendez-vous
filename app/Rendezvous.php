<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $fillable = array('medecins_id','user_id','libelle','date');
    protected $rules = array('medecin_id'=>'required|integer',
                             'user_id'=>'required|bigInteger',
                             'libelle'=>'required|min:20',
                             'date'=>'required|min:3'
                            );
    
    public function medecins()
    {
        return $this->belongsTo('App\Medecin');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
