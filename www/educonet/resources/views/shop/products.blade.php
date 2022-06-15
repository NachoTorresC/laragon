
@extends('shop.frontend')


@section('content')
    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Lista de productos</h3>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($product as $producto)

            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <img src="/images/{{$curso->Imagen}}" alt="" class="w-full max-h-60">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $producto->nombre }}</h3>
                    <span class="mt-2 text-gray-500">€{{ $product->precio }}</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $producto->id }}" name="id">
                        <input type="hidden" value="{{ $producto->name }}" name="name">
                        <input type="hidden" value="{{ $producto->nombre }}" name="nombre">
                        <input type="hidden" value="{{ $producto->precio }}" name="precio">               
                        <input type="hidden" value="{{ $producto->price }}" name="price">
                        <input type="hidden" value="{{ $producto->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Añadir al carrito</button>
                    </form>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
@endsection