@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire de modification des medecins</div>
                   
                <div class="card-body">


                       <form action= "{{ route('update') }}"  method="POST">
                           @csrf
                               <div class="form-group">
                                     <label for="nom" class="control-label">id</label>
                                    <input type="text" readonly="true" class="form-control" id="id" required="required" name="id" value="{{$medecin->id}}">
                                </div>
                                <div class="form-group">
                                     <label for="nom" class="control-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" required="required" name="nom"value="{{$medecin->nom}}">
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="control-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" required="required" name="prenom" value="{{$medecin->prenom}}">
                                </div>
                                 <div class="form-group">
                                    <label for="telephone" class="control-label">telephone</label>
                                    <input type="text" class="form-control" id="telephone" required="required" name="telephone" value="{{$medecin->telephone}}">
                                </div>
    
                                <div>
                                    <a href = "" type="submit" class="btn btn-danger">Annuler</a>
                                    <input type="submit" value="Ajouter" class="btn btn-primary" />	
                                </div>
                            </form>		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
