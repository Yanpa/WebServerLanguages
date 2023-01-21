@extends('layout')

@section('content')
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Create product</h2>
    </header>

    <div class="bg-gray-50 border border-gray-200 rounded p-6 p-10 max-w-lg mx-auto mt-24">
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2"> Name </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="purchase_price" class="inline-block text-lg mb-2"> Purchase price </label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="purchase_price" value="{{old('purchase_price')}}" />

                @error('purchase_price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="selling_price" class="inline-block text-lg mb-2"> Selling price </label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="selling_price" value="{{old('selling_price')}}" />

                @error('selling_price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="number_of_products" class="inline-block text-lg mb-2"> Number of products </label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="number_of_products" value="{{old('number_of_products')}}" />

                @error('number_of_products')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="product_code" class="inline-block text-lg mb-2"> Product code </label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="product_code" value="{{old('product_code')}}" />

                @error('product_code')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2"> File upload </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
        
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
            
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2"> Description </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{old('description')}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Create</button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
@endsection