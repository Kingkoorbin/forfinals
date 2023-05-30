<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Request Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @foreach($bookmonitor as $bookmon)
                    <form method="POST" action="{{ route('bookmonitor-update',['bno' => $bookmon->bno]) }}">
                        @csrf
                        @method('patch')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="Date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date:</label>
                                <input type="date" name="xdate" value="{{ $bookmon->date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                            <div>
                                <label for="Particulars" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Particulars:</label>
                                <input type="text" name="xparticulars" value="{{ $bookmon->particulars }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                            <div>
                                <label for="Department" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Department:</label>
                                <input type="text" name="xdepartment" value="{{ $bookmon->department }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                            <div>
                                <label for="Status" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Status:</label>
                                <select name="xstatus" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                                <option value="Approved" {{ $bookmon->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Pending" {{ $bookmon->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Received" {{ $bookmon->status === 'Received' ? 'selected' : '' }}>Received</option>
                                <option value="Declined" {{ $bookmon->status === 'Declined' ? 'selected' : '' }}>Declined</option>
                                </select>
                            </div>
                            <div>
                                <label for="Remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Remarks:</label>
                                <input type="text" name="xremarks" value="{{ $bookmon->remarks }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-600">
                            </div>
                        </div><br><br>
                        <div class="flex justify-between">
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500"> Submit</button>
                        <a class="ml-4 inline-block bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded" href="{{route('bookmonitor')}}"> Back </a>

                        <!-- </div>
                        <div class="flex justify-start mt-4">

                        </div>
                        <div class="flex justify-end mt-4">

                        </div> -->


                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
