@extends('layouts.default')


@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">EMPLOYES</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('employes.index') }}"><i class="bx bxs-user"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nouvel Employé</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="col-12 col-xl-6">
            <h6 class="mb-0 text-uppercase">Ajouter nouvel employé</h6>
            <hr />
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                        </div>
                        <h5 class="mb-0 text-danger">Information du nouvel employé</h5>
                    </div>
                    <hr>
                    {{-- Pour mieux faire, ajouter une méthode blade et mettre csrf pour la sécurité du formulaire --}}
                    <form class="row g-3" method="POST" action="{{ route('employes.update', $employes->id) }}">
                        @method('PATCH')
                        @csrf
                        {{-- Il est préférable de nommer les champs du formulaire comme les colonnes de la base de données --}}
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-user'></i></span>
                                <input name="nom_employe" type="text" class="form-control border-start-0" id="nom"
                                    placeholder="LeSobre" value="{{ $employes->nom_employe }}"/>
                            </div>
                            @error('nom_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='bx bxs-user'></i></span>
                                <input name="prenom_employe" type="text" class="form-control border-start-0"
                                    id="prenom" placeholder="Franck" value="{{ $employes->prenom_employe }}"/>
                                @error('prenom_employe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputPhoneNo" class="form-label">Ville</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='lni lni-world'></i></span>
                                <input type="text" class="form-control border-start-0" id="inputPhoneNo"
                                    placeholder="Kinshasa" name="ville_employe" value="{{ $employes->ville_employe }}"/>
                            </div>
                            @error('ville_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="inputPhoneNo" class="form-label">Code Postal</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='lni lni-postcard'></i></span>
                                <input type="number" class="form-control border-start-0" id="inputPhoneNo"
                                    placeholder="10092" name="codepostal_employe" value="{{ $employes->codepostal_employe }}"/>
                            </div>
                            @error('codepostal_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputPhoneNo" class="form-label">Phone No</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='lni lni-phone'></i></span>
                                <input type="tel" class="form-control border-start-0" id="inputPhoneNo"
                                    placeholder="Phone No" name="telephone_employe" value="{{ $employes->telephone_employe }}" />
                            </div>
                            @error('telephone_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputAddress3" class="form-label">Addresse</label>
                            <textarea name="adresse_employe" class="form-control" id="inputAddress3" placeholder="Enter Address" rows="3"
                                style="height: 17px;"> {{ $employes->adresse_employe }} </textarea>
                            @error('adresse_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputPhoneNo" class="form-label">Poste</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='lni lni-network'></i></span>
                                <input type="text" class="form-control border-start-0" id="inputPhoneNo"
                                    placeholder="Manager" name="poste_employe" value="{{ $employes->poste_employe }}"/>
                            </div>
                            @error('poste_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputPhoneNo" class="form-label">Salaire</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                        class='lni lni-revenue'></i></span>
                                <input type="number" class="form-control border-start-0" id="inputPhoneNo"
                                    placeholder="100.000" name="salaire_employe" value="{{ $employes->salaire_employe }}"/>
                            </div>
                            @error('salaire_employe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-danger px-5">Enregistrer</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection