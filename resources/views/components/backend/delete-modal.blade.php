<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-delete">
    <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid rounded-t">
                <h3 class="text-3xl font-semibold" id="delete-modal-intitule">
                    ...
                </h3>
                <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-delete')">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                        ×
                    </span>
                </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                <p class="my-4 text-lg leading-relaxed" id="delete-modal-phrase">
                    ...
                </p>
            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-6 border-t border-solid rounded-b">
                <button
                    type="button"
                    onclick="toggleModal('modal-delete')"
                    style="width:100px;"
                    class="py-2 mr-2 flex justify-center items-center bg-zen-blue-600 hover:bg-zen-blue-700 focus:ring-zen-blue-500 focus:ring-offset-zen-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg"
                >
                    <i class="fa fa-times"></i> &nbsp;
                    Non
                </button>
                <a
                    id="delete-modal-link"
                    style="width:160px;"
                    class="py-2 flex justify-center items-center  bg-zen-brown-600 hover:bg-zen-brown-700 focus:ring-zen-brown-500 focus:ring-offset-zen-brown-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg "
                >
                    <i class="fa fa-save"></i> &nbsp;
                    Oui, supprimer
                </a>
            </div>
        </div>
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-delete-backdrop"></div>
