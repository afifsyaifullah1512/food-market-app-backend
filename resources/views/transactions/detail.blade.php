<!-- resources/views/transactions/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction &raquo; {{ $item->food->name }} by {{ $item->user->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="bg-white overflow-hidden shadow-md rounded-lg">
                    <img src="{{ $item->food->picturePath }}" alt="{{ $item->food->name }}" class="w-full h-32 object-cover rounded-t-lg">
                    <div class="px-4 py-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->food->name }}</h3>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm">Quantity:</span>
                            <span class="font-bold">{{ number_format($item->quantity) }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-sm">Total:</span>
                            <span class="font-bold">{{ number_format($item->total) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm">Status:</span>
                            <span class="font-bold">{{ $item->status }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-md rounded-lg md:w-80 md:self-start">
                    <div class="px-4 py-4">
                        <h3 class="text-xl font-semibold mb-4">User Information</h3>
                        <div class="mb-2">
                            <span class="text-sm">Username:</span>
                            <span class="font-bold">{{ $item->user->name }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm">Email:</span>
                            <span class="font-bold">{{ $item->user->email }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm">City:</span>
                            <span class="font-bold">{{ $item->user->city }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm">Address:</span>
                            <span class="font-bold">{{ $item->user->address }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm">Number:</span>
                            <span class="font-bold">{{ $item->user->houseNumber }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-sm">Phone Number:</span>
                            <span class="font-bold">{{ $item->user->phoneNumber }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-md rounded-lg md:w-80 md:self-start">
                    <div class="px-4 py-4">
                        <h3 class="text-xl font-semibold mb-4">Payment Information</h3>
                        <div class="mb-4">
                            <span class="text-sm">Payment URL:</span>
                            <div class="text-lg">
                                <a href="{{ $item->payment_url }}" class="text-blue-500 hover:underline">{{ $item->payment_url }}</a>
                            </div>
                        </div>
                        <div class="space-x-2">
                            <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'ON_DELIVERY']) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">
                                On Delivery
                            </a>
                            <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'DELIVERED']) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold px-4 py-2 rounded">
                                Delivered
                            </a>
                            <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'CANCELLED']) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded">
                                Cancelled
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
