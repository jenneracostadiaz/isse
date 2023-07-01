@props(['project'])

<div class="group relative rounded-lg flex @if ($project->status == '3') opacity-50 @elseif ($project->status == '5') border border-green-400 @endif" >
    <a class="block w-full relative z-10 rounded-lg bg-slate-900 p-6 sm:p-8 @if ($project->status == '3') cursor-default @endif" @if ($project->status != '3') href="{{ route('projects.show', $project->slug) }}" @endif>
        <small class="@if ($project->status == '1')
            bg-yellow-500
        @elseif ($project->status == '2')
            bg-purple-500
        @elseif ($project->status == '3')
            bg-red-500
        @elseif ($project->status == '4')
            bg-blue-500
        @elseif ($project->status == '5')
            bg-green-500
        @endif py-1 px-2 rounded text-white">
            Estado: 
            @switch($project->status)
                @case(1)
                    Pendiente
                    @break
                @case(2)
                    Aprobado
                    @break
                @case(3)
                    Cancelado
                    @break
                @case(4)
                    En proceso
                    @break
                @case(5)
                    Finalizado
                    @break
                @default
                    
            @endswitch
        </small>
        <h3 class="mt-2 text-xl font-bold text-white">
            {{ $project->title }}
        </h3>
        <p class="mt-2 text-sm text-gray-500">
            {{ $project->description }}
        </p>
    </a>
</div>