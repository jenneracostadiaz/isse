@props(['project'])

<small
    @switch($project->status)
        @case(1)
            class="inline-flex items-center rounded-md bg-gray-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-gray-500/10">
                Pendiente
            
            @break
        @case(2)
            class="inline-flex items-center rounded-md bg-yellow-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-yellow-500/10">
                Aprobado
            @break
        @case(3)
            class="inline-flex items-center rounded-md bg-red-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-red-500/10">
                Cancelado
            @break
        @case(4)
            class="inline-flex items-center rounded-md bg-blue-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-blue-500/10">
                En proceso
            
            @break
        @case(5)
            class="inline-flex items-center rounded-md bg-green-600 px-2 py-1 text-xs font-medium text-gray-100 ring-1 ring-inset ring-green-500/10">
                Finalizado
            
            @break
        @default
            
    @endswitch
</small>