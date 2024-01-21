<x-layout.app>
    <section class="dashboard">
        <div class="navigation">
            <x-dashboard-navigation />
        </div>
        <div class="content">
            <h2 class="title-menu">{{ $title }}</h2>
            {{ $slot }}
        </div>
    </section>
</x-layout.app>