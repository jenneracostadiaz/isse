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
                                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
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
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                        <a href=" # " class="text-blue-600 hover:text-blue-900">
                                                            {{ $invoice->id }} 
                                                        </a>
                                                    </td>
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
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-center">
                                                        <a href="#">
                                                            <svg class="fill-gray-200 hover:fill-gray-50" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.08438 5.20312L2.50313 11.7844C2.33438 11.9531 2.25 12.1219 2.25 12.375V14.9062C2.25 15.4125 2.5875 15.75 3.09375 15.75H5.625C5.87813 15.75 6.04687 15.6656 6.21562 15.4969L12.7969 8.91563L9.08438 5.20312Z"/>
                                                                <path d="M15.4969 5.03437L12.9656 2.50313C12.6281 2.16563 12.1219 2.16563 11.7844 2.50313L10.2656 4.02187L13.9781 7.73438L15.4969 6.21562C15.8344 5.87812 15.8344 5.37187 15.4969 5.03437Z"/>
                                                            </svg>                                                                
                                                        </a>
                                                        <span class="text-gray-600 mx-2"> | </span>
                                                        <a href="#">
                                                            <svg class="fill-red-500 hover:fill-red-700" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.9375 14.0625V6.75H14.0625V14.0625C14.0625 14.9945 13.307 15.75 12.375 15.75H5.625C4.69302 15.75 3.9375 14.9945 3.9375 14.0625ZM6.1875 12.9375H7.3125V9H6.1875V12.9375ZM9.5625 12.9375H8.4375V9H9.5625V12.9375ZM10.6875 12.9375H11.8125V9H10.6875V12.9375Z"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8125 4.5H15.1875C15.4982 4.5 15.75 4.75184 15.75 5.0625C15.75 5.37316 15.4982 5.625 15.1875 5.625H2.8125C2.50184 5.625 2.25 5.37316 2.25 5.0625C2.25 4.75184 2.50184 4.5 2.8125 4.5H6.1875V2.8125C6.1875 2.50184 6.43934 2.25 6.75 2.25H11.25C11.5607 2.25 11.8125 2.50184 11.8125 2.8125V4.5ZM10.6875 3.375H7.3125V4.5H10.6875V3.375Z"/>
                                                            </svg>
                                                        </a>

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
