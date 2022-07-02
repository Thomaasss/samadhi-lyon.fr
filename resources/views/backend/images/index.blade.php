 <!-- This is an example component -->
    <body x-data="imageGallery()"
          x-init="fetch('https://pixabay.com/api/?key=15819227-ef2d84d1681b9442aaa9755b8&q=woman+girl+food&image_type=all&per_page=52&')
          .then(response => response.json())
          .then(response => { images = response.hits })"
          class="bg-white">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="main">
        <div class="px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">

            <!-- hero -->
            <div class="hero">
                <!-- hero headline -->
                <div class="hero-headline flex flex-col items-center justify-center pt-24 text-center">
                    <h1 class=" font-bold text-3xl text-gray-900">Stunning free images & royalty free stock</h1>
                    <p class=" font-base text-base text-gray-600">high quality stock images and videos shared by our talented community.</p>
                </div>

                <!-- image search box -->
                <div class="box pt-6">
                    <div class="box-wrapper">

                        <div class=" bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200">
                            <button @click="getImages()" class="outline-none focus:outline-none"><svg class=" w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                            <input type="search" name="" id="" @keydown.enter="getImages()" placeholder="search for images" x-model="q" class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent">
                            <div class="select">
                                <select name="" id="" x-model="image_type" class="text-sm outline-none focus:outline-none bg-transparent">
                                    <option value="all" selected>All</option>
                                    <option value="photo">Photo</option>
                                    <option value="illustration">Illustration</option>
                                    <option value="vector">Vector</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <section id="photos" class="my-5 grid grid-cols-1 md:grid-cols-4 gap-4">
                    <template x-for="image in images" :key="image.id">
                        <a :href="image.largeImageURL" class="hover:opacity-75 " target="_new"><img class="w-full h-64 object-cover" :src="image.largeImageURL" :alt="image.tags" /></a>
                    </template>
                </section>

            </div>

            <footer class="p-5 text-sm text-gray-600 text-center inline-flex items-center">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart fa-w-16 text-red-600 w-4 h-4 mr-4 align-middle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path></svg>
                <span>Made by <a href="https://tailwindcss.com/" target="_new" class="text-teal-600 font-semibold">tailwindcss</a> & <a href="https://github.com/alpinejs/alpine" target="_new" class="text-teal-600 font-semibold">alpinejs</a></span>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    <script>
        function imageGallery() {
            return {
                images: [],
                api_key : "15819227-ef2d84d1681b9442aaa9755b8",
                q: "",
                image_type: "",
                page: "",
                per_page: 52,
                getImages: async function() {
                    console.log("params", this.q, this.image_type);
                    const response = await fetch(
                        `https://pixabay.com/api/?key=${this.api_key}&q=${
                            this.q
                        }&image_type=${this.image_type}&per_page=${this.per_page}&page=${this.page}`
                    );
                    const data = await response.json();
                    this.images = data.hits;
                }
            };
        }
    </script>
