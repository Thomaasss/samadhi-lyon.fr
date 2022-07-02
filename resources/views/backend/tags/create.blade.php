<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nouveau tag
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" enctype="multipart/form-data" action="{{ route('tags.store') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" relative ">
                        <div class="flex items-center gap-4">
                            <div class="w-4/12">
                                <label for="name-with-label" class="text-gray-700">
                                    Tag
                                </label>
                                <input
                                    type="text"
                                    id="name-with-label"
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="intitule"
                                    placeholder="ex : bien-être"
                                />
                            </div>
                        </div>
                        <div class="flex flex-nowrap">
                            <x-backend.form-button type="save" />
                        </div>
                    </div>
                </div>
                <x-backend.create-modal intitule="un nouveau tag" />
            </form>
        </div>
    </div>
</x-app-layout>
