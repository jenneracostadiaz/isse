@props(['project'])

<div class="group relative rounded-lg flex @if ($project->status == '3') opacity-50 @elseif ($project->status == '5') border border-green-400 @endif" >
    <a class="block w-full relative z-10 rounded-lg bg-slate-900 p-6 sm:p-8 cursor-pointer" href="{{ route('projects.show', $project->slug) }}">
        <x-status-project :project="$project" />
        <h3 class="mt-2 text-xl font-bold text-white">
            {{ $project->title }}
        </h3>
        <p class="mt-2 text-sm text-gray-500">
            {{ $project->description }}
        </p>
    </a>
</div>