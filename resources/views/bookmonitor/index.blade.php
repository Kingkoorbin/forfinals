<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Request Monitoring') }}
        </h2>
    </x-slot>
<div class="py-12 flex justify-center items-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-center">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" href="{{ route('bookmonitor-add') }}">Add Request</a>
                </div>
                <div class="flex justify-center">
                <h6 class="mt-4 text-2xl font-bold">{{ __('List of Request') }}</h6><br><br><br>
                </div>
                <table class="table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="border border-gray-500 px-4 py-2 text-center">{{ __('Date Requested') }}</th>
                            <th class="border border-gray-500 px-4 py-2 text-center">{{ __('Particulars') }}</th>
                            <th class="border border-gray-500 px-4 py-2 text-center">{{ __('Department') }}</th>
                            <th class="border border-gray-500 px-4 py-2 text-center">{{ __('Status') }}</th>
                            <th class="border border-gray-500 px-4 py-2 text-center">{{ __('Remarks') }}</th>
                            <th class="mr-2"></th>
                            <!-- <th class="border border-gray-500 px-4 py-2 text-center">{{ __('View') }}</th> -->
                            <th class="border border-gray-500 px-4 py-2 text-center">{{ __('Edit') }}</th>
                            <th class="border border-gray-500 px-4 py-2 text-center">{{ __('Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookmonitor as $bookmon)
                            <tr>
                                <td class="border border-gray-500 px-4 py-2 text-center">{{ date("F j, Y", strtotime($bookmon->date)) }}</td>
                                <td class="border border-gray-500 px-4 py-2 text-center">{{ $bookmon->particulars }}</td>
                                <td class="border border-gray-500 px-4 py-2 text-center">{{ $bookmon->department }}</td>
                                <td class="border border-gray-500 px-4 py-2 text-center">
                                        @php
                                            $statusColor = '';
                                            switch($bookmon->status) {
                                                case 'Approved':
                                                    $statusColor = 'bg-green-500';
                                                    break;
                                                case 'Pending':
                                                    $statusColor = 'bg-yellow-500';
                                                    break;
                                                case 'Received':
                                                    $statusColor = 'bg-blue-500';
                                                    break;
                                                case 'Declined':
                                                    $statusColor = 'bg-red-500';
                                                    break;
                                                default:
                                                    $statusColor = 'bg-gray-500';
                                            }
                                        @endphp
                                        <span class="px-2 py-1 rounded text-white {{ $statusColor }}">{{ $bookmon->status }}</span>
                                    </td>
                                <td class="border border-gray-500 px-4 py-2 text-center">{{ $bookmon->remarks }}</td>
                                <td class="mr-2"></td>
                                <!-- <td class="border border-gray-500 px-4 py-2 text-center">
                                    <a class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded mr-2" href="{{ route('bookmonitor-show', ['bno' => $bookmon->bno]) }}">{{ __('View') }}</a>
                                </td> -->
                                <td class="border border-gray-500 px-4 py-2">
                                <a class="bg-violet-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2" href= "{{route('bookmonitor-edit', ['bno' => $bookmon->bno]) }}">{{ __('Edit') }}</a>
                                </td>
                                <td class="border border-gray-500 px-4 py-2">
                                <form method="POST" action = "{{ route('bookmonitor-delete', ['bno' => $bookmon->bno ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">@csrf
                                    @method('delete')
                                <button class=" bg-[#991b1b] hover:bg-[#ef4444] text-white font-bold py-2 px-4 rounded mr-2" type="submit" >{{ __('Delete') }}</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
