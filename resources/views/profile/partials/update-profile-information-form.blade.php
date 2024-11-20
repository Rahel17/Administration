<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Data Profil User --}}
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" 
                :value="old('name', $user->name)" required autofocus autocomplete="name" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
        <div>
            <x-input-label for="npm" :value="__('NPM')" />
            <x-text-input id="npm" name="npm" type="text" class="mt-1 block w-full" 
                :value="old('npm', $user->npm)" required autocomplete="username" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('npm')" />
        </div>
    </form>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="mt-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Data Anggota --}}
    @if ($anggota)
        {{-- Jika Data Anggota Ada, Tampilkan --}}
        <div class="mt-6 space-y-6">
            {{-- <h3 class="text-lg font-medium text-gray-900">{{ __('Anggota Information') }}</h3> --}}

            <div>
                <x-input-label for="bidang" :value="__('Bidang')" />
                <x-text-input id="bidang" name="bidang" type="text" class="mt-1 block w-full" 
                    :value="$anggota->bidang" readonly />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" 
                    :value="$anggota->email" readonly />
            </div>
        </div>
    @else
        {{-- Jika Tidak Ada Data Anggota, Tampilkan Form Input --}}
        <form method="post" action="{{ route('anggota.store') }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="bidang" :value="__('Bidang')" />
                <x-text-input id="bidang" name="bidang" type="text" class="mt-1 block w-full" 
                    :value="old('bidang')" required />
                <x-input-error class="mt-2" :messages="$errors->get('bidang')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="text" aria-placeholder="raUc6@example.com" class="mt-1 block w-full" 
                    :value="old('email')" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="flex items-center justify-end">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    @endif
</section>