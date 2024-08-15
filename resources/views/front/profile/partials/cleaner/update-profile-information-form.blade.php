<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="surname" :value="__('Фамилия')" />
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old('surname', $user->surname)" autofocus autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>
        <div>
            <x-input-label for="patronymic" :value="__('Отчество')" />
            <x-text-input id="patronymic" name="patronymic" type="text" class="mt-1 block w-full" :value="old('patronymic', $user->patronymic)" autofocus autocomplete="patronymic" />
            <x-input-error class="mt-2" :messages="$errors->get('patronymic')" />
        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('Дата рождения')" />
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $user->date_of_birth)" autofocus autocomplete="date_of_birth" />
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
        </div>
        <div>
            <x-input-label for="address" :value="__('Адрес проживания')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Паспортные данные') }}
        </p>
        <div>
            <x-input-label for="passport_number" :value="__('Номер паспорта')" />
            <x-text-input id="passport_number" name="passport_number" type="number" class="mt-1 block w-full" :value="old('passport_number', $user->passport_number)" autofocus autocomplete="passport_number" />
            <x-input-error class="mt-2" :messages="$errors->get('passport_number')" />
        </div>
        <div>
            <x-input-label for="passport_series" :value="__('Серия паспорта')" />
            <x-text-input id="passport_series" name="passport_series" type="number" class="mt-1 block w-full" :value="old('passport_series', $user->passport_series)" autofocus autocomplete="passport_series" />
            <x-input-error class="mt-2" :messages="$errors->get('passport_series')" />
        </div>
        <div>
            <x-input-label for="passport_date" :value="__('Дата выдачи')" />
            <x-text-input id="passport_date" name="passport_date" type="date" class="mt-1 block w-full" :value="old('passport_date', $user->passport_date)" autofocus autocomplete="passport_date" />
            <x-input-error class="mt-2" :messages="$errors->get('passport_date')" />
        </div>
        <div>
            <x-input-label for="passport_address" :value="__('Адрес прописки')" />
            <x-text-input id="passport_address" name="passport_address" type="text" class="mt-1 block w-full" :value="old('passport_address', $user->passport_address)" autofocus autocomplete="passport_address" />
            <x-input-error class="mt-2" :messages="$errors->get('passport_address')" />
        </div>


        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Контакты и вход') }}
        </p>
        <div>
            <x-input-label for="phone" :value="__('Телефон')" />
            <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Банковские данные') }}
        </p>
        <div>
            <x-input-label for="bank_number" :value="__('Номер счета в формате IBAN')" />
            <x-text-input id="bank_number" name="bank_number" type="text" class="mt-1 block w-full" :value="old('bank_number', $user->bank_number)" autofocus autocomplete="bank_number" />
            <x-input-error class="mt-2" :messages="$errors->get('bank_number')" />
        </div>
        <div>
            <x-input-label for="bank_bic" :value="__('BIC код банка')" />
            <x-text-input id="bank_bic" name="bank_bic" type="text" class="mt-1 block w-full" :value="old('bank_bic', $user->bank_bic)" autofocus autocomplete="bank_bic" />
            <x-input-error class="mt-2" :messages="$errors->get('bank_bic')" />
        </div>
        <div>
            <x-input-label for="bank_name" :value="__('Название банка')" />
            <x-text-input id="bank_name" name="bank_name" type="text" class="mt-1 block w-full" :value="old('bank_name', $user->bank_name)" autofocus autocomplete="bank_name" />
            <x-input-error class="mt-2" :messages="$errors->get('bank_name')" />
        </div>
        @if(!$user->documents)
            @if(is_null($user->passport_photo_1))
                <div>
                    <x-input-label for="passport_photo_1" :value="__('Фото последних 2х разворотов паспорта')" />
                    <x-text-input id="passport_photo_1" name="passport_photo_1" type="file" class="mt-1 block w-full" accept="image/*" autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('passport_photo_1')" />
                </div>
            @endif
            @if(is_null($user->passport_photo_2))
                <div>
                    <x-input-label for="passport_photo_2" :value="__('Фото страницы с пропиской в паспорте')" />
                    <x-text-input id="passport_photo_2" name="passport_photo_2" type="file" class="mt-1 block w-full" accept="image/*"  autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('passport_photo_2')" />
                </div>
            @endif
            @if(is_null($user->employment_photo))
                <div>
                    <x-input-label for="employment_photo" :value="__('Фото трудовой книжки')" />
                    <x-text-input id="employment_photo" name="employment_photo" type="file" class="mt-1 block w-full" accept="image/*"  autofocus/>
                    <x-input-error class="mt-2" :messages="$errors->get('employment_photo')" />
                </div>
            @endif
            @if(is_null($user->contract_photo))
                <div>
                    <x-input-label for="contract_photo" :value="__('Фото подписанного договора')" />
                    <x-text-input id="contract_photo" name="contract_photo" type="file" class="mt-1 block w-full" accept="image/*"  autofocus/>
                    <x-input-error class="mt-2" :messages="$errors->get('contract_photo')" />
                </div>
            @endif
        @else
            @if($user->passport_check)
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Документы проверены') }}
                </p>
            @else
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Документы загружены и находятся на проверке') }}
                </p>
            @endif
        @endif

        <div>
            <x-input-label for="size" :value="__('Размер майки')" />
            <select name="size" id="size" class="mt-1 block w-full">
                @foreach(config('size') as $key => $value)
                    <option value="{{ $key }}" {{ $user->size == $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('size')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
