<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-8 bg-white dark:bg-gray-800 rounded-lg shadow">
                        @if(auth()->user()->is_admin)
                            <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                Quelques chiffres
                            </p>
                            <p class="text-center mb-12 text-xl font-normal text-gray-500 dark:text-gray-300">
                                Votre plateforme
                            </p>
                            <div class="m-4 flex flex-1 flex-col md:flex-row lg:flex-row">
                                <div class="bg-zen-blue border-zen-blue-600 hover:border-zen-blue-700 hover:bg-zen-blue-600 shadow-lg border-l-8 mb-2 p-2 md:w-1/4 mx-2">
                                    <div class="p-4 flex flex-col">
                                        <a href="/backend/professionnels" class="no-underline text-white text-2xl">
                                            {{ App\Models\Professionnel::count() }}
                                        </a>
                                        <a href="/backend/professionnels" class="no-underline text-white text-lg">
                                            Professionnels
                                        </a>
                                    </div>
                                </div>

                                <div class="bg-zen-brown border-zen-brown-600 hover:border-zen-brown-700 hover:bg-zen-brown-600 shadow border-l-8 mb-2 p-2 md:w-1/4 mx-2">
                                    <div class="p-4 flex flex-col">
                                        <a href="/backend/yogas" class="no-underline text-white text-2xl">
                                            {{ App\Models\Yoga::count() }}
                                        </a>
                                        <a href="/backend/yogas" class="no-underline text-white text-lg">
                                            Cours de Yoga
                                        </a>
                                    </div>
                                </div>

                                <div class="bg-zen-lightblue border-zen-lightblue-600 hover:border-zen-lightblue-700 hover:bg-zen-lightblue-600 shadow border-l-8 mb-2 p-2 md:w-1/4 mx-2">
                                    <div class="p-4 flex flex-col">
                                        <a href="/backend/therapies" class="no-underline text-white text-2xl">
                                            {{ App\Models\Therapie::count() }}
                                        </a>
                                        <a href="/backend/therapies" class="no-underline text-white text-lg">
                                            Thérapies
                                        </a>
                                    </div>
                                </div>

                                <div class="bg-zen-whiteblue border-zen-whiteblue-600 hover:border-zen-whiteblue-700 hover:bg-zen-whiteblue-600 shadow border-l-8 mb-2 p-2 md:w-1/4 mx-2">
                                    <div class="p-4 flex flex-col">
                                        <a href="/backend/users" class="no-underline text-white text-2xl">
                                            {{ App\Models\User::count() }}
                                        </a>
                                        <a href="/backend/users" class="no-underline text-white text-lg">
                                            Utilisateurs
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                    L'équipe Samādhi
                                </p>
                                <p class="text-center mb-12 text-xl font-normal text-gray-500 dark:text-gray-300">
                                    Professeurs & thérapeutes
                                </p>
                            </div>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                                @foreach(App\Models\Professionnel::all() as $pro)
                                    <a class="p-4" href="/backend/profs/{{ $pro->id }}">
                                        <div class="flex-col  flex justify-center items-center">
                                            <div class="flex-shrink-0">
                                                <div href="#" class="block relative">
                                                    @if($pro->image)
                                                        <img alt="profil" src="{{ $pro->image }}" class="mx-auto object-cover rounded-full h-20 w-20 "/>
                                                    @else
                                                        <div class="m-1 mr-2 w-20 h-20 relative flex justify-center items-center rounded-full bg-blue-500 text-xl text-white uppercase">
                                                            {{ $pro->nom[0] }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mt-2 text-center flex flex-col">
                                            <span class="text-gray-600 dark:text-white text-lg font-medium">
                                                {{ $pro->nom }}
                                            </span>
                                                <span class="text-gray-400 text-xs">
                                                {{ $pro->role }}
                                            </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="mt-5">
                                    <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                        Paramètres généraux
                                    </p>
                                    <p class="text-center mb-12 text-xl font-normal text-gray-500 dark:text-gray-300">
                                        Informations de contact
                                    </p>
                                </div>
                                <form method="POST" enctype="multipart/form-data" action="{{ route('settings.update') }}" class="relative">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center gap-4">
                                        <div class="w-4/12">
                                            <label for="tel_princ" class="text-gray-700">
                                                Téléphone principal
                                            </label>
                                            <input
                                                type="tel"
                                                id="tel_princ"
                                                class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                name="tel_princ"
                                                value="{{ App\Models\Setting::first() ? App\Models\Setting::first()->tel_princ : '' }}"
                                                placeholder="ex : 0123456789"
                                            />
                                        </div>
                                        <div class="w-4/12">
                                            <label for="tel_princ" class="text-gray-700">
                                                Téléphone secondaire
                                            </label>
                                            <input
                                                type="tel"
                                                id="tel_princ"
                                                class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                name="tel_sec"
                                                value="{{ App\Models\Setting::first() ? App\Models\Setting::first()->tel_sec : '' }}"
                                                placeholder="ex : 0123456789"
                                            />
                                        </div>
                                        <div class="w-4/12">
                                            <label for="email" class="text-gray-700">
                                                Email de contact
                                            </label>
                                            <input
                                                type="email"
                                                id="email"
                                                class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                name="email"
                                                value="{{ App\Models\Setting::first() ? App\Models\Setting::first()->email : '' }}"
                                                placeholder="ex : contact@samadhi-lyon.fr"
                                            />
                                        </div>
                                    </div>
                                    <div class="flex flex-nowrap">
                                        <button type="submit" style="width:160px;" class="mt-6 py-3 flex justify-center items-center  bg-zen-blue hover:bg-zen-blue-600 focus:ring-zen-blue-500 focus:ring-offset-zen-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
                                            <i class="fa fa-save"></i> &nbsp;
                                            Sauvegarder
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                Mes cours de Yoga et thérapies
                            </p>
                            <p class="text-center mb-12 text-xl font-normal text-gray-500 dark:text-gray-300">
                                Gérez vos disciplines
                            </p>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                                @foreach(App\Models\Yoga::where('professionnel_id', auth()->user()->professionnel_id)->get() as $pro)
                                    <div class="flex-col p-4 flex justify-center items-center">
                                        <div class="flex-shrink-0">
                                            <a href="/backend/yogas/{{ $pro->id }}">
                                                <div class="block relative">
                                                    @if($pro->image)
                                                        <img alt="profil" src="{{ $pro->image }}" class="mx-auto object-cover rounded-full h-20 w-20 "/>
                                                    @else
                                                        <div class="m-1 mr-2 w-20 h-20 relative flex justify-center items-center rounded-full bg-blue-500 text-xl text-white uppercase">
                                                            {{ $pro->intitule[0] }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mt-2 text-center flex flex-col">
                                            <a href="/backend/therapies/{{ $pro->id }}">
                                                <span class="text-gray-600 dark:text-white text-lg font-medium">
                                                    {{ $pro->intitule }}
                                                </span>
                                            </a>
                                            <a href="/backend/profs/{{ $pro->prof->id }}">
                                                <span class="text-gray-400 text-xs">
                                                    {{ $pro->prof->nom }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach(App\Models\Therapie::where('professionnel_id', auth()->user()->professionnel_id)->get() as $pro)
                                    <div class="flex-col p-4 flex justify-center items-center">
                                        <div class="flex-shrink-0">
                                            <a href="/backend/therapies/{{ $pro->id }}">
                                                <div class="block relative">
                                                    @if($pro->image)
                                                        <img alt="profil" src="{{ $pro->image }}" class="mx-auto object-cover rounded-full h-20 w-20 "/>
                                                    @else
                                                        <div class="m-1 mr-2 w-20 h-20 relative flex justify-center items-center rounded-full bg-blue-500 text-xl text-white uppercase">
                                                            {{ $pro->intitule[0] }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mt-2 text-center flex flex-col">
                                            <a href="/backend/therapies/{{ $pro->id }}">
                                                <span class="text-gray-600 dark:text-white text-lg font-medium">
                                                    {{ $pro->intitule }}
                                                </span>
                                            </a>
                                            <a href="/backend/profs/{{ $pro->prof->id }}">
                                                <span class="text-gray-400 text-xs">
                                                    {{ $pro->prof->nom }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                                <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                    Statistiques du site web
                                </p>
                                <p class="text-center mb-12 text-xl font-normal text-gray-500 dark:text-gray-300">
                                    Page visitées et visiteurs du dernier mois
                                </p>
                                <canvas class="p-10 pt-0" id="chartLine"></canvas>
                                <table class="leading-normal w-full" id="datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Url
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Page
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Vues
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mostVisitedPages as $mostVisitedPage)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                {{ $mostVisitedPage['url'] }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                {{ $mostVisitedPage['pageTitle'] }}
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                {{ $mostVisitedPage['pageViews'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Required chart.js -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            <!-- Chart line -->
                            <script>
                                const labels = [
                                    @foreach($analyticsData as $data)
                                    {!! '"'. App\Models\Utils::dateTimeUsToDateFr($data['date']) .'", ' !!}
                                    @endforeach
                                ];
                                const data = {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: "Visiteurs",
                                            backgroundColor: "#c7988d",
                                            borderColor: "#c7988d",
                                            data: [
                                                @foreach ($analyticsData as $data)
                                                {{ $data['visitors'] .', ' }}
                                                @endforeach
                                            ],
                                        }, {
                                            label: "Page visitées",
                                            backgroundColor: "#577377",
                                            borderColor: "#577377",
                                            data: [
                                                @foreach ($analyticsData as $data)
                                                {{ $data['pageViews'] .', ' }}
                                                @endforeach
                                            ],
                                        },
                                    ],
                                };

                                const configLineChart = {
                                    type: "line",
                                    data,
                                    options: {},
                                };

                                var chartLine = new Chart(
                                    document.getElementById("chartLine"),
                                    configLineChart
                                );
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
