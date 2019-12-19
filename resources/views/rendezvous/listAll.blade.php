@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des rendez-vous</div>
                   
                <div class="card-body">

                <table class="table table-striped table-bordered table-hover" id="datatables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>libelle</th>
                                <th>date</th>
                                <th>medecin</th>
                                <th>user</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($listrendezvous as $rendezvous)
                                <tr>
                                <td>{{ $rendezvous->id }}</td>
                                <td>{{ $rendezvous->libelle }}</td>
                                <td>{{ $rendezvous->date }}</td>
                                <td>{{ $rendezvous->medecins_id }}</td>
                                <td>{{ $rendezvous->user_id }}</td>

                                <td>
                                    <a href="{{ route('deleterendezvous',['id'=> $rendezvous->id] )}}" onclick="return confirm('voulez vous supprimez');" class="btn btn-danger btn-circle glyphicon glyphicon-trash" title="supprimer"></a>
                                    <a href="{{ route('editrendezvous' ,['id'=> $rendezvous->id] )}}" class="btn btn-info btn-circle glyphicon glyphicon-pencil" title="modifier"></a>  
                                </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <!-- pagination en laravel-->
                    {{ $listrendezvous->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

