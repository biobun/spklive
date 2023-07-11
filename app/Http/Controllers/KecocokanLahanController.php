<?php

namespace App\Http\Controllers;

use App\Constants\Drainase;
use App\Constants\Tekstur;
use App\Http\Requests\KecocokanLahanUpdateRequest;
use Illuminate\Http\Request;
use App\Models\KecocokanLahan;
use App\Models\Kriteria;
use App\Models\Tanaman;

class KecocokanLahanController extends Controller
{


    public function show($id)
    {
        $kecocokan = KecocokanLahan::find($id);
        return view('kecocokans.show', [
            'kecocokan' => $kecocokan
        ]);
    }

    public function edit(Request $request, $id)
    {
        $kecocokan = KecocokanLahan::find($id);
        $tanaman = $kecocokan->tanaman;
        $kriteria = $kecocokan->kriteria;
        $typeData = $kriteria->type_data;
        $nilaiKecocokan = $kecocokan->kecocokan;
        $value_type = $kecocokan->value_type;
        $value = $kecocokan->value;
        $valueArray = explode(';', $value);
        $typeData = $kriteria->type_data;
        switch ($typeData) {
            case 'angka':
                $value1 = $valueArray[0];
                $value2 = $valueArray[1];
                $value3 = $valueArray[2];
                $value4 = $valueArray[3];
                return view('kecocokans.edit', [
                    'id' => $id,
                    'kriteria' => $kriteria,
                    'tanaman' => $tanaman,
                    'pilihanInput' => $value_type,
                    'type_data' => $typeData,
                    'value1' => $value1,  
                    'value2' => $value2,  
                    'value3' => $value3,  
                    'value4' => $value4,  
                    'kecocokan' => $nilaiKecocokan,   

                ]);
                break;
            case 'pilihan':
                switch ($kriteria->name) {
                    case 'Drainase':
                        # code...
                        $datas = Drainase::getDrainaseConstant();
                        break;
                    case 'Tekstur':
                        # code...
                        $datas = Tekstur::getTeksturConstant();
                        break;
                        
                }
                $optionAvailable = array_fill(0, count($datas), 0);
                
                $kecocokanLahanAvailable = KecocokanLahan::where('tanaman_id',$tanaman->id)->where('kriteria_id',$kriteria->id)->where('id','!=',$kecocokan->id)->get();
                
                info($kecocokanLahanAvailable);
                foreach ($kecocokanLahanAvailable as $kecocokanLahan) {
                    $dataValue = $kecocokanLahan->value;
                    $dataValueArray = explode(';', $dataValue);
                    foreach ($dataValueArray as $index => $value) {
                        # code...
                        // info('avail kecocokan data '.$index.' '.$value );
                        if($value){
                            // info($value);
                            $optionAvailable[$index] = $value;
                        }
                    }
                }
                foreach ($datas as $key => $namaPilihan) {
                    
                    $array_value = ['name' => $namaPilihan, 'disable' => $optionAvailable[$key], 'selected' => $valueArray[$key]];
                    $datasItemNameSelected[$key] = $array_value;
                }
                // dd($datasItemNameSelected);
                return view('kecocokans.edit', [
                    'id' => $id,
                    'kriteria' => $kriteria,
                    'tanaman' => $tanaman,
                    'type_data' => $typeData,
                    'datasItemNameSelected' => $datasItemNameSelected,
                    'kecocokan' => $request->kecocokan,   
                ]);
                break;
        }

        return view('kecocokans.edit', [
            'id' => $id,
            'kecocokan' => $kecocokan->kecocokan,
            'tanaman' => $kecocokan->tanaman,
            'kriteria' => $kecocokan->kriteria,
            'value' => $kecocokan->value,
            'type_data' => $typeData,
        ]);
    }
    
    public function update(KecocokanLahanUpdateRequest $request, KecocokanLahan $kecocokan){
        dd($request);
    }

