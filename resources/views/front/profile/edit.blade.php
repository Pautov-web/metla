<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if($user->role_id == 2)
                        @include('front.profile.partials.cleaner.update-profile-information-form')
                    @else
                        @include('front.profile.partials.client.update-profile-information-form')
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('front.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if($user->role_id == 2)
                        @include('front.profile.partials.delete-user-form')
                    @else
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            <a style="text-decoration: underline; color: red;" href="{{ route('profile.delete') }}">{{ __('Удалить аккаунт') }}</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
