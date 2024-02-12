<x-guest-layout>
    @if (Route::has('login'))
        <livewire:auth.navigation />
    @endif

    <livewire:tasks>
</x-guest-layout>


