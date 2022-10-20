<div class="ms-auto" style="display: flex;">
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <button class="nav-link p-0 d-flex align-items-center" style="margin-left: 4px;">
            <x-orchid-icon path="logout" />
        </button>
    </form>
</div>
