<x-app-layout>
    @section('title', $avis->nom .' • ')
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a
                    class="text-gray-500 dark:text-gray-100 hover:text-gray-700 dark:hover:text-white mx-4"
                    href="/backend/reviews"
                >
                    <i class="fa fa-chevron-left"></i>
                </a>
                Avis par {{ __($avis->nom) }}</a>
            </h2>
            <div class="flex items-center">
                @if($avis->is_active)
                    <a href="{{ route('reviews.backend.switchValidation', $avis->id) }}">
                        <button type="button" class="border py-2 px-4 flex justify-center items-center bg-zen-blue hover:bg-zen-blue-600 text-black w-full transition ease-in duration-200 text-center text-white font-semibold shadow-md rounded-lg ">
                            <i class="fa fa-times"></i>&nbsp
                            Invalider
                        </button>
                    </a>
                @else
                    <a href="{{ route('reviews.backend.switchValidation', $avis->id) }}">
                        <button type="button" class="border py-2 px-4 flex justify-center items-center bg-zen-blue hover:bg-zen-blue-600 text-black w-full transition ease-in duration-200 text-center text-white font-semibold shadow-md rounded-lg ">
                            <i class="fa fa-check"></i>&nbsp
                            Valider
                        </button>
                    </a>
                @endif
                <a>
                    <button type="button" onclick="toggleModal('modal-delete')" class="border py-2 px-4 flex justify-center items-center bg-zen-brown hover:bg-zen-brown-600 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg ">
                        <i class="fa fa-trash"></i>&nbsp
                        Supprimer
                    </button>
                </a>
            </div>
        </div>
    </x-slot>
    @push('styles')
        <style>
            /* Toggle A */
            input:checked ~ .dot {
                transform: translateX(100%);
                background-color: #48bb78;
            }
        </style>
    @endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <section class="py-12 bg-gray-50 overflow-hidden md:py-20 lg:py-24">
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <svg class="absolute top-full right-full transform translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-workcation">
                        <title id="svg-workcation">Workcation</title>
                        <defs>
                            <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
                    </svg>

                    <div class="relative">
                        <img class="mx-auto" src="{{asset('images/logo3.png')}}" alt="" style="width:100px; height:auto;">
                        <blockquote class="mt-10">
                            <div class="max-w-3xl mx-auto text-center text-2xl leading-9 font-medium text-gray-900">
                                <p>&ldquo;{{ $avis->message }}&rdquo;</p>
                            </div>
                            <footer class="mt-8">
                                <div class="md:flex md:items-center md:justify-center">
                                    <div class="md:flex-shrink-0">
                                        <i class="text-zen-lightblue-600 fa fa-2x fa-user"></i>
                                    </div>
                                    <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                                        <div class="text-base font-medium text-gray-500">{{ $avis->nom }}</div>

                                        <svg class="hidden md:block mx-1 h-5 w-5 text-zen-brown-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M11 0h3L9 20H6l5-20z" />
                                        </svg>

                                        <div class="text-base font-medium text-zen-brown-600">{{ $avis->disciplineObj->intitule }}</div>

                                        <svg class="hidden md:block mx-1 h-5 w-5 text-zen-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M11 0h3L9 20H6l5-20z" />
                                        </svg>

                                        <div class="text-base font-medium text-zen-blue-500 fromNowMomentJs">{{ $avis->created_at }}</div>
                                    </div>
                                </div>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <x-backend.edit-modal :intitule="$avis->nom" objet="reviews" :id="$avis->id" />

</x-app-layout>
