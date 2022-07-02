<?php

namespace App\Http\Livewire\Therapies;

use App\Models\Therapie;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Edit extends Component
{
    use WithFileUploads;

    public $icon;
    public $intitule;
    public $image;
    public $description;
    public $tarifsList = array();
    public $tarifsCounter = 0;
    public $professionnel;
    public Therapie $therapie;
    public $tags;

    protected $rules = [
        'reference' => 'required|string',
        'intitule' => 'required|string|min:3',
    ];

    public function mount($therapie)
    {
        $this->therapie = $therapie;
        $this->intitule = $therapie->intitule;
        $this->icon = $therapie->icon_id;
        $this->image = $therapie->image;
        $this->professionnel = $therapie->professionnel_id;
        $this->description = $therapie->description;
        foreach($this->therapie->tarifs as $tarif) {
            $this->fillTarif($tarif->intitule, $tarif->prix_ttc, $tarif->duree, $tarif->is_devis);
        }
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function submitForm() {

        $this->validate();

        $this->formation->update([
            'reference' => $this->reference,
            'intitule' => $this->intitule,
            'type' => $this->type,
            'ext_client_id' => $this->client,
            'ext_affaire_id' => $this->affaire,
            'int_formation_id' => $this->formation_algoe,
            'created_by' => auth()->user()->id,
            'objectifs' => $this->objectifs,
        ]);

        foreach($this->tarifsList as $doc) {
            if(!is_null($doc['chemin']) && !is_null($doc['intitule'])) {
                $fileName = time().'_'.$doc['chemin']->getClientOriginalName();
                $filePath = $doc['chemin']->storeAs('uploads', $fileName, 'public');

                DB::table('documents')->insert([
                    'formation_id' => $el->id,
                    'intitule' => $doc['intitule'],
                    'chemin' => $filePath,
                ]);
                $el->update([
                    'image' => '/storage/' . $filePath
                ]);
            }
        }

        $this->success = 'Formation '. $this->intitule .' créée avec succès';

        session()->flash('success', 'Nouvelle formation créée');

        if($this->action == 'next') {
            return redirect()->to('/formations/'. $el->id .'/recueil');
        } else {
            return redirect()->to('/formations');
        }
    }

    public function resetForm() {

    }

    public function addTarif() {
        array_push($this->tarifsList, [
            'key' => $this->tarifsCounter,
            'intitule' => '',
            'prix_ttc' => NULL,
            'duree' => '',
            'is_devis' => NULL,
            'from_backend' => 1
        ]);
        $this->tarifsCounter++;
    }

    public function fillTarif($intitule, $prix_ttc, $duree, $is_devis) {
        array_push($this->tarifsList, [
            'key' => $this->tarifsCounter,
            'intitule' => $intitule,
            'prix_ttc' => $prix_ttc,
            'duree' => $duree,
            'is_devis' => $is_devis,
            'from_backend' => 1
        ]);
        $this->tarifsCounter++;
    }

    public function removeTarif($key) {
        unset($this->tarifsList[$key]);
    }

    public function render()
    {
        return view('livewire.therapies.edit');
    }
}
