<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!--  enctype="multipart/form-data" voor foto -->
    <form 
        method="post" 
        action="{{ route('profile.update') }}" 
        enctype="multipart/form-data"
        class="mt-6 space-y-6"
    >
        @csrf
        @method('patch')

        <!-- pfp -->
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            <input 
                id="profile_photo" 
                name="profile_photo" 
                type="file" 
                class="mt-1 block w-full" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />

            @if ($user->profile_photo)
                <!-- actuele pfp, als die bestaat -->
                <div class="mt-4">
                    <img 
                        src="{{ asset('storage/'.$user->profile_photo) }}" 
                        alt="Profile Photo"
                        class="w-24 h-24 rounded-full shadow-md"
                    >
                </div>
            @endif
        </div>

        <!-- name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 block w-full" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-1 block w-full" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button 
                            form="send-verification" 
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- verjaardag profiel -->
        <div>
            <x-input-label for="birthday" :value="__('Birthday')" />
            <x-text-input 
                id="birthday" 
                name="birthday" 
                type="date" 
                class="mt-1 block w-full" 
                :value="old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '')" 
                required 
                autocomplete="bday" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <!-- ABOUT -->
        <!-- textarea used for bigger box. -->
        <div>
            <x-input-label for="about" :value="__('About')" />
            <textarea 
                id="about" 
                name="about" 
                rows="5" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >{{ old('about', $user->about) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
