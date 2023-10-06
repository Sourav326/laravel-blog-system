<!-- Navbar -->
<div class="bg-white sticky top-0 z-50">
        <header class="relative bg-white ">
            <p
                class="flex h-10 items-center justify-center bg-gradient-to-r from-violet-500 to-fuchsia-500 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
                Get all content for free 🚀 </p>
            <nav aria-label="Top"
                class="px-4 sm:px-6 lg:px-8 border-b border-gray-200 dark:bg-gray-900 dark:border-neutral-950">
                <div class="max-w-7xl mx-auto">
                    <div class="flex h-16 items-center">
                        <div class="ml-4 flex lg:ml-0">
                            <a class="flex items-center space-x-2" href="/">
                                <div class="text-lime-500 text-4xl font-black">Blog</span></div>
                            </a>
                        </div>
                        
                        <div class="ml-16 lg:block lg:self-stretch">
                            <div class="flex h-full space-x-8 ">
                                <a aria-current="page"
                                    class="{{ (Route::currentRouteName() == 'home') ? 'dark:text-blue-500 text-blue-700 font-black':'text-gray-700 dark:text-white' }} flex items-center text-base font-medium  hover:text-lime-600 hover:border-lime-600"
                                    href="{{route('home')}}">Home</a>
                                <a class="{{ (Route::currentRouteName() == 'blog.index') ? 'dark:text-blue-500 text-blue-700 font-black':'text-gray-700 dark:text-white' }} flex items-center text-base font-medium text-gray-700  dark:text-white hover:text-lime-600  hover:border-lime-600"
                                    href="{{route('blog.index')}}">Blogs</a>
                            </div>
                        </div>
                        <div class="sm:ml-16 lg:ml-auto flex items-center">
                            <div class="flex sm:gap-2 lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                @auth
                                    <a class="{{ (Route::currentRouteName() == 'dashboard') ? 'dark:text-blue-500 text-blue-700 font-black':'text-gray-700 dark:text-white' }} text-base font-medium  hover:text-lime-600 capitalize"
                                        href="{{ url('/dashboard') }}">Dashboard</a>
                                        <span class="h-6 w-px bg-gray-200"
                                        aria-hidden="true"></span>
                                        <a class="{{ (Route::currentRouteName() == 'profile.edit') ? 'dark:text-blue-500 text-blue-700 font-black':'text-gray-700 dark:text-white' }} text-base font-medium  hover:text-lime-600 capitalize"
                                            href="{{ url('/profile') }}">Profile</a>
                                        <span class="h-6 w-px bg-gray-200"
                                        aria-hidden="true"></span>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="text-base font-medium text-gray-700  dark:text-white hover:text-lime-600 capitalize"
                                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">Logout</a>
                                    </form>
                                @else
                                    <a class="text-base font-medium text-gray-700  dark:text-white hover:text-lime-600 {{ (Route::currentRouteName() == 'login') ? 'dark:text-blue-500 text-blue-700 font-black':'text-gray-700 dark:text-white' }}"
                                    href="{{ route('login') }}">Login</a>
                                    <span class="h-6 w-px bg-gray-200"
                                        aria-hidden="true"></span>
                                    <a href="{{ route('register') }}"
                                    class="text-base font-medium text-gray-700  dark:text-white hover:text-lime-600 {{ (Route::currentRouteName() == 'register') ? 'dark:text-blue-500 text-blue-700 font-black':'text-gray-700 dark:text-white' }}">Create
                                    account</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>