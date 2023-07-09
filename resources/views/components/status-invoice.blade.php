@props(['status'])

<small
    @switch($status)
        @case(1)
            class="inline-flex items-center rounded-md bg-gray-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-gray-500/10">
                No Generado
            
            @break
        @case(2)
            class="inline-flex items-center rounded-md bg-yellow-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-yellow-500/10">
                Generado
            @break
        @case(3)
            class="inline-flex items-center rounded-md bg-green-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-red-500/10">
                Pagado
            @break
        @case(4)
            class="inline-flex items-center rounded-md bg-red-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-blue-500/10">
                No Pagado
            
            @break
        @default
            
    @endswitch
</small>