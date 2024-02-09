<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    @if ($this->user->profile_photo_path)
                        @php
                            auth()
                                ->user()
                                ->update(['profile_photo_path' => $this->user->profile_photo_path]);
                        @endphp
                        <img src="{{ asset('storage') . '/' . $this->user->profile_photo_path }}"
                            alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    @else
                        @php
                            auth()
                                ->user()
                                ->update(['profile_photo_url' => $this->user->profile_photo_url]);
                        @endphp
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                            class="rounded-full h-20 w-20 object-cover">
                    @endif
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Date of Birth -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="dob" value="{{ __('Date of Birth') }}" />
            <x-input id="dob" type="date" class="mt-1 block w-full" wire:model="state.dob" required />
            <x-input-error for="dob" class="mt-2" />
        </div>

        <!-- Mobile Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="mobile" value="{{ __('Mobile Number') }}" />
            <x-input id="mobile" type="tel" class="mt-1 block w-full" wire:model="state.mobile"
                placeholder="8347XXXXXX" required />
            <x-input-error for="mobile" class="mt-2" />
        </div>

        @if (Auth::user()->role == 'Instructor')
            <!-- Profession -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="profession" value="{{ __('Profession') }}" />
                <x-input id="profession" type="text" class="mt-1 block w-full" wire:model="state.profession"
                    placeholder="E.g., Software Developer, Marketing Specialist" required />
                <x-input-error for="profession" class="mt-2" />
            </div>

            <!-- Qualification -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="qualification" value="{{ __('Qualification') }}" />
                <x-input id="qualification" type="text" class="mt-1 block w-full" wire:model="state.qualification"
                    placeholder="E.g., Bachelor of Science in Computer Science" required />
                <x-input-error for="qualification" class="mt-2" />
            </div>

            <!-- Workplace -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="workplace" value="{{ __('Workplace') }}" />
                <x-input id="workplace" type="text" class="mt-1 block w-full" wire:model="state.workplace"
                    placeholder="E.g., Company Name, Office Location" required />
                <p class="mt-2 text-sm text-black-600">You are currently working at which place.</p>
                <x-input-error for="workplace" class="mt-2" />
            </div>

            <!-- YouTube Link -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="youtube" value="{{ __('YouTube Link') }}" />
                <x-input id="youtube" type="url" class="mt-1 block w-full" wire:model="state.youtube"
                    placeholder="E.g., https://www.youtube.com/user/yourusername" />
                <x-input-error for="youtube" class="mt-2" />
            </div>

            <!-- Instagram Link -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="instagram" value="{{ __('Instagram Link') }}" />
                <x-input id="instagram" type="url" class="mt-1 block w-full" wire:model="state.instagram"
                    placeholder="E.g., https://www.instagram.com/yourusername" />
                <x-input-error for="instagram" class="mt-2" />
            </div>

            <!-- LinkedIn Link -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="linkedin" value="{{ __('LinkedIn Link') }}" />
                <x-input id="linkedin" type="url" class="mt-1 block w-full" wire:model="state.linkedin"
                    placeholder="E.g., https://www.linkedin.com/in/yourusername" />
                <x-input-error for="linkedin" class="mt-2" />
            </div>

            <!-- Twitter Link -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="twitter" value="{{ __('Twitter Link') }}" />
                <x-input id="twitter" type="url" class="mt-1 block w-full" wire:model="state.twitter"
                    placeholder="E.g., https://twitter.com/yourusername" />
                <x-input-error for="twitter" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
