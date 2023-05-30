<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Monitor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h6>Errors Encountered:</h6>
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <br /><br>
                    <form method="POST" action="{{ route('bookmonitor-store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date Requested:</label>
                                <input type="date" name="xdate" value="{{ old('xdate', date('Y-m-d')) }}" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Particulars" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Particulars:</label>
                                <input type="text" name="xparticulars" value="{{ old('xparticulars') }}" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="department" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Department:</label>
                                <input type="text" name="xdepartment" value="{{ old('xdepartment') }}" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                            <div class="flex flex-col">
                                <label for="Status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status:</label>
                                <select name="xstatus" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                                    <option value="Approved">Approved</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Received">Received</option>
                                    <option value="Declined">Declined</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label for="Remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Remarks:</label>
                                <input type="text" name="xremarks" value="{{ old('xremarks') }}" class="border border-gray-300 px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" />
                            </div>
                        </div><br><br>
                        <div class="flex justify-between">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Add</button>
                            <a href="{{ route('bookmonitor') }}" class="ml-4 inline-block bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
