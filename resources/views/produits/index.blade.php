@extends('layouts.default')

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">PRODUITS</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">PRODUITS</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('produits.create') }}" type="button" class="btn btn-primary">NOUVEAU</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        {{-- CARD VIEW --}}
        <div class="row row-cols-sm-2 row-cols-lg-5 row-cols-xl-4 row-cols-xxl-5 product-grid" title="Voir le détail">
            @foreach ($produits as $produit)
                <div class="col">
                    <div class="card">
                        <div class="card-title top-0 mb-4">
                            <div class="position-absolute top-0 end-0 m-3 fw-bold">
                                <span> {{ "$" }} </span>
                                <span> {{ $produit->prix }}</span>
                            </div>
                            <div class="position-absolute top-0 start-2 m-3 fw-bold">
                                @if ($produit->disponibilite !== 0)
                                    <div class="container bg-success rounded">
                                        <i class="bx bxs-check-circle font-15 text-light"></i>
                                        <a href="{{ route('produits.show', $produit->id) }}" class="text-light"
                                            type="button">Disponible</a>
                                    </div>
                                @else
                                    <div class="container bg-danger rounded">
                                        <i class="bx bx-x-circle font-15 text-light"></i>
                                        <a href="{{ route('produits.show', $produit->id) }}" class="text-light"
                                            type="button">Non disponible</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('produits.show', $produit->id) }}">
                                <img src={!! asset('storage/' . $produit->image_produit) !!} class="card-img-top" alt="Erreur de Chargement de l'image">
                            </a>
                            <a class="fw-bold text-dark" href="{{ route('produits.show', $produit->id) }}">
                                {{ $produit->nom_produit }} </a>
                            <div class="clearfix">
                                <p class="mb-0 float-start">Fabrication : <strong> {{ $produit->date_fabrication_produit }}
                                    </strong></p>
                            </div>
                            <div class="clearfix">
                                <p class="mb-0 float-start">Expiration : <strong> {{ $produit->date_fabrication_produit }}
                                    </strong></p>
                            </div>
                            <a href="{{ route('produits.show', $produit->id) }}" type="button"
                                class="btn btn-primary">AFFICHER LE DETAIL</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--end row-->

    </div>
@endsection
