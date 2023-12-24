@extends('layouts.default')


@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">PRODUITS</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('produits.index') }}"><i class="bx bx-grid-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nouveau Produit</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('produits.index') }}" type="button" class="btn btn-primary">RETOURNER</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Ajouter un nouveau produit</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        {{-- Pour mieux faire, ajouter une méthode blade et mettre csrf pour la sécurité du formulaire --}}
                        <form class="row g-3" method="POST" action="{{ route('produits.store') }}"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Designation</label>
                                        <input type="text" class="form-control" id="inputProductTitle"
                                            placeholder="Entrez un nom du produit" name="nom_produit">
                                        @error('nom_produit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="inputProductDescription" name="description_produit" rows="3"></textarea>
                                        @error('description_produit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="fabrication" class="form-label">Date de fabrication</label>
                                            <input type="date" class="form-control" name="date_fabrication_produit"
                                                id="fabrication" placeholder="00.00">
                                            @error('date_fabrication_produit')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="expiry" class="form-label">Date d'expiration</label>
                                            <input type="date" class="form-control" name="date_expiration_produit"
                                                id="expiry">
                                            @error('date_expiration_produit')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="inputPrice" class="form-label">Price</label>
                                            <input type="text" class="form-control" name="prix" id="inputPrice"
                                                placeholder="00.00">
                                            @error('prix')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="disponibilite" class="form-label">Disponibilité</label>
                                            <select name="disponibilite" class="form-control" id="disponibilite">
                                                <option value="0" class="form-control" selected>Non disponible</option>
                                                <option value="1" class="form-control">Disponible</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 form-group">
                                        <label for="image-uploadify" class="form-label">Image du produit</label>
                                        <input id="fancy-file-upload" type="file" multiple="" class="form-control "
                                            name="image_produit"
                                            accept=".jpg, .png, .svg, gif, image/jpeg, image/gif, image/svg, image/png">
                                        @error('image_produit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!--end row-->
                </div>
                <div class="col-md-6 mt-3 mb-4">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div><!--end row-->
    </div>
    </div>
    </div>
@endsection
