<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('logo.png')}}">

    <title>Blog | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    @vite('resources/css/app.css')

</head>

<body class="font-sans antialiased">
    <div class="pb-16 bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        @if(Session::has('sucess'))
        <div class="max-w-7xl mx-auto mt-10 bg-green-100 p-3 text-lime-600 text-xl">
            {{Session::get('sucess')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="max-w-7xl mx-auto mt-10 bg-red-100 p-3 text-red-600 text-xl">
            {{Session::get('error')}}
        </div>
        @endif


        <!-- Page Content -->

        @yield('content')

    </div>

    <div class="flex max-w-7xl mx-auto py-16 justify-between items-center flex-col sm:gap-6 lg:flex-row sm:px-6">
        <img src="{{asset('assets/images/illustration-4.png')}}" alt="Newsletter image" class="lg:w-2/5">
        <div class="lg:w-2/5">
            <h1 class="capitalize text-4xl font-extrabold leading-tight text-center lg:text-left">Get a new
                <span class="text-lime-500">Blog</span><br> every day</h1>
                <p class="text-xl pt-8">Blogs are a type of regularly updated websites that provide insight into a certain topic. The word blog is a combined version of the words “web” and “log.”</p>
        </div>
    </div>
    <footer class="py-16 border-t border-hrey-500">
        <p class="text-center sm:text-2xl">Created By Sourav Chauhan with ❤️</p>
    </footer>

    <script>
    const imageInput = document.getElementById('selectedImage');
    const imagePreview = document.getElementById('target');

    imageInput.addEventListener('change', function() {
        console.log("called");
        const selectedFile = imageInput.files[0];
        console.log(selectedFile);
        if (selectedFile) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(selectedFile);
        } else {
            imagePreview.src = "#";
        }
    });
    </script>
</body>

</html>