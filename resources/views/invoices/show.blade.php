<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                <div class="flex items-center justify-between p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <div class="heads">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
                            INVOICE -  @if ($invoice->id < 10)
                            00{{ $invoice->id }}
                        @elseif ($invoice->id < 100)
                            0{{ $invoice->id }}
                        @else
                            {{ $invoice->id }}
                        @endif
                        </h1>
                        <p class="font-medium text-gray-900 dark:text-white">
                            Project: {{ $invoice->project->title }}
                        </p>
                        <p class="font-medium text-gray-900 dark:text-white">
                            Client: {{ $invoice->company->name }}
                        </p>
                    </div>
                    <div class="amounts">
                        <p class="font-medium text-gray-900 dark:text-white">
                            Amount: S/. {{ $invoice->amount }}
                        </p>
                        <p class="font-medium text-gray-900 dark:text-white">
                            Status: {{ $invoice->status }}
                        </p>
                        <p class="font-medium text-gray-900 dark:text-white">
                            Due Date: {{ $invoice->due_date }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <p class="text-2xl font-medium text-gray-900 dark:text-white">
                        {{ $invoice->content }}
                    </p>
                    @php
                        $pdf = 'pdf';
                        $xml = 'xml';
                    @endphp
                    <div class="flex justify-between mt-8">
                        <div class="left">
                            <a href="{{ route('invoices.edit', $invoice) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Edit Invoice
                            </a>
                        </div>
                        <div class="right">
                            <a href="{{ route('invoices.download', [$invoice, $pdf]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Download PDF
                            </a>
                            <a href="{{ route('invoices.download', [$invoice, $xml]) }}" class="ml-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Download XML
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
</x-app-layout>