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
                <a href="{{ route('add_product_show') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Ajouter produit</a>
                <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Mes produits</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Log out</button>
                </form>
            </div>
            </div>
        </nav>

        <div class="flex items-center justify-center bg-gray-100 h-screen">
            <!-- Author: FormBold Team -->
            <!-- Learn More: https://formbold.com -->
            <div class="mx-auto w-2/3 max-w-[550px] ">
              <form action="{{ route('add_product') }}" method="POST">
                @csrf
                <div class="mb-5">
                  <label
                    for="title"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                  Title
                  </label>
                  <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="Title"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                  />
                </div>
                
                <div class="mb-5">
                  <label
                    for="Price"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                    Price
                  </label>
                  <input
                    type="number"
                    name="price"
                    id="Price"
                    placeholder="Enter your Price"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                  />
                </div>

                <div class="mb-5">
                  <label
                    for="description"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                  >
                    Description
                  </label>
                  <textarea
                    rows="4"
                    name="description"
                    id="description"
                    placeholder="Type your description"
                    class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                  ></textarea>
                </div>

                <div class="mb-5">
                  <button type="submit"
                  class="w-full resize-none rounded-md border bg-gray-400 border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none "
                  >
                    Sauvegarder
                  </button>
                </div>
              </form>
            </div>
          </div>

    </body>
</html>