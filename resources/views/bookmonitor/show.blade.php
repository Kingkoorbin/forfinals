<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">

                    <h6>Request</h6><br />
                    <table class="table-auto border border-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border border-gray-800">Date</th>
                                <th class="px-4 py-2 border border-gray-800">Particulars</th>
                                <th class="px-4 py-2 border border-gray-800">Department</th>
                                <th class="px-4 py-2 border border-gray-800">Status</th>
                                <th class="px-4 py-2 border border-gray-800">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookmonitor as $bookmon)
                            <tr>
                                <td class="px-4 py-2 border border-gray-800">{{$bookmon->date}}</td>
                                <td class="px-4 py-2 border border-gray-800">{{$bookmon->particulars }}</td>
                                <td class="px-4 py-2 border border-gray-800">{{$bookmon->department }}</td>
                                <td class="px-4 py-2 border border-gray-800">{{$bookmon->status }}</td>
                                <td class="px-4 py-2 border border-gray-800">{{ $bookmon->remarks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a class="mt-4 float-left bg-blue-200 text-black font-bold py-2 px-4 rounded" href="{{route('bookmonitor')}}"> Back </a>
                    <br /><br /><br />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
