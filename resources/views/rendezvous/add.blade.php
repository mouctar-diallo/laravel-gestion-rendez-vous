@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'enregistrement des rendez-vous</div>
                   
                <div class="card-body">
                @if(isset($confirmation))
                        @if($confirmation==1)
                            <h3 class="alert alert-success">rendez-vous ajouté avec succes</h3>
                        @else
                            <h3 class="alert alert-danger">rendez-vous non ajouté</h3>
                        @endif
                @endif
                       <form action= "{{ route('persistrendezvous') }}"  method="POST">
                           @csrf
                                <div class="form-group">
                                     <label for="libelle" class="control-label">libelle</label>
                                    <input type="text" class="form-control" id="libelle" required="required" name="libelle" placeholder = "Entrez le libelle">
                                </div>
                                <div class="form-group">
                                    <label for="date" class="control-label">date</label>
                                    <input type="date" class="form-control" id="date" required="required" name="date">
                                </div>
                                
                                <div class="form-group">
                                    <label  class="control-label" for="medecins_id">medecin</label>
                                    <select  class="form-control" id="medecins_id" required="required" name="medecins_id">
                                        <option value="0">choisissez un medecin</option>
                                        @foreach ($medecins as $medecin)
                                            <option value="{{ $medecin->id }}">{{ $medecin->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <a href = "{{ route('addrendezvous') }}" type="submit" class="btn btn-danger">Annuler</a>
                                    <input type="submit" value="Ajouter" class="btn btn-primary" />	
                                </div>
                            </form>		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
