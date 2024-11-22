<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just enter your phone number and we will send you a password reset link via WhatsApp.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.whatsapp') }}">
        @csrf

        <!-- Phone Number -->
        <div>
            <x-input-label for="no_hp" :value="__('Phone Number')" />
            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp')" required autofocus />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Send Password Reset Link via WhatsApp') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>