    public function create(Request $request)
    {
        $kriteria = Kriteria::find($request->kriteria_id);
        $tanaman = Tanaman::find($request->tanaman_id);
        $typeData = $kriteria->type_data;
        switch ($typeData) {
            case 'angka':
                return view('kecocokans.create', [
                    'kriteria' => $kriteria,
                    'tanaman' => $tanaman,
                    'pilihanInput' => 1,
                    'type_data' => $typeData,
                    'value1' => 0,  
                    'value2' => 0,  
                    'value3' => 0,  
                    'value4' => 0,  
                    'kecocokan' => $request->kecocokan,   

                ]);
                break;
            case 'pilihan':
                switch ($kriteria->name) {
                    case 'Drainase':
                        # code...
                        $datas = Drainase::getDrainaseConstant();
                        break;
                    case 'Tekstur':
                        # code...
                        $datas = Tekstur::getTeksturConstant();
                        break;
                        
                }
                $optionAvailable = array_fill(0, count($datas), 0);
                
                $kecocokanLahanAvailable = KecocokanLahan::where('tanaman_id',$tanaman->id)->where('kriteria_id',$kriteria->id)->get();
                
                info($kecocokanLahanAvailable);
                foreach ($kecocokanLahanAvailable as $kecocokanLahan) {
                    $dataValue = $kecocokanLahan->value;
                    $dataValueArray = explode(';', $dataValue);
                    foreach ($dataValueArray as $index => $value) {
                        # code...
                        // info('avail kecocokan data '.$index.' '.$value );
                        if($value){
                            // info($value);
                            $optionAvailable[$index] = $value;
                        }
                    }
                }
                foreach ($datas as $key => $value) {
                    $array_value = ['name' => $value, 'disable' => $optionAvailable[$key], 'selected' => false];
                    $datasItemNameSelected[$key] = $array_value;
                }
                // dd($datasItemNameSelected);
                return view('kecocokans.create', [
                    'kriteria' => $kriteria,
                    'tanaman' => $tanaman,
                    'pilihanInput' => 1,
                    'type_data' => $typeData,
                    'datasItemNameSelected' => $datasItemNameSelected,
                    'kecocokan' => $request->kecocokan,   
                ]);
                break;
        }
    }

    public function store(Request $request){
        // dd($request);
        $kriteria = Kriteria::find($request->kriteria);
        // dd($kriteria);
        $typeData = $kriteria->type_data;
        switch ($typeData) {
            case 'angka':
                $pilihanInput = $request->pilihanInput;
                $value1 = 0;
                $value2 = 0;
                $value3 = 0;
                $value4 = 0;
        
                switch ($pilihanInput) {
                    case '1':
                        $value1 = $request->value1;
                        $value2 = $request->value2;
                        break;
        
                    case '2':
                        $value1 = $request->value1;
                        $value2 = $request->value2;
                        $value3 = $request->value3;
                        $value4 = $request->value4;
                        break;
                    
                    case '3':
                        $value1 = $request->value1;
                        break;
                    
                    case '4':
                        $value2 = $request->value2;
                        break;
                    
                    case '5':
                        $value1 = $request->value1;
                        $value2 = $request->value2;
                        break;
                }
        
                $dataValue = implode(';', [$value1, $value2, $value3, $value4]);
                break;
            case 'pilihan':
                switch ($kriteria->name) {
                    case 'Drainase':
                        # code...
                        $datas = Drainase::getDrainaseConstant();
                        break;
                    case 'Tekstur':
                        # code...
                        $datas = Tekstur::getTeksturConstant();
                        break;
                        
                }
                $dataValue = array_fill(0, count($datas), 0);
                foreach ($datas as $key => $value) {
                    if($request->has('selected'.$key)){
                        $dataValue[$key] = 1;
                    }
                }
                // dd($dataValue);
                $dataValue = implode(';', $dataValue);
                $pilihanInput = 0;
                // dd($dataValue);
                break;
        }

        KecocokanLahan::create([
            'tanaman_id' => $request->tanaman,
            'kriteria_id' => $request->kriteria,
            'kecocokan' => $request->kecocokan,
            'value' => $dataValue,
            'value_type' => $pilihanInput,
        ]);

        return redirect()->to('/tanamans/'.$request->tanaman.'/edit');
        
    }
}
