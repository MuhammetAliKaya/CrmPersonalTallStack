<div>
    <div>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-2">
            <!-- show error -->
            @if ($errors->any())
            <div class="alert alert-danger bg-red-200 my-2 p-2 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flex justify-end my-5">
                <button wire:click="clear()" type="button" data-modal-toggle="create-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-8 ">Create
                    Customer</button>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Surname
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            PhoneNumber
                        </th>
                        <th scope="col" class="py-3 px-6 text-center">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $customer->name }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $customer->surname }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $customer->email }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $customer->phoneNumber }}
                        </td>
                        <td class="py-4 px-6 flex justify-center">
                            <button wire:click="setCurrentCustomer({{$customer->id}})"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button" data-modal-toggle="authentication-modal">
                                Edit
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('modals.customerEditModal')
    @include('modals.customerCreateModal')

</div>