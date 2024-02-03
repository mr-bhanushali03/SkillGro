<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('dashboard') }}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </a>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                <x-action-section>
                    <x-slot name="title">
                        {{ __('Upload Avatar') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('You can edit or update avatar.') }}
                    </x-slot>

                    <x-slot name="content">
                        <div class="max-w-xl text-sm text-gray-600">
                            {{ __('Make sure to update your avatar. Feel free to choose a new one that represents you best.') }}
                        </div>

                        <!-- Avatar Upload Form -->
                        <form method="POST" action="{{ route('upload.avatar') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Current Avatar -->
                            <div>
                                <img src="{{ asset('storage/') }}/{{ Auth::user()->avatar }}"
                                    alt="{{ auth()->user()->name }}" class="rounded-full h-20 w-20 object-cover">
                            </div>

                            <!-- New Avatar -->
                            <div class="mt-2">
                                <label for="avatar" class="cursor-pointer">
                                    <span class="text-blue-600">{{ __('Choose a new avatar') }}</span>
                                    <input type="file" class="hidden" id="avatar" name="avatar" accept="image/*">
                                </label>
                            </div>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Upload Avatar') }}
                            </button>
                        </form>
                    </x-slot>
                </x-action-section>
            </div>

            <x-section-border />

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
