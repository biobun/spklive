<?php

namespace App\Http\Livewire;

use App\Constants\BanjirDalam;
use App\Constants\BanjirLama;
use App\Constants\Drainase;
use App\Constants\Tekstur;
use App\Models\City;
use App\Models\inputData;
use Illuminate\Http\Request;
use Livewire\Component;

class SpkCreate extends Component
{
    public $drainaseOption;
    public $teksturOption;
    public $banjirDalamOption;
    public $banjirLamaOption;

    public $selectedCity = null;
    public $lahan = 'Lahan 1';
    public $suhu = null;
    public $curahHujan = null;
    public $kelembapan = null;
    public $kedalamanTanah = 50;
    public $keasaman = 7;
    public $drainase = 1;
    public $tekstur = 1;
    public $lereng = 2;
    public $kedalamanBanjir = 1;
    public $lamaBanjir = 1;

    public $guest = false;

    public function mount()
    {
        // dd($this->guest);
        $this->drainaseOption = Drainase::getDrainaseConstant();
        $this->teksturOption = Tekstur::getTeksturConstant();
        $this->banjirDalamOption = BanjirDalam::getBanjirDalamConstant();
        $this->banjirLamaOption = BanjirLama::getBanjirLamaConstant();
        // dd($this->cities);
    }

    public function updatedSelectedCity($id)
    {
        $city = City::where('id', $id)->first();
        $this->suhu = $city->temperature;
        $this->curahHujan = $city->rainfall;
        $this->kelembapan = $city->humidity;
    }

    public function render()
    {
        return view('livewire.spk-create', [
            'cities' => City::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate();
        $spk_id = inputData::create([
            'suhu' => $this->suhu,
            'curah_hujan' => $this->curahHujan,
            'kelembapan' => $this->kelembapan,
            'kedalaman_tanah' => $this->kedalamanTanah,
            'keasaman' => $this->keasaman,
            'drainase' => $this->drainase,
            'tekstur' => $this->tekstur,
            'lereng' => $this->lereng,
            'banjir_dalam' => $this->kedalamanBanjir,
            'banjir_lama' => $this->lamaBanjir,
        ]);


        if ($this->guest == true) {
            # code...
            redirect()->route('spk.guest.details', $spk_id->id)->with('success', 'tanaman berhasil diupdate');
        } else{
            redirect()->route('spk.details', $spk_id->id)->with('success', 'tanaman berhasil diupdate');
        }
        
    }

    public function storeGuest(Request $request)
    {
        // dd($request);
        $this->validate();
        $spk_id = inputData::create([
            'suhu' => $this->suhu,
            'curah_hujan' => $this->curahHujan,
            'kelembapan' => $this->kelembapan,
            'kedalaman_tanah' => $this->kedalamanTanah,
            'keasaman' => $this->keasaman,
            'drainase' => $this->drainase,
            'tekstur' => $this->tekstur,
            'lereng' => $this->lereng,
            'banjir_dalam' => $this->kedalamanBanjir,
            'banjir_lama' => $this->lamaBanjir,
        ]);



        redirect()->route('spk.guest.details', $spk_id->id)->with('success', 'tanaman berhasil diupdate');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        // dd($propertyName);
        info($this->drainase);
    }

    protected function rules()
    {
        return [
            'suhu' => 'required|numeric|min:1',
            'curahHujan' => 'required|numeric|min:1',
            'kelembapan' => 'required|numeric',
            'kedalamanTanah' => 'required|numeric',
            'keasaman' => 'required|numeric',
        ];
    }

    protected $messages = [
        'suhu.required' => 'Data suhu harus diisi.',
        'suhu.numeric' => 'Data suhu harus berupa angka.',
        'suhu.min' => 'Data suhu harus lebih besar dari 0.',
        'curahHujan.required' => 'Data curah hujan harus diisi.',
        'curahHujan.numeric' => 'Data curah hujan harus berupa angka.',
        'curahHujan.min' => 'Data curah hujan harus lebih besar dari 0.',
        'kelembapan.required' => 'Data kelembapan harus diisi.',
        'kelembapan.numeric' => 'Data kelembapan harus berupa angka.',
        'keasaman.required' => 'Data keasaman harus diisi.',
        'keasaman.numeric' => 'Data keasaman harus berupa angka.',
        'kedalamanTanah.required' => 'Data kedalaman tanah harus diisi.',
        'kedalamanTanah.numeric' => 'Data kedalaman tanah harus berupa angka.',

    ];
}
