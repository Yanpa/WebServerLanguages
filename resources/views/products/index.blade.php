@extends('layout')

@section('content')
@if(Auth::check())
    <table class="w-full table mx-auto border">
        <thead>
            <tr class="border">
                <th class="text-center py-4">Name</th>
                <th class="text-center py-4">Description</th>
                <th class="text-center py-4">Purchase rice</th>
                <th class="text-center py-4">Selling price</th>
                <th class="text-center py-4">Amount</th>
                <th class="text-center py-4">Code</th>
                <th class="text-center py-4"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="border">
                    <td class="text-center py-4">{{ $product->name }}</td>
                    <td class="text-center py-4">{{ $product->description }}</td>
                    <td class="text-center py-4">{{ $product->purchase_price }}</td>
                    <td class="text-center py-4">{{ $product->selling_price }}</td>
                    <td class="text-center py-4">{{ $product->number_of_products }}</td>
                    <td class="text-center py-4">{{ $product->product_code }}</td>
                    <td class="text-center py-4">
                        <a href="/products/{{$product->id}}/edit" class="bg-purple-500 hover:bg-black text-white font-bold px-6 rounded-full">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="/products/{{$product->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white font-bold px-4 rounded-full">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h1 class="text-center text-3xl">You need to log in to see the products in this website</h1>
@endif
@endsection