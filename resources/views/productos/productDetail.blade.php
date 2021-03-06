@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
 Productos de High Tech Bearings
@endsection

<style>
    .img_product_card{
        max-height: 65vh;
        max-width:100%;

        border-radius: 5px 5px 0 0;
        overflow: hidden;
    }
    .img_product{
        border-radius: 5px;
        min-height: auto;
        max-height: 100%;
        min-width: auto;
        max-width: 100%;
    }

</style>
@section('content')

<section class="container-fluid px-1 px-md-3">
    <div class="row mb-0">
        <!-- Product Detail -->
        <div class="col-12 mt-5 pt-1 pt-md-3 mb-2 d-md-none">
            <div class="row align-items-center">
                <div class="col-12" style="margin-bottom: 0.15rem;">
                    <a class="text-xs" href="/categorias/{{$producto->categoria->slug}}" style="color: #{{$producto->categoria->category_color}};">
                        {{$producto->categoria->category}}
                    </a>
                </div>
                <div class="col-12">
                    <h1 class="font-semibold text-lg">{{ ucwords($producto->titulo) }}</h1>
                </div>
                <div class="col-12">
                    <div class="text-sm">
                        <span class="text-muted">
                            Código Universal:
                        </span>
                        <strong>
                                {{ $producto->codigo_universal }}
                        </strong>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="row card_product align-items-center mb-0 justify-content-center">
                <div class="col-12 img_product_card mb-md-3 ">
                    <img class="img_product" src="{{ Storage::url($producto->imagen) }}" alt="">
                </div>
            </div>
        </div>

        <div class="col-12 d-md-none">
            <span class="text-4xl font-light">
                @php $price = number_format($producto->precio, 2, '.', ','); @endphp
                {{ $price }} $USD
            </span>
        </div>
        <div class="col-12 col-md-6">

            <div class="row d-none d-md-block">
                <div class="col-12">
                    <h1 class="font-light text-3xl">{{$producto->titulo}}</h1>
                </div>
                <div class="col-12 mt-1">
                    <div class="row justify-content-between align-items-center">
                        <span class="col-auto">
                            Código Universal:
                            <strong>
                                 {{ $producto->codigo_universal }}
                            </strong>
                        </span>
                        <a class="col-auto rounded-full shadow-md py-1 px-3 text-white" href="/categorias/{{$producto->categoria->slug}}" style="background-color: #{{$producto->categoria->category_color}};">
                            {{$producto->categoria->category}}
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <span class="text-4xl font-light">
                        @php $price = number_format($producto->precio, 2, '.', ','); @endphp
                        {{ $price }} $USD
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-2xl mb-1">
                    Parámetros:
                </div>
                <div class="col-12">
                    <div class="row">
                        @if ( $producto->categoria->category == 'Serie Automotriz' )
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Articulo: </span> <br>
                                <span class="text-muted">{{ $producto->auto->articulo }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Posición de la rueda: </span> <br>
                                <span class="text-muted">{{ $producto->auto->posicion->posicion }}</span>
                            </div>
                            <div class="col-12">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 font-semibold text-xl">
                                        Medidas: {{ $producto->auto->d_interno }}x{{ $producto->auto->d_externo }}x{{ $producto->auto->espesor }}mm
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Diametro interno: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->d_interno }} mm</span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Diametro externo: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->d_externo }} mm</span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Espesor: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->espesor }} mm</span>
                                    </div>
                                </div>
                            </div>

                        @elseif( $producto->categoria->category == 'Serie Chumacera' )

                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Diametro: </span> <br>
                                <span class="text-muted">{{ $producto->chumacera->diametroChum->valor }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Tipo: </span> <br>
                                <span class="text-muted">{{ $producto->chumacera->tipoChum->tipo_chum }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Forma: </span> <br>
                                <span class="text-muted">{{ $producto->chumacera->formaChum->forma_chum }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Cantidad de huecos: </span> <br>
                                <span class="text-muted">{{ $producto->chumacera->No_huecos }}</span>
                            </div>

                        @elseif( $producto->categoria->category == 'Serie Cadenas' )

                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Pitch: </span> <br>
                                <span class="text-muted">{{ $producto->cadena->pitch }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Tipo de cadena: </span> <br>
                                <span class="text-muted">{{ $producto->cadena->tipoCadena->tipo_cadena_texto }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Empate de cadena: </span> <br>
                                <span class="text-muted">{{ $producto->cadena->tipoEmpate->tipo_empate }}</span>
                            </div>

                        @elseif( $producto->categoria->category == 'Serie 6000' )
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Rodamiento: </span> <br>
                                <span class="text-muted">{{ $producto->serie6000->rodamiento }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Tipo de sello: </span> <br>
                                <span class="text-muted">{{ $producto->serie6000->tipoSello->tipo_sello }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 font-semibold text-xl">
                                        Medidas: {{ $producto->serie6000->d_interno }}x{{ $producto->serie6000->d_externo }}x{{ $producto->serie6000->espesor }}mm
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Diametro interno: </span> <br>
                                        <span class="text-muted">{{ $producto->serie6000->d_interno }} mm</span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Diametro externo: </span> <br>
                                        <span class="text-muted">{{ $producto->serie6000->d_externo }} mm</span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Espesor: </span> <br>
                                        <span class="text-muted">{{ $producto->serie6000->espesor }} mm</span>
                                    </div>
                                </div>
                            </div>
                        @else

                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Tipo de sello: </span> <br>
                                <span class="text-muted">{{ $producto->moto->tipoSello->tipo_sello }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 font-semibold text-xl">
                                        Medidas: {{ $producto->moto->d_interno }}x{{ $producto->moto->d_externo }}x{{ $producto->moto->espesor }}mm
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Diametro interno: </span> <br>
                                        <span class="text-muted">{{ $producto->moto->d_interno }} mm</span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Diametro externo: </span> <br>
                                        <span class="text-muted">{{ $producto->moto->d_externo }} mm</span>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <span class="font-semibold text-lg">Espesor: </span> <br>
                                        <span class="text-muted">{{ $producto->moto->espesor }} mm</span>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row mb-1 mt-3">
        <div class="col-12 mb-1 mb-md-2">
            <h4 class="text-dark ">Descripcion del producto</h4>
        </div>
        <div class="col-12">
            <p class="text-muted">
                {!! $producto->descripcion !!}
            </p>
        </div>
    </div>

    @include('components.social_mobile')

</section>

{{-- Otor productos --}}
@include('components.other_products')
{{-- End Otros productos --}}

{{-- Social lateral --}}
@include('components.social_lateral')
{{-- End Social lateral --}}


@endsection
