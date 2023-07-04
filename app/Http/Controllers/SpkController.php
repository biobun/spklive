<?php

namespace App\Http\Controllers;

use App\Constants\BanjirDalam;
use App\Constants\BanjirLama;
use App\Constants\Drainase;
use App\Constants\Tekstur;
use App\Models\inputData;
use App\Models\KecocokanLahan;
use App\Models\Kriteria;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    //
    public $arrayKriteria;
    // public $dataDrainase = Drainase::getDrainaseConstant();
    // public $dataTekstur = Tekstur::getTeksturConstant();

    function setArrayKriteria(){
        $kriterias = Kriteria::all();
        $arrayKriteria = [];
        foreach ($kriterias as $kriteria) {
            # code...
            $arrayKriteria[$kriteria->col_name] = [
                'id' => $kriteria->id,
                'bobot' => $kriteria->bobot,
            ];
        }     
        $this->arrayKriteria = $arrayKriteria;   
    }

    public function create()
    {
        //
        return view('spks.create');
    }



    public function getNilaiKriteriaAngka($tanaman, $nilaiInput, $namaKriteria)
    {
        $nilaiOutput = 0;
        foreach ($tanaman->kecocokans()->where('kriteria_id',$this->arrayKriteria[$namaKriteria]['id'])->orderBy('kecocokan', 'desc')
        ->get() as $kecocokanLahan) {
            $valueArray = explode(';', $kecocokanLahan->value);
            // [18, 20, 30, 35]
            $nilaiOutput = $this->getNilaiAngka($nilaiInput, $kecocokanLahan->value_type, $valueArray, $kecocokanLahan->kecocokan);                
            if($nilaiOutput > 0){
                break;
            }
        }
        return $nilaiOutput;
    }

    public function getNilaiAngka($nilaiInput, $value_type, $valueArray, $kecocokan){
        $nilaiOutput = 0;
        // [18, 20, 30, 35]
        switch ($value_type) {
            case '1':
                # Range Suhu  18 - 20 
                if ($valueArray[0] <= $nilaiInput && $nilaiInput <= $valueArray[1]) {
                    $nilaiOutput = $kecocokan;
                }
                break;
            case '2':
                # Range Suhu  22 - 29  dan 32 -35
                if (($valueArray[0] <= $nilaiInput && $nilaiInput <= $valueArray[1])||($valueArray[2] <= $nilaiInput && $nilaiInput <= $valueArray[3])) {
                    $nilaiOutput = $kecocokan;
                }
                break;
            case '3':
                # Range Suhu  Lebih kecil dari 22 
                if ($nilaiInput < $valueArray[0]) {
                    $nilaiOutput = $kecocokan;
                }
                break;
            case '4':
                # Range Suhu  Lebih besar dari 22 
                if ($nilaiInput > $valueArray[1]) {
                    $nilaiOutput = $kecocokan;
                }
                break;
            case '5':
                # Range Suhu  Lebih besar dari 22  dan Lebih kecil dari 22
                if ($nilaiInput < $valueArray[0] || $nilaiInput > $valueArray[1]) {
                    $nilaiOutput = $kecocokan;
                }
                break;                    
        }
        return $nilaiOutput;
    }

    public function getNilaiKriteriaPilihan($tanaman, $nilaiInput, $namaKriteria, $dataPilihan)
    {
        $nilaiOutput = 0;
        // info($dataPilihan[$nilaiInput]);
        foreach ($tanaman->kecocokans()->where('kriteria_id',$this->arrayKriteria[$namaKriteria]['id'])->orderBy('kecocokan', 'desc')
        ->get() as $kecocokanLahan) {
            $valueArray = explode(';', $kecocokanLahan->value);
            // info($valueArray);
            // $valueArray = [0,0,1,0,0,0,0,1]
            //$valueArray[2] = 1
            // Mencocokan urutan pilihan dengan input pilihan
            
            // foreach($valueArray as $key => $value){
            //     if($key == $nilaiInput){
            //         if($value == 1){
            //             //  cocok;
            //             $nilaiOutput = $kecocokanLahan->kecocokan;
            //         } else {
            //             // tidak cocok;
            //         }
            //     }
            // }
            // info($sameIndex);
            $sameIndex = $valueArray[$nilaiInput];
            if ($sameIndex) {
                // info('same index');
                $nilaiOutput = $kecocokanLahan->kecocokan;
            }            
            if($nilaiOutput > 0){
                break;
            }
        }
        return $nilaiOutput;
    }

    public function getNilaiKriteriaPilihan2($tanaman, $nilaiInput, $namaKriteria)
    {
        $nilaiOutput = 0;
        // info($dataPilihan[$nilaiInput]);
        foreach ($tanaman->kecocokans()->where('kriteria_id',$this->arrayKriteria[$namaKriteria]['id'])->orderBy('kecocokan', 'desc')
        ->get() as $kecocokanLahan) {
            $value =$kecocokanLahan->value;
            // info($value);
            // info($nilaiInput);
            if ($nilaiInput == $value) {
                $nilaiOutput = $kecocokanLahan->kecocokan;
            }            
            if($nilaiOutput > 0){
                break;
            }
        }
        return $nilaiOutput;
    }
    

    public function show($id)
    {
        $this->setArrayKriteria();
        $spk = inputData::where('id', $id)->first();

        $kriterias = Kriteria::all();
        $tanamans = Tanaman::all();

        $spkSuhu = $spk->suhu;
        $spkKelembapan = $spk->kelembapan;
        $spkDrainase = $spk->drainase;
        $spkKedalamanTanah = $spk->kedalaman_tanah;
        $spkLereng = $spk->lereng;
        $spkKeasaman = $spk->keasaman;
        $spkTekstur = $spk->tekstur;
        $spkBanjir = implode(';', [$spk->banjir_dalam, $spk->banjir_lama]);

        $dataDrainase = Drainase::getDrainaseConstant();
        $dataTekstur = Tekstur::getTeksturConstant();
        $dataBanjirDalam = BanjirDalam::getBanjirDalamConstant();
        $dataBanjirLama = BanjirLama::getBanjirLamaConstant();

        $nilaiTanamans = [];
        foreach ($tanamans as $tanaman) {
            $tanaman_id = $tanaman->id;
            // info('============');
            // info($tanaman->name);
            $nilaiSuhu = $this->getNilaiKriteriaAngka($tanaman,$spkSuhu,'suhu');
            $nilaiKelembapan = $this->getNilaiKriteriaAngka($tanaman,$spkKelembapan, 'kelembapan');
            $nilaiKedalamanTanah = $this->getNilaiKriteriaAngka($tanaman,$spkKedalamanTanah, 'kedalaman_tanah');
            $nilaiLereng = $this->getNilaiKriteriaAngka($tanaman,$spkLereng, 'lereng');
            $nilaiKeasaman = $this->getNilaiKriteriaAngka($tanaman,$spkKeasaman, 'keasaman');
            $nilaiDrainase = $this->getNilaiKriteriaPilihan($tanaman,$spkDrainase, 'drainase', $dataDrainase);
            $nilaiTekstur = $this->getNilaiKriteriaPilihan($tanaman,$spkTekstur, 'tekstur', $dataTekstur);
            $nilaiBanjir = $this->getNilaiKriteriaPilihan2($tanaman,$spkBanjir, 'bahaya_banjir');
            // $nilaiBanjirDalam = $dataBanjirDalam[$spkBanjirDalam];
            // $nilaiBanjirLama = $dataBanjirLama[$spkBanjirLama];
            $nilaiTanamans[$tanaman_id] = [
                'nama' => $tanaman->name,
                'suhu' => $nilaiSuhu,
                'kelembapan'=> $nilaiKelembapan,
                'drainase'=> $nilaiDrainase,
                'tekstur'=> $nilaiTekstur,
                'kedalaman_tanah'=> $nilaiKedalamanTanah,
                'keasaman'=> $nilaiKeasaman,
                'lereng'=> $nilaiLereng,
                'bahaya_banjir' => $nilaiBanjir,
            ];
        }
        // dd($nilaiTanamans);

        $arrayKriteria = ['suhu', 'kelembapan', 'drainase', 'tekstur', 'kedalaman_tanah', 'keasaman', 'lereng', 'bahaya_banjir'];

        $nilaiMaksimal = [];
        foreach ($arrayKriteria as $value) {
            $nilaiMaksimal[$value] = 0;
        }

        foreach ($nilaiTanamans as $key => $dataNilai) {
            foreach ($arrayKriteria as $namaKriteria) {
                // info($namaKriteria);
                $nilaiMax = $nilaiMaksimal[$namaKriteria];
                if ($nilaiMax < $dataNilai[$namaKriteria]) {
                    $nilaiMaksimal[$namaKriteria] = $dataNilai[$namaKriteria];
                }
            }
        }

        // info($nilaiMaksimal);

        $nilaiNormalisaliTanamans = [];
        foreach ($nilaiTanamans as $key => $dataNilai) {
            // $nilaiNormalisaliTanamans[$key] = [];
            $nilaiNormalisaliTanamans[$key] = ['nama' => $dataNilai['nama']];
            foreach ($arrayKriteria as $namaKriteria) {
                // info($namaKriteria);
                $nilaiMax = $nilaiMaksimal[$namaKriteria];
                if ($nilaiMax > 0) {
                    $nilaiNormalisaliTanamans[$key][$namaKriteria] = round($dataNilai[$namaKriteria] / $nilaiMax, 2);
                } else{
                    $nilaiNormalisaliTanamans[$key][$namaKriteria] = 0;
                }
                
            }
        }
        // info($nilaiNormalisaliTanamans);

        $nilaiPembobotanTanamans = [];
        foreach ($nilaiNormalisaliTanamans as $key => $dataNilai) {
            // $nilaiPembobotanTanamans[$key] = [];
            $nilaiPembobotanTanamans[$key] = ['nama' => $dataNilai['nama']];
            foreach ($arrayKriteria as $namaKriteria) {
                // info($namaKriteria);
                $nilaiPembobotanTanamans[$key][$namaKriteria] = $dataNilai[$namaKriteria] * $this->arrayKriteria[$namaKriteria]['bobot'] / 100;
            }
        }
        // info($nilaiPembobotanTanamans);

        $nilaiTotalTanamans = [];
        foreach ($nilaiPembobotanTanamans as $key => $dataNilai) {
            // $nilaiPembobotanTanamans[$key] = [];
            $nilaiTotalTanamans[$key] = [
                'nama' => $dataNilai['nama'],
                'nilai' => 0,
            ];
            foreach ($dataNilai as $namaKriteria => $nilai) {
                if ($namaKriteria != 'nama') {
                    // info('nilai : '.$nilai);
                    $nilaiTotalTanamans[$key]['nilai'] =round($nilaiTotalTanamans[$key]['nilai'] + $nilai, 2);
                }
                
                
            }
        }
        // info($nilaiTotalTanamans);
        // usort($nilaiTotalTanamans, fn($a, $b) => $a['nilai'] <=> $b['nilai']);
        array_multisort(array_column($nilaiTotalTanamans, "nilai"),SORT_DESC, $nilaiTotalTanamans);

        // $dataNilai = [
        //     'suhu'=> 3,
        //     'kelembapan'=> 3,
        //     'drainase'=> 3,
        //     'tekstur'=> 3,
        //     'kedalaman_tanah'=> 3,
        //     'keasaman'=> 3,
        //     'lereng'=> 3,
        //     'bahaya_banjir'=> 3,
        // ];
        // info($this->arrayKriteria);

        // dd($spk);

        return view('spks.show', [
            'spk' => $spk,
            'kriterias' => $kriterias,
            // 'tanamans' => $tanamans,
            'dataNilai' => $dataNilai,
            'nilaiTanamans' => $nilaiTanamans,
            'nilaiNormalisasiTanamans' => $nilaiNormalisaliTanamans,
            'nilaiPembobotanTanamans' => $nilaiPembobotanTanamans,
            'nilaiTotalTanamans' => $nilaiTotalTanamans,
            'dataDrainase' => $dataDrainase,
            'dataTekstur' => $dataTekstur,
            'dataBanjirDalam' => $dataBanjirDalam,
            'dataBanjirLama' => $dataBanjirLama,

        ]);
    }

    public function createGuest()
    {
        //
        return view('spks.guest.create');
    }

    public function showGuest($id)
    {
        $this->setArrayKriteria();
        $spk = inputData::where('id', $id)->first();
        $kriterias = Kriteria::all();
        $tanamans = Tanaman::all();
        $spkSuhu = $spk->suhu;
        $spkKelembapan = $spk->kelembapan;
        $spkDrainase = $spk->drainase;
        $spkKedalamanTanah = $spk->kedalaman_tanah;
        $spkLereng = $spk->lereng;
        $spkKeasaman = $spk->keasaman;
        $spkTekstur = $spk->tekstur;
        $spkBanjir = implode(';', [$spk->banjir_dalam, $spk->banjir_lama]);

        $dataDrainase = Drainase::getDrainaseConstant();
        $dataTekstur = Tekstur::getTeksturConstant();
        $dataBanjirDalam = BanjirDalam::getBanjirDalamConstant();
        $dataBanjirLama = BanjirLama::getBanjirLamaConstant();

        $nilaiTanamans = [];
        foreach ($tanamans as $tanaman) {
            $tanaman_id = $tanaman->id;
            // info('============');
            // info($tanaman->name);
            $nilaiSuhu = $this->getNilaiKriteriaAngka($tanaman,$spkSuhu,'suhu');
            $nilaiKelembapan = $this->getNilaiKriteriaAngka($tanaman,$spkKelembapan, 'kelembapan');
            $nilaiKedalamanTanah = $this->getNilaiKriteriaAngka($tanaman,$spkKedalamanTanah, 'kedalaman_tanah');
            $nilaiLereng = $this->getNilaiKriteriaAngka($tanaman,$spkLereng, 'lereng');
            $nilaiKeasaman = $this->getNilaiKriteriaAngka($tanaman,$spkKeasaman, 'keasaman');
            $nilaiDrainase = $this->getNilaiKriteriaPilihan($tanaman,$spkDrainase, 'drainase', $dataDrainase);
            $nilaiTekstur = $this->getNilaiKriteriaPilihan($tanaman,$spkTekstur, 'tekstur', $dataTekstur);
            $nilaiBanjir = $this->getNilaiKriteriaPilihan2($tanaman,$spkBanjir, 'bahaya_banjir');
            // $nilaiBanjirDalam = $dataBanjirDalam[$spkBanjirDalam];
            // $nilaiBanjirLama = $dataBanjirLama[$spkBanjirLama];
            $nilaiTanamans[$tanaman_id] = [
                'nama' => $tanaman->name,
                'suhu' => $nilaiSuhu,
                'kelembapan'=> $nilaiKelembapan,
                'drainase'=> $nilaiDrainase,
                'tekstur'=> $nilaiTekstur,
                'kedalaman_tanah'=> $nilaiKedalamanTanah,
                'keasaman'=> $nilaiKeasaman,
                'lereng'=> $nilaiLereng,
                'bahaya_banjir' => $nilaiBanjir,
            ];
        }
        // dd($nilaiTanamans);

        $arrayKriteria = ['suhu', 'kelembapan', 'drainase', 'tekstur', 'kedalaman_tanah', 'keasaman', 'lereng', 'bahaya_banjir'];

        $nilaiMaksimal = [];
        foreach ($arrayKriteria as $value) {
            $nilaiMaksimal[$value] = 0;
        }

        foreach ($nilaiTanamans as $key => $dataNilai) {
            foreach ($arrayKriteria as $namaKriteria) {
                // info($namaKriteria);
                $nilaiMax = $nilaiMaksimal[$namaKriteria];
                if ($nilaiMax < $dataNilai[$namaKriteria]) {
                    $nilaiMaksimal[$namaKriteria] = $dataNilai[$namaKriteria];
                }
            }
        }

        // info($nilaiMaksimal);

        $nilaiNormalisaliTanamans = [];
        foreach ($nilaiTanamans as $key => $dataNilai) {
            // $nilaiNormalisaliTanamans[$key] = [];
            $nilaiNormalisaliTanamans[$key] = ['nama' => $dataNilai['nama']];
            foreach ($arrayKriteria as $namaKriteria) {
                // info($namaKriteria);
                $nilaiMax = $nilaiMaksimal[$namaKriteria];
                if ($nilaiMax > 0) {
                    $nilaiNormalisaliTanamans[$key][$namaKriteria] = round($dataNilai[$namaKriteria] / $nilaiMax, 2);
                } else{
                    $nilaiNormalisaliTanamans[$key][$namaKriteria] = 0;
                }
                
            }
        }
        // info($nilaiNormalisaliTanamans);

        $nilaiPembobotanTanamans = [];
        foreach ($nilaiNormalisaliTanamans as $key => $dataNilai) {
            // $nilaiPembobotanTanamans[$key] = [];
            $nilaiPembobotanTanamans[$key] = ['nama' => $dataNilai['nama']];
            foreach ($arrayKriteria as $namaKriteria) {
                // info($namaKriteria);
                $nilaiPembobotanTanamans[$key][$namaKriteria] = $dataNilai[$namaKriteria] * $this->arrayKriteria[$namaKriteria]['bobot'] / 100;
            }
        }
        // info($nilaiPembobotanTanamans);

        $nilaiTotalTanamans = [];
        foreach ($nilaiPembobotanTanamans as $key => $dataNilai) {
            // $nilaiPembobotanTanamans[$key] = [];
            $nilaiTotalTanamans[$key] = [
                'nama' => $dataNilai['nama'],
                'nilai' => 0,
            ];
            foreach ($dataNilai as $namaKriteria => $nilai) {
                if ($namaKriteria != 'nama') {
                    // info('nilai : '.$nilai);
                    $nilaiTotalTanamans[$key]['nilai'] =round($nilaiTotalTanamans[$key]['nilai'] + $nilai, 2);
                }
                
                
            }
        }
        // info($nilaiTotalTanamans);
        // usort($nilaiTotalTanamans, fn($a, $b) => $a['nilai'] <=> $b['nilai']);
        array_multisort(array_column($nilaiTotalTanamans, "nilai"),SORT_DESC, $nilaiTotalTanamans);

        // $dataNilai = [
        //     'suhu'=> 3,
        //     'kelembapan'=> 3,
        //     'drainase'=> 3,
        //     'tekstur'=> 3,
        //     'kedalaman_tanah'=> 3,
        //     'keasaman'=> 3,
        //     'lereng'=> 3,
        //     'bahaya_banjir'=> 3,
        // ];
        // info($this->arrayKriteria);

        // dd($spk);

        return view('spks.guest.show', [
            'spk' => $spk,
            'kriterias' => $kriterias,
            // 'tanamans' => $tanamans,
            'dataNilai' => $dataNilai,
            'nilaiTanamans' => $nilaiTanamans,
            'nilaiNormalisasiTanamans' => $nilaiNormalisaliTanamans,
            'nilaiPembobotanTanamans' => $nilaiPembobotanTanamans,
            'nilaiTotalTanamans' => $nilaiTotalTanamans,
            'dataDrainase' => $dataDrainase,
            'dataTekstur' => $dataTekstur,
            'dataBanjirDalam' => $dataBanjirDalam,
            'dataBanjirLama' => $dataBanjirLama,

        ]);

        

        // return view('spks.guest.show', [
        //     'spk' => $spk,
        //     'kriterias' => $kriterias,
        //     'tanamans' => $tanamans,
        //     'dataNilai' => $dataNilai,
        //     'nilaiTanamans' => $nilaiTanamans,
        //     'nilaiNormalisasiTanamans' => $nilaiNormalisaliTanamans,
        //     'nilaiPembobotanTanamans' => $nilaiPembobotanTanamans,
        //     'nilaiTotalTanamans' => $nilaiTotalTanamans,
        //     'dataDrainase' => $dataDrainase,
        //     'dataTekstur' => $dataTekstur,

        // ]);
    }

}
