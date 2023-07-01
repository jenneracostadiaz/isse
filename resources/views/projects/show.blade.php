<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700 flex flex-col-reverse sm:flex-row justify-between">
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                        {{ $project->title }}
                    </h1>
                    <x-status-project :project="$project" />
                </div>
            </section>
            <section class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 lg:gap-8 p-6 lg:p-8">
                <p class="text-gray-500 dark:text-gray-300">
                    {{ $project->description }}
                </p>
            </section>
            <section class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 lg:gap-8 px-6 lg:px-8">
                <h2 class="text-white text-3xl">
                    Cambia el estado del proyecto
                </p>
            </section>
            <section class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 lg:gap-8 p-6 lg:p-8 grid grid-cols-3 sm:grid-cols-5 gap-6">
                @foreach ($typesStatus as $key => $status)
                    <button class="
                        relative mx-auto rounded-full h-[120px] w-[120px] flex justify-center items-center text-white border border-2 hover:opacity-100 transition duration-500 ease-in-out cursor-pointer
                        @if ($status == 'PENDING') bg-gray-600 border-gray-400 
                        @elseif ($status == 'APPROVED') bg-yellow-600 border-yellow-400
                        @elseif ($status == 'REJECTED') bg-red-600 border-red-400
                        @elseif ($status == 'INITIALIZED') bg-blue-600 border-blue-400
                        @elseif ($status == 'DONE') bg-green-600 border-green-400
                        @endif
                        @if ($project->status != $key) opacity-50 @endif
                    ">
                            {{$status}}
                    </button>
                @endforeach
            </section>
            <section class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 lg:gap-8 px-6 lg:px-8">
                <h2 class="text-white text-3xl">
                    Presupuestos
                </p>
            </section>
            <section class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 lg:gap-8 p-6 lg:p-8">
                
            </section>
        </div>
    </div>
</x-app-layout>
