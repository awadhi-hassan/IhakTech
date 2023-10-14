<x-form-section submit="updatePassword">
    <x-slot name="title">
        <div class="dark:text-sky-500">
            {{ __('Update Password') }}
        </div>
    </x-slot>

    <x-slot name="description">
        <div class="dark:text-white">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </div>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <div class="flex items-center relative">
                <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                <div id="eyeicon" class="cursor-pointer mx-2 material-symbols-outlined absolute dark:text-white right-1">visibility</div>
            </div>
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('New Password') }}" />
            <div class="flex items-center relative">
                <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                <div id="eyeicon" class="cursor-pointer mx-2 material-symbols-outlined absolute dark:text-white right-1">visibility</div>
            </div>
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <div class="flex items-center relative">
                <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <div id="eyeicon" class="cursor-pointer mx-2 material-symbols-outlined absolute dark:text-white right-1">visibility</div>
            </div>
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>

<script>
    let eyeicons = document.querySelectorAll('#eyeicon');
    let password = document.getElementById('password');
    let current_password = document.getElementById('current_password');
    let password_confirmation = document.getElementById('password_confirmation');

    eyeicons.forEach(icon => {
        icon.addEventListener('click', () => {
            if (password.type == 'password'){
                password.type = 'text'
                current_password.type = 'text'
                password_confirmation.type = 'text'
                eyeicons.forEach(icon => {
                    icon.innerHTML = 'visibility_off';
                });
            }else{
                password.type = 'password'
                current_password.type = 'password'
                password_confirmation.type = 'password'
                eyeicons.forEach(icon => {
                    icon.innerHTML = 'visibility';
                });
            }
        });
    });
</script>
