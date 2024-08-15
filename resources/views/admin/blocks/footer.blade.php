<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    {{ env('APP_NAME') }} CRM
                </p>
            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('admin.settings') }}" target="_blank">{{ __('Настройки') }}</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('admin.users.show', ['user' => auth()->user()->id]) }}" target="_blank">{{ __('Профиль') }}</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="{{ route('logout') }}">{{ __('Выйти') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>