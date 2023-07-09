<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                        Facturas / Recibos
                    </h1>
                </div>
            </div>
            <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25  p-6 lg:p-8">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                                {{-- Table header --}}
                                <div class="py-3 px-4">
                                    <div class="relative max-w-xs">
                                        <label for="hs-table-with-pagination-search" class="sr-only">Search</label>
                                        <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search" class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="Search for items">
                                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
                                            <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                {{-- Table --}}
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="py-3 px-4 pr-0">
                                                    <div class="flex items-center h-5">
                                                        <input id="hs-table-pagination-checkbox-all" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                        <label for="hs-table-pagination-checkbox-all" class="sr-only">Checkbox</label>
                                                    </div>
                                                </th>
                                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"></th> --}}
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Project</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Download</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach ($invoices as $key => $invoice)
                                                <tr>
                                                    <td class="py-3 pl-4">
                                                        <div class="flex items-center h-5">
                                                            <input id="hs-table-pagination-checkbox-1" type="checkbox" class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                            <label for="hs-table-pagination-checkbox-1" class="sr-only">Checkbox</label>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"> {{ $invoice->id }} </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> {{ $invoice->company->name }} </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> 
                                                        {{-- Limitar el tamañ del titulo a 20 caracteres --}}
                                                        @if (strlen($invoice->project->title) > 20)
                                                            {{ substr($invoice->project->title, 0, 20) }}...
                                                        @else
                                                            {{ $invoice->project->title }}
                                                        @endif
                                                        
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> S/ {{ $invoice->amount }} </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-500">
                                                        <a href="{{ $invoice->pdf }}" class="text-gray-400 hover:text-gray-200 @if ($invoice->pdf == null) opacity-50 @endif" target="_blank">PDF</a> |
                                                        <a href="{{ $invoice->xml }}" class="text-gray-400 hover:text-gray-200 @if ($invoice->xml == null) opacity-50 @endif" target="_blank">XML</a> </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"> <x-status-invoice :status="$invoice->status" /> </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Pagination --}}
                                <div class="py-1 px-4">
                                    {{$invoices->links()}}
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
