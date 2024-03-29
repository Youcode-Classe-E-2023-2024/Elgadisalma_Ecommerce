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

        <div class="bg-white">

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


            <div class="py-16 sm:py-24 lg:mx-auto lg:max-w-7xl lg:px-8">
            <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Trending products</h2>

                <form action="{{ route('products') }}" method="post" class="flex flex-col bg-red-1 gap-2">
                    @csrf
                    <div class="flex w-full ">
                    <label class="w-44 font-semibold text-gray-900 " for="sortBy">Trier par :</label>
                    <select name="sortBy" id="sortBy" class="w-1/2 border-2 bg-purple-100 rounded">
                        <option value="date" {{ ($sortBy == 'date') ? 'selected' : '' }}>Date</option>
                        <option value="name" {{ ($sortBy == 'name') ? 'selected' : '' }}>Nom</option>
                    </select>
                    </div>
                    
                    <button class="border-2 w-full px-4 py-1 rounded" type="submit">Trier</button>
                </form>
                
                
            </div>
        
            <div class="relative mt-8 flex flex-col">
                <div class="relative -mb-6 w-full overflow-x-auto pb-6">
                <ul role="list" class="mx-4 inline-flex space-x-8 sm:mx-6 lg:mx-0 lg:grid lg:grid-cols-4 lg:gap-x-8 lg:space-x-0 gap-5">

                    @forelse ($products as $product)

                    <li class="inline-flex w-64 flex-col text-center lg:w-auto border-2">
                    <div class="group relative">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200">
                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">
                        </div>
                        <div class="mt-6">
                        <p class="text-sm text-gray-500">Black</p>
                        <h3 class="mt-1 font-semibold text-gray-900">
                            <a href="#">
                            <span class="absolute inset-0"></span>
                            {{ $product['title'] }}
                            </a>
                        </h3>
                        <p class="mt-1 text-gray-900">{{ $product['price'] }} dh</p>
                        </div>
                    </div>
        
                    <h4 class="sr-only">Available colors</h4>
                    <a href="details/{{ $product['id'] }}" class="hidden text-sm font-semibold text-red-400 hover:text-cyan-500 sm:block m-2">
                        See everything
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                    </li>

                    @empty
                    <p>No products Found</p>
                    @endforelse

                    <div class="flex justify-center">{{ $products->links() }}</div>

            </div>

    </div>

    </body>
</html>