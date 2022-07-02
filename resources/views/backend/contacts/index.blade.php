<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Equipe') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="py-8">
                        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                            <h2 class="text-2xl leading-tight">
                                Contacts
                            </h2>
                            <div class="text-end">
                                <form
                                    method="GET"
                                    class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center"
                                >
                                    <div class=" relative ">
                                        <input
                                            name="filter"
                                            type="text"
                                            id="&quot;form-subscribe-Filter"
                                            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-zen-lightblue-600 focus:border-transparent"
                                            placeholder="Nom/Prénom d'un membre..."
                                            value="{{$filter}}"
                                        />
                                    </div>
                                    <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-lightblue-600 rounded-lg shadow-md hover:bg-zen-lightblue-700 focus:outline-none focus:ring-2 focus:ring-zen-lightblue-500 focus:ring-offset-2 focus:ring-offset-zen-lightblue-200" type="submit">
                                        Filtrer
                                    </button>
                                    <a href="/backend/yogas" class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-brown-600 rounded-lg shadow-md hover:bg-zen-brown-700 focus:outline-none focus:ring-2 focus:ring-zen-brown-500 focus:ring-offset-2 focus:ring-offset-zen-brown-200" type="submit">
                                        Réinitialiser
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal" id="datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Nom
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Email
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Tél.
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Messages
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Date d'envoi
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                {{ $contact->nom }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                {{ $contact->email }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                {{ $contact->tel }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <span class="description" data-tippy-content="{{ $contact->message }}">
                                                    {{ substr($contact->message, 0, 40) }}...
                                                </span>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <span class="momentJs">{{ $contact->created_at }}</span>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <div class="p-2">
                                        {{ $contacts->links() }}
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>

                    <x-backend.delete-modal/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
