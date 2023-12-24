@extends('layouts.default')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">PRODUITS</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('produits.index') }}"><i class="bx bx-cart-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">PRODUITS</li>
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

        {{-- CARD VIEW --}}
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    <img src={!! asset('assets/images/products/01.png') !!} class="img-fluid" alt="Erreur de Chargement de l'image">

                    <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                        <div class="col"><img src={!! asset('assets/images/products/12.png') !!} width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                        <div class="col"><img src={!! asset('assets/images/products/11.png') !!} width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                        <div class="col"><img src={!! asset('assets/images/products/14.png') !!} width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                        <div class="col"><img src={!! asset('assets/images/products/15.png') !!} width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title"> {{ $produits->nom_produit }} </h4>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <span class="price h4">$ {{ $produits->prix }} </span>
                                </div>
                            </div>
                            <div class="col">
                                @if ($produits->disponibilite !== 0)
                                    <div class="container bg-success rounded">
                                        <i class="bx bxs-check-circle font-15 text-light"></i>
                                        <a href="" class="text-light"
                                            type="button">Disponible</a>
                                    </div>
                                @else
                                    <div class="container bg-danger rounded">
                                        <i class="bx bx-x-circle font-15 text-light"></i>
                                        <a href="" class="text-light"
                                            type="button">Non disponible</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <h5 class="top-0 fw-bold mt-0">Description</h5>
                        <p class="card-text fs-6">
                            {{ $produits->description_produit }}
                        </p>
                        <hr>

                        {{-- BOUTON D'ACTION --}}
                        <div class="d-flex gap-3 mt-3">
                            {{-- SUPPRIMER --}}
                            <div class="btn btn-primary">
                                <form action="{{ route('produits.destroy', $produits->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="" data-bs-target="#exampleModal" data-bs-toggle="modal" type="button">
                                        <span class="text" style="color: white">Supprimer</span>
                                        <i class='bx bxs-trash' style="color: red"></i>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        Suppression du produit
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                {{-- Je redéfinis les couleur pour rendre le texte visible et supprimer l'influence du div principal --}}
                                                <div class="modal-body" style="color: black">
                                                    Voulez vous supprimer le produit
                                                    <strong>{{ $produits->nom_produit }}</strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulez</button>
                                                    <button type="submit" class="btn btn-primary">Supprimer </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </form>
                            </div>
                            {{-- MODIFIER --}}
                            <a href="{{ route('produits.edit', $produits->id) }}" class="btn btn-outline-primary">
                                <span class="text">Modifier</span>
                                <i class='bx bxs-edit'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

    </div>
@endsection
