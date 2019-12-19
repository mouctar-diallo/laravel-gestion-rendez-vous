<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    protected $fillable = array('nom','prenom','telephone');
    protected $rules = array('nom'=>'required|min:2',
                             'prenom'=>'required|min:3',
                             'telephone'=>'required|min:5'
                            );

    public function rendezvous()
    {
        return $this->hasMany('App\Rendezvous');
    }
}
