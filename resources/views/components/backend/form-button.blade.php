@if($type == 'save')
    <button type="button" onclick="toggleModal('modal-save')" style="width:160px;" class="mt-6 py-3 flex justify-center items-center  bg-zen-blue hover:bg-zen-blue-600 focus:ring-zen-blue-500 focus:ring-offset-zen-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg">
        <i class="fa fa-save"></i> &nbsp;
        Sauvegarder
    </button>
@elseif($type == 'delete')
    <button type="button" style="width:160px;" onclick="toggleModal('modal-delete')" class="mt-6 ml-6 py-3 flex justify-center items-center  bg-zen-brown-600 hover:bg-zen-brown-700 focus:ring-zen-brown-500 focus:ring-offset-zen-brown-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
        <i class="fa fa-trash"></i> &nbsp;
        Supprimer
    </button>
@endif
