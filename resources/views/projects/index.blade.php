<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                        Tus proyectos
                    </h1>
                </div>
            </div>
            <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
                @foreach ($projects as $project)
                    <x-card-project :project="$project" />
                @endforeach
            </div>
            <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25  p-6 lg:p-8">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
