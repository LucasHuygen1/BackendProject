<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    
                    @auth
                        <x-nav-link 
                            :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')" 
                            :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard')">
                            {{ Auth::user()->role === 'admin' ? __('Admin Dashboard') : __('Dashboard') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endauth

                    <!-- News iedereen-->
                    <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.index')">
                        {{ __('News') }}
                    </x-nav-link>

                    <!-- Profiles iedereen -->
                    <x-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')">
                        {{ __('Profiles') }}
                    </x-nav-link>

                    <!-- FAQ iedereen -->
                    <x-nav-link :href="route('faq.public.index')" :active="request()->routeIs('faq.public.index')">
                        {{ __('FAQ') }}
                    </x-nav-link>

                    <!-- Contact: Voor users tonen we de normale contactpagina;
                         admins zien hun eigen admin contact overzicht -->
                    @auth
                        @if(Auth::user()->role !== 'admin')
                            <x-nav-link :href="route('contact.show')" :active="request()->routeIs('contact.show')">
                                {{ __('Contact') }}
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('admin.contact.index')" :active="request()->routeIs('admin.contact.index')">
                                {{ __('Admin Contacts') }}
                            </x-nav-link>
                        @endif
                    @else
                        <x-nav-link :href="route('contact.show')" :active="request()->routeIs('contact.show')">
                            {{ __('Contact') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile Link -->
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <!-- Login & Register guest -->
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link 
                    :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')" 
                    :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard')">
                    {{ Auth::user()->role === 'admin' ? __('Admin Dashboard') : __('Dashboard') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endauth

            <x-responsive-nav-link :href="route('news.index')" :active="request()->routeIs('news.index')">
                {{ __('News') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')">
                {{ __('Profiles') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('faq.public.index')" :active="request()->routeIs('faq.public.index')">
                {{ __('FAQ') }}
            </x-responsive-nav-link>

            @auth
                @if(Auth::user()->role !== 'admin')
                    <x-responsive-nav-link :href="route('contact.show')" :active="request()->routeIs('contact.show')">
                        {{ __('Contact') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('admin.contact.index')" :active="request()->routeIs('admin.contact.index')">
                        {{ __('Admin Contacts') }}
                    </x-responsive-nav-link>
                @endif
            @else
                <x-responsive-nav-link :href="route('contact.show')" :active="request()->routeIs('contact.show')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
