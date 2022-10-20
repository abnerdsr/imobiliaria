<div class="ms-auto" data-turbolinks-permanent style="display: flex;">
    <a href="{{ route('platform.notifications') }}"
       class="nav-link p-0 d-flex align-items-center"
       data-controller="notification"
       data-notification-count="{{ count($notifications) }}"
       data-notification-url="{{ route('platform.api.notifications') }}"
       data-notification-method="post"
       data-notification-interval="{{ config('platform.notifications.interval') }}"
    >
        <x-orchid-icon path="bell"/>

        <template id="notification-circle">
            <x-orchid-icon path="circle" width="0.5em" height="0.5em" />
        </template>

        <span class="badge badge-sm up bg-danger text-white" data-notification-target="badge"></span>
    </a>


    <!-- Authentication -->
    {{-- <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <x-jet-dropdown-link href="{{ route('logout') }}"
                 @click.prevent="$root.submit();">
                 <x-orchid-icon path="logout"/>
        </x-jet-dropdown-link>
    </form> --}}

    
</div>
