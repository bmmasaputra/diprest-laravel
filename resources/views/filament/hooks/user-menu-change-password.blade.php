@php
$url = \App\Filament\Pages\ChangePassword::getUrl();
@endphp

<x-filament::dropdown.list.item
    :href="$url"
    icon="heroicon-o-key"
    tag="a">
    Ubah Password
</x-filament::dropdown.list.item>