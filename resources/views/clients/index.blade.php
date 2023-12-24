@extends('layouts.default')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">CLIENTS</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('clients.create') }}" type="button" class="btn btn-primary">NOUVEAU</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">CLIENTS</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td class="text-uppercase">{{ $client->prenom_client }}</td>
                                    <td class="text-uppercase">{{ $client->nom_client }}</td>
                                    <td class="text-uppercase">{{ $client->adresse_client }}</td>
                                    <td class="text-uppercase">{{ $client->phone_client }}</td>
                                    <td class="text-lowercase">{{ $client->email_client }}</td>
                                    <td>
                                        <div class="d-flex order-actions ">
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="ms-4 text-danger bg-light-primary border-0">
                                                    <button class="bx bxs-trash border-0 bg-light-primary" type="button" style="color: red; border-radius:20%"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
                                                </a>
                                                <!-- Button trigger modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal
                                                                    title</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Voulez vous supprimer le client  <strong>{{ $client->prenom_client }} {{$client->nom_client}} </strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annulez</button>
                                                                <button type="submit"  class="btn btn-primary">Supprimer </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                            </form>

                                            <a href="{{ route('clients.edit', $client->id) }}" class="ms-4 text-primary bg-light-primary border-0">
                                                <i class="bx bxs-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
