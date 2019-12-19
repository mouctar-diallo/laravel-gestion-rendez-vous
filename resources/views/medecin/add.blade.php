@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'enregistrement des medecins</div>
                   
                <div class="card-body">
                @if(isset($confirmation))
                        @if($confirmation==1)
                            <h3 class="alert alert-success">medecin ajouté avec succes</h3>
                        @else
                            <h3 class="alert alert-danger">medecin non ajouté</h3>
                        @endif
                @endif
                       <form action= "{{ route('persistmedecin') }}"  method="POST">
                           @csrf
                                <div class="form-group">
                                     <label for="nom" class="control-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" required="required" name="nom" placeholder = "Entrez le nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom" class="control-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" required="required" name="prenom" placeholder = "Entrez le prénom">
                                </div>
                                 <div class="form-group">
                                    <label for="telephone" class="control-label">telephone</label>
                                    <input type="text" class="form-control" id="telephone" required="required" name="telephone" placeholder = "Entrez le prénom">
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
