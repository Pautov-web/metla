<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile Client') }}
        </h2>
        <a class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" href="{{ route('profile.edit') }}">{{ __('Редактировать профиль') }}</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Profile Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Update your account's profile information and email address.") }}
                            </p>
                        </header>

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" disabled/>
                            </div>
                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" disabled/>
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" disabled/>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
