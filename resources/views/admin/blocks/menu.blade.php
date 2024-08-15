<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
          <span class="align-middle">{{ env('APP_NAME') }} CRM</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                {{ __('Основные') }}
            </li>
            @perm('settings')
              <li class="sidebar-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.settings') }}">
                      <i class="align-middle" data-feather="settings"></i> 
                      <span class="align-middle">{{ __('Настройки') }}</span>
                  </a>
              </li>
            @endperm
            @perm('logger-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.loggers') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.loggers') }}">
                    <i class="align-middle" data-feather="align-right"></i> 
                    <span class="align-middle">{{ __('Логи') }}</span>
                  </a>
              </li>
            @endperm

            @perm('role-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.roles.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> 
                    <span class="align-middle">{{ __('Роли') }}</span>
                  </a>
              </li>
            @endperm
            @perm('currency-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.currencies.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.currencies.index') }}">
                    <i class="align-middle" data-feather="dollar-sign"></i> 
                    <span class="align-middle">{{ __('Валюты') }}</span>
                  </a>
              </li>
            @endperm
            <li class="sidebar-header">
                {{ __('Администрирование') }}
            </li>
            @perm('user-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                    <i class="align-middle" data-feather="users"></i> 
                    <span class="align-middle">{{ __('Пользователи') }}</span>
                  </a>
              </li>
            @endperm
            @perm('feedback-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.feedback.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.feedback.index') }}">
                    <i class="align-middle" data-feather="message-square"></i> 
                    <span class="align-middle">{{ __('Вопросы') }}</span>
                    <span class="sidebar-badge badge bg-light">{{ \App\Models\Feedback::where('read', 0)->count() }}</span>
                  </a>
              </li>
            @endperm
            <li class="sidebar-header">
                {{ __('Услуги') }}
            </li>
            @perm('service-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.services.index') }}">
                    <i class="align-middle" data-feather="feather"></i> 
                    <span class="align-middle">{{ __('Услуги') }}</span>
                  </a>
              </li>
            @endperm
            @perm('option-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.options.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.options.index') }}">
                    <i class="align-middle" data-feather="disc"></i> 
                    <span class="align-middle">{{ __('Опции услуг') }}</span>
                  </a>
              </li>
            @endperm
            <li class="sidebar-header">
                {{ __('Управление контентом') }}
            </li>
            @perm('cause-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.causes.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.causes.index') }}">
                    <i class="align-middle" data-feather="user-x"></i> 
                    <span class="align-middle">{{ __('Причины удаления') }}</span>
                  </a>
              </li>
            @endperm
            @perm('article-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.articles.index') }}">
                    <i class="align-middle" data-feather="align-center"></i> 
                    <span class="align-middle">{{ __('Статьи') }}</span>
                  </a>
              </li>
            @endperm
            @perm('faq-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.faqs.index') }}">
                    <i class="align-middle" data-feather="info"></i> 
                    <span class="align-middle">{{ __('FAQ') }}</span>
                  </a>
              </li>
            @endperm
            @perm('review-view-any')
              <li class="sidebar-item {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                  <a class="sidebar-link" href="{{ route('admin.reviews.index') }}">
                    <i class="align-middle" data-feather="star"></i> 
                    <span class="align-middle">{{ __('Отзывы') }}</span>
                  </a>
              </li>
            @endperm
        </ul>
    </div>
</nav>

