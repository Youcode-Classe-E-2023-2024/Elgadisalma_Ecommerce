@php
use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">


        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>

        <nav class="relative select-none bg-red-500 lg:flex lg:items-stretch w-full">
            <div class="flex flex-no-shrink items-stretch h-12">
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark"></a>
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Css</a>
            <button class="block lg:hidden cursor-pointer ml-auto relative w-12 h-12 p-4">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
            </button>
            </div>
            <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
            <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                <a href="{{ route('products') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Home</a>
                <a href="{{ route('add_product_show') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Ajouter produit</a>
                <a href="{{ route('getMyProducts') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Mes produits</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Log out</button>
                </form>
            </div>
            </div>
        </nav>

        <main class="mt-5 justify-center">
            
            <div class="flex flex-wrap w-full gap-10 justify-center">
            <div class="flex w-2/3 justify-between">
                
                <div class="flex gap-2 ">
                    <img src=""
                        class="h-10 w-10 rounded-full object-cover" />
                    <div>
                        <p class="font-semibold text-gray-800 text-sm">salma</p>
                        <p class="font-semibold text-gray-400 text-xs">{{ Carbon::parse($product->created_at)->diffForHumans() }}</p>
                    </div>
                </div>
                
                <div class="">
                    <a href="#" class="px-4 py-1 bg-purple-400 text-white inline-flex items-center justify-center ">category</a>   
                </div>
                
            </div>

            <img class="w-2/3 h-80" src="{{ asset('storage/images/' . $product['image']) }}" />

            <div class="w-2/3 flex flex-col gap-5 text-gray-700">
                <div class="flex gap-2 justify_end">
                
                    <a href="#" class="px-4 py-1 bg-gray-800 rounded-2xl text-white inline-flex items-center justify-center ">{{ $product['price'] }} dh</a>   
                
                </div>
                <h2 class="text-3xl font-semibold text-yellow-500">{{ $product['title'] }}</h2>
            </div>

            <div class="flex flex-col w-full items-center justify-center">
            <div class="text-gray-600 w-2/3 text-lg  ">
                <p class="">{{ $product['description'] }}</p>
            </div>
            </div>
        </div>
        
        </main>
    
    </body>
</html>
