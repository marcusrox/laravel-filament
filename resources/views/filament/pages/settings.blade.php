<x-filament-panels::page>

<div>
    Essa é uma página 100% livewire. Podemos criar qualquer programação aqui
</div>

<div>
    @livewire(\App\Filament\Widgets\SumarioOverview::class)
</div>

<div class="flex space-x-4">
    <div class="w-2/4 p-4 text-white">
    @livewire(\App\Filament\Widgets\VendasChart::class)
    </div>
    <div class="w-2/4 p-4 text-white">
    @livewire(\App\Filament\Widgets\FaturamentoChart::class)
    </div>
</div>

<div>
<div class="text-xs text-gray-400">
    Copyright iDev Solutions {{ date("Y") }} |
    Ambiente: {{ App::environment() }} |
    Laravel {{ app()->version() }} |
    PHP {{ phpversion() }} |
    Login {{ Auth::user()->name }}</div>
</div>

</x-filament-panels::page>

