@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des medecins</div>
                   
                <div class="card-body">

                <table class="table table-striped table-bordered table-hover" id="datatables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nom</th>
                                <th>prenom</th>
                                <th>telephone</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($listMedecins as $medecins)
                                <tr>
                                <td>{{ $medecins->id }}</td>
                                <td>{{ $medecins->nom }}</td>
                                <td>{{ $medecins->prenom }}</td>
                                <td>{{ $medecins->telephone }}</td>
                                <td>
                                    <a href="{{ route('deleteMedecin',['id'=> $medecins->id] )}}" onclick="return confirm('voulez vous supprimez');" class="btn btn-danger btn-circle glyphicon glyphicon-trash" title="supprimer"></a>
                                    <a href="{{ route('editMedecin' ,['id'=> $medecins->id] )}}" class="btn btn-info btn-circle glyphicon glyphicon-pencil" title="modifier"></a>  
                                </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <!-- pagination en laravel-->
                    {{ $listMedecins->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

