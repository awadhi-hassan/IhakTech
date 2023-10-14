<nav x-data="{ open: false }" class="z-10 sticky top-0 bg-white dark:bg-black dark:border-b border-gray-100 drop-shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-mark class="block" />
                </a>

                <a class="ml-8" href="{{ route('dashboard') }}">
                    <h1 class="font-montserrat text-xl dark:text-white">Ihaknas <strong>Technologies</strong></h1>
                </a>

            </div>

            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden dark:text-white space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <div id="services" class="cursor-pointer z-10 inline-flex items-center text-sm font-medium h-10 mt-3 leading-5">
                        <x-dropdown align="center" width="72" margin="6">
                            <x-slot name="trigger">
                                <div class="flex items-center">
                                    {{ __('Services') }}
                                    <div id="dropdown_icon" class="material-symbols-outlined transition duration-300 ease-in-out">expand_more</div>
                                </div>
                            </x-slot>
                            <x-slot name="content">
                                @php
                                    $services = [
                                        'Graphics Design',
                                        'Web Development',
                                        'Software Solutions',
                                        'Branding',
                                        'CCTV Installation',
                                        'Large Format Printing'
                                    ]
                                @endphp

                                @foreach ($services as $service )
                                    <x-dropdown-link class="font-montserrat pt-2 px-4 dark:text-gray-300 hover:text-white">
                                        <div class="flex justify-between">
                                            <div>{{ __( $service )}}</div>
                                            <div class="material-symbols-outlined">chevron_right</div>
                                        </div>
                                    </x-dropdown-link>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <x-nav-link  href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('About Us') }}
                    </x-nav-link>
                    <x-nav-link  href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 flex items-center relative">
                    @if (Auth::user())
                        <x-dropdown align="right" width="48" margin="1">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-black hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400 dark:text-white">
                                    {{ __(Auth::user()->name) }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    <div class="flex items-center dark:text-white">
                                        <div class="mx-2 material-symbols-outlined">manage_accounts</div>
                                        {{ __('Profile') }}
                                    </div>
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    <div class="flex items-center dark:text-white">
                                        <div class="mx-2 material-symbols-outlined">logout</div>
                                        {{ __('Log Out') }}
                                    </div>
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('register') }}" class="text-sm pr-2 hover:font-bold dark:text-white">{{ __('Register') }}</a>
                        <div class="dark:text-white">{{ __('|') }}</div>
                        <a href="{{ route('login') }}" class="text-sm pl-2 pr-6 hover:font-bold dark:text-white" >{{ __('Login') }}</a>
                    @endif

                    {{-- Light and Dark Modes --}}
                    <div id="darkmode" class="dark:text-white cursor-pointer ml-4 material-symbols-outlined transition duration-300 ease-in-out">nights_stay</div>
                    <div id="lightmode" class="dark:text-white cursor-pointer ml-4 material-symbols-outlined transition duration-300 ease-in-out">light_mode</div>

                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:dark:bg-black focus:outline-none focus:dark:bg-black focus:text-gray-500 transition duration-300 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden relative">

        <!-- Responsive Settings Options -->
        <div class="pb-1 border-t border-gray-200">
            <div id="profile_dropdown" class="h-16 overflow-hidden w-full pt-2 font-medium">
                @if (Auth::user())
                    <div class="flex items-center w-full">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 mx-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif

                        <div class="flex justify-between items-center w-full">
                            <div>
                                <div class="font-medium text-base text-gray-800 dark:text-gray-300">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>

                            <div id="profile_dropdown_icon" class="dark:text-white mx-2 material-symbols-outlined transition duration-300 ease-in-out">expand_more</div>
                        </div>
                    </div>

                    <div id="manage_account" class="ml-8 w-full font-medium pt-2">
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            <div class="flex items-center">
                                <div class="mr-2 material-symbols-outlined">manage_accounts</div>
                                {{ __('Profile') }}
                            </div>
                        </x-responsive-nav-link>

                        <div class="">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-responsive-nav-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                    <div class="flex items-center">
                                        <div class="mr-2 material-symbols-outlined">logout</div>
                                        {{ __('Log Out') }}
                                    </div>
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                @else
                    <div>
                        <div class="flex items-center justify-between dark:text-white">
                            <div class="flex items-center">
                                <div class="mx-2 material-symbols-outlined text-5xl">account_circle</div>
                                <div class="text-md">{{ __('Account Management') }}</div>
                            </div>
                            <div id="profile_dropdown_icon" class="mr-2 material-symbols-outlined">expand_more</div>
                        </div>

                        <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            <div class="flex items-center ml-8">
                                <div class="mr-2 material-symbols-outlined">how_to_reg</div>
                                {{ __('Register') }}
                            </div>
                        </x-responsive-nav-link>

                        <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            <div class="flex items-center ml-8">
                                <div class="mr-2 material-symbols-outlined">login</div>
                                {{ __('Log In') }}
                            </div>
                        </x-responsive-nav-link>
                    </div>
                @endif
            </div>

            <div id="responsive_services" class="h-8 px-4 overflow-hidden w-full py-2 dark:text-white font-medium">
                <div class="flex items-center">
                    {{__('Services')}}
                    <div id="profile_dropdown_icon" class="dark:text material-symbols-outlined transition duration-300 ease-in-out">expand_more</div><br>
                </div>
                @foreach ($services as $service)
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <div class="ml-4 mt-2 flex justify-between">
                            <div>{{__( $service )}}</div>
                            <div class="material-symbols-outlined">chevron_right</div>
                        </div>
                    </x-responsive-nav-link>
                @endforeach
            </div>

            <x-responsive-nav-link  href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('About Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link  href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>

            <div id="mode" class="my-4 dark:text-white">
                <div id="darkmode" class="flex">
                    <div class="ml-4 material-symbols-outlined transition duration-500 ease-in">nights_stay</div>
                    <div class="text-xm ml-2">switch to dark mode</div>
                </div>
                <div id="lightmode" class="flex">
                    <div class="ml-4 material-symbols-outlined transition duration-500 ease-in">light_mode</div>
                    <div class="text-xm ml-2">switch to light mode</div>
                </div>
            </div>
        </div>
    </div>
</nav>
