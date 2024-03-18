<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Bedrijfsinformatie') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update de bedrijfsinformatie.') }}
        </p>
    </header>

    <form method="post" action="{{ route('bedrijfsinformatie.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="bedrijfsnaam" :value="__('Bedrijfsnaam')" />
            <x-text-input id="bedrijfsnaam" name="bedrijfsnaam" type="text" class="mt-1 block w-full" :value="old('bedrijfsnaam', $user->bedrijfsnaam)" required />
            <x-input-error class="mt-2" :messages="$errors->get('bedrijfsnaam')" />
        </div>

        <div>
            <x-input-label for="straat_huisnummer" :value="__('Straat en huisnummer')" />
            <x-text-input id="straat_huisnummer" name="straat_huisnummer" type="text" class="mt-1 block w-full" :value="old('straat_huisnummer', $user->straat_huisnummer)" required />
            <x-input-error class="mt-2" :messages="$errors->get('straat_huisnummer')" />
        </div>

        <div>
            <x-input-label for="postcode" :value="__('Postcode')" />
            <x-text-input id="postcode" name="postcode" type="text" class="mt-1 block w-full" :value="old('postcode', $user->postcode)" required />
            <x-input-error class="mt-2" :messages="$errors->get('postcode')" />
        </div>

        <div>
            <x-input-label for="plaats" :value="__('Plaats')" />
            <x-text-input id="plaats" name="plaats" type="text" class="mt-1 block w-full" :value="old('plaats', $user->plaats)" required />
            <x-input-error class="mt-2" :messages="$errors->get('plaats')" />
        </div>

        <div>
            <x-input-label for="land" :value="__('Land')" />
            <x-text-input id="land" name="land" type="text" class="mt-1 block w-full" :value="old('land', $user->land)" required />
            <x-input-error class="mt-2" :messages="$errors->get('land')" />
        </div>

        <div>
            <x-input-label for="kvknummer" :value="__('KVKnummer')" />
            <x-text-input id="kvknummer" name="kvknummer" type="text" class="mt-1 block w-full" :value="old('kvknummer', $user->kvknummer)" required />
            <x-input-error class="mt-2" :messages="$errors->get('kvknummer')" />
        </div>

        <div>
            <x-input-label for="telefoonnummer" :value="__('Telefoonnummer')" />
            <x-text-input id="telefoonnummer" name="telefoonnummer" type="text" class="mt-1 block w-full" :value="old('telefoonnummer', $user->telefoonnummer)" required />
            <x-input-error class="mt-2" :messages="$errors->get('telefoonnummer')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>
