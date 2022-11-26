<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full px-4 sm:px-6 lg:px-6 mx-auto">
        <div class="flex justify-between items-center h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="flex items-center" href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                        <h1 class="sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl"><strong>Ihaknas</strong> Technologies</h1>
                    </a>
                </div>

            </div>
            <!-- Navigation Links -->
            <div class="flex">
                <div class="hidden sm:ml-2 md:ml-4 lg:ml-6 xl:ml-8 2xl:ml-10 h-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        DASHBOARD
                    </x-jet-nav-link>
                </div>
                <div class="hidden md:ml-2 lg:ml-6 xl:ml-8 2xl:ml-10 h-10 sm:flex">
                    <x-jet-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                        <div id="services" class="static">
                        {{-- <div class="static z-50" onmouseover="mouse_on_arrows(this)" onmouseout="mouse_off_arrows(this)"> --}}
                            <div class="flex items-center">
                                SERVICES
                                <img id="arrow_down" class="h-3 ml-1 opacity-50 mb-0.5" src="{{ asset("storage/icons/down.png") }}" alt="down">
                                <img id="arrow_up" class="h-3 hidden ml-1 opacity-50 mb-0.5" src="{{ asset("storage/icons/up.png") }}" alt="up">
                            </div>

                            {{-- Dropdown on the services link --}}
                            <div id="dropdown" class="z-50 bg-white shadow-xl sm:rounded-lg border-2 w-1/4 mt-5 right-1/3 font-normal hidden absolute" onmouseout="drop(this)">
                                <div class="hover:bg-gray-200 flex items-center py-3">
                                    <img class="h-10 mx-5" src="{{ asset("storage/icons/graphics.png") }}" alt="">
                                    <div class="text-black">
                                        <h1 class="font-bold">Graphics Design</h1>
                                        <h2>On demand quality graphics design for all your presentations.</h2>
                                    </div>
                                </div>
                                <div class="hover:bg-gray-200 flex items-center py-3">
                                    <img class="h-10 mx-5" src="{{ asset("storage/icons/web.png") }}" alt="">
                                    <div class="text-black">
                                        <h1 class="font-bold">Web Design & Development</h1>
                                        <h2>Let us build you amazing webites that are responsive across all devices.</h2>
                                    </div>
                                </div>
                                <div class="hover:bg-gray-200 flex items-center py-3">
                                    <img class="h-10 mx-5" src="{{ asset("storage/icons/network.png") }}" alt="">
                                    <div class="text-black">
                                        <h1 class="font-bold">Networking</h1>
                                        <h2>How you are connected both inside your organization and the outside world sends a picture. Lets help you paint the canvas.</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-jet-nav-link>
                </div>
                <div class="hidden md:ml-2 lg:ml-6 xl:ml-8 2xl:ml-10 h-10 sm:flex">
                    <x-jet-nav-link href="{{ route('firstimer') }}" :active="request()->routeIs('firstimer')">
                        FIRST TIMER
                    </x-jet-nav-link>
                </div>
                <div class="hidden md:ml-2 lg:ml-6 xl:ml-8 2xl:ml-10 h-10 sm:flex">
                    <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        ABOUT
                    </x-jet-nav-link>
                </div>
                <div class="hidden md:ml-2 lg:ml-6 xl:ml-8 2xl:ml-10 h-10 sm:flex">
                    <x-jet-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        CONTACT
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">

                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <button class="flex items-center">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ asset("storage/".Auth::user()->profile_photo_path)  }}" alt="{{ Auth::user()->name }}" />
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                <div class="flex items-center">
                                    <img class="h-4 mr-2" src="{{ asset("storage/icons/account.png") }}" alt="">
                                    {{ __('Profile') }}
                                </div>
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    <div class="flex items-center">
                                        <img class="h-3 mr-2 ml-1" src="{{ asset("storage/icons/logout.png") }}" alt="">
                                        {{ __('Log Out') }}
                                    </div>
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                {{ __('Services') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('firstimer') }}" :active="request()->routeIs('firstimer')">
                {{ __('First timer') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('Contact') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 shadow-lg rounded-lg">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset("storage/".Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    <div class="flex items-center">
                        <img class="h-4 mr-2" src="{{ asset("storage/icons/account.png") }}" alt="">
                        {{ __('Profile') }}
                    </div>
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        <div class="flex items-center">
                            <img class="h-3 mr-2 ml-1" src="{{ asset("storage/icons/logout.png") }}" alt="">
                            {{ __('Log Ot') }}
                        </div>
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
