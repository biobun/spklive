<?php

namespace App\Http\Controllers;

use App\Constants\Drainase;
use App\Constants\Tekstur;
use App\Models\KecocokanLahan;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\Tanaman;

class TanamanController extends Controller
{
    //

    public function index()
    {
        return view('tanamans.index');
    }

    public function show($id)
    {
        $tanaman = Tanaman::find($id);
        return view('tanamans.show', [
            'tanaman' => $tanaman
        ]);
    }

    public function edit2($id)
    {
        $tanaman = Tanaman::find($id);
        $tanaman_id = $tanaman->id;
        $name = $tanaman->name;
        // dd($tanaman->kecocokans);
        $kecocokanLahans = $tanaman->kecocokans;
        $kecocokanLahanDatas = [];
        foreach ($kecocokanLahans as $kecocokanLahan) {
            # code...
            $kriteria = $kecocokanLahan->kriteria;
            $kriteria_id = $kriteria->id;
            $kecocokan = $kecocokanLahan->kecocokan;
            $value = $kecocokanLahan->value;
            // $key = join('',['K',strval($kriteria_id),'C',strval($kecocokan)]);
            // $kecocokanLahanDatas[$key] = $value;
            $value = $kecocokanLahan->value;
                    // $kriteria = $kecocokanLahan->kriteria;
            $type_data = $kriteria->type_data;
            info($type_data);
            $lambang_satuan = '';
            $value_display2 = '';
            if ($type_data=='angka') {
                # code...
                $value_type = $kecocokanLahan->value_type;
                $value_array = explode(';', $value);
                // dd($value_array);
                $outputDataMin1 = $value_array[0];
                $outputDataMax1 = $value_array[1];
                $outputDataMin2 = $value_array[2];
                $outputDataMax2 = $value_array[3];
                switch ($value_type) {
                    case 1:
                        # code...
                        $value_display = $outputDataMin1.' - '.$outputDataMax1.$lambang_satuan;
                        break;
                    case 2:
                        # code...
                        $value_display = $outputDataMin1.' - '.$outputDataMax1.$lambang_satuan;
                        $value_display2 = $outputDataMin2.' - '.$outputDataMax2.$lambang_satuan;
                        break;
                    case 3:
                        # code...
                        $value_display = '< '.$outputDataMin1.$lambang_satuan;
                        break;
                    case 4:
                        # code...
                        $value_display = '> '.$outputDataMax1.$lambang_satuan;
                        break;
                    case 5:
                        # code...
                        $value_display = '< '.$outputDataMin1.$lambang_satuan;
                        $value_display2 = '> '.$outputDataMax1.$lambang_satuan;
                        break;
                    default:
                        # code...
                        break;
                }
            } else if ($type_data=='pilihan'){
                $kriteriaName = $kriteria->name;
                info($kriteriaName);
                switch ($kriteriaName) {
                    case 'Drainase':
                        # code...
                        $datas = Drainase::getDrainaseConstant();
                        break;
                    case 'Tekstur':
                        # code...
                        $datas =  Tekstur::getTeksturConstant();
                        break;
                }
                info($datas);
                $value_array = explode(';', $value);
                info($value_array);
                // dd($value_array);
                $value_display = [];
                for ($i=0; $i < count($value_array); $i++) {
                    $selected = $value_array[$i];
                    if ($selected) {
                        array_push($value_display, $datas[$i]);
                    }
                }
                $value_display = $value_display;
            } else {
                $kriteriaName = $kriteria->name;
                $value_array = explode(';', $value);
                if ($value_array == ['0','0']) {
                    $value_display = 'F0';
                } else {
                    $value_display = 'F'.implode('', $value_array);
                }
                
            }
            $kecocokanLahanDatas[$kriteria_id] = [
                $kecocokan => [
                    'value' => $value, 
                    'value_type' => $kecocokanLahan->value_type, 
                    'value_display' => $value_display,
                    'value_display2' => $value_display2,
                ]
            ];


        }
        // dd($kecocokanLahanDatas);
        // info($kecocokanLahanDatas);
        // info(array_key_exists('K1C3',$kecocokanLahanDatas));
        // $kecocokanLahanDatas = $kecocokanLahanDatas;
        // dd(Kriteria::orderBy('id', 'asc')->get());
        foreach (Kriteria::orderBy('id', 'asc')->get() as $kriteria) {
            // dd($kriteria);
            // for( $kecocokan=0; $kecocokan<=3; $kecocokan++ ){
            //     dd($kriteria);
            // }
            $kriteria_id = $kriteria->id;
            for( $kecocokan=3; $kecocokan>=0; $kecocokan-- )
            {            
                // dd($kecocokan);
                $kecocokanLahan = KecocokanLahan::where('tanaman_id',$tanaman_id)->where('kriteria_id',$kriteria_id)->where('kecocokan',$kecocokan)->first();
                // dd($kecocokanLahan);
                info($kecocokanLahan);
                if ($kecocokanLahan) {
                    // dd($kecocokanLahan);
                    # code...
                    // $kecocokanLahan = $kecocokanLahan;
                    $value = $kecocokanLahan->value;
                    // $kriteria = $kecocokanLahan->kriteria;
                    $type_data = $kriteria->type_data;
                    info($type_data);
                    $lambang_satuan = '';
                    if ($type_data=='angka') {
                        # code...
                        $value_type = $kecocokanLahan->value_type;
                        $value_array = explode(';', $value);
                        // dd($value_array);
                        $outputDataMin1 = $value_array[0];
                        $outputDataMax1 = $value_array[1];
                        $outputDataMin2 = $value_array[2];
                        $outputDataMax2 = $value_array[3];
                        switch ($value_type) {
                            case 1:
                                # code...
                                $value_display = $outputDataMin1.' - '.$outputDataMax1.$lambang_satuan;
                                break;
                            case 2:
                                # code...
                                $value_display = $outputDataMin1.' - '.$outputDataMax1.$lambang_satuan;
                                $value_display2 = $outputDataMin2.' - '.$outputDataMax2.$lambang_satuan;
                                break;
                            case 3:
                                # code...
                                $value_display = '< '.$outputDataMin1.$lambang_satuan;
                                break;
                            case 4:
                                # code...
                                $value_display = '> '.$outputDataMax1.$lambang_satuan;
                                break;
                            case 5:
                                # code...
                                $value_display = '< '.$outputDataMin1.$lambang_satuan;
                                $value_display2 = '> '.$outputDataMax1.$lambang_satuan;
                                break;
                            default:
                                # code...
                                break;
                        }
                    } else if ($type_data=='pilihan'){
                        $kriteriaName = $kriteria->name;
                        info($kriteriaName);
                        switch ($kriteriaName) {
                            case 'Drainase':
                                # code...
                                $datas = Drainase::getDrainaseConstant();
                                break;
                            case 'Tekstur':
                                # code...
                                $datas =  Tekstur::getTeksturConstant();
                                break;
                        }
                        info($datas);
                        $value_array = explode(';', $value);
                        info($value_array);
                        // dd($value_array);
                        $value_display = [];
                        for ($i=0; $i < count($value_array); $i++) {
                            $selected = $value_array[$i];
                            if ($selected) {
                                // if($value_display){
                                //     $value_display = $value_display.', ';
                                // }
                                // $value_display = $value_display.$datas[$i];
                                array_push($value_display, $datas[$i]);
                            }
                        }
                        $value_display = $value_display;
                    } else {
                        $kriteriaName = $kriteria->name;
                        $value_array = explode(';', $value);
                        if ($value_array == ['0','0']) {
                            $value_display = 'F0';
                        } else {
                            $value_display = 'F'.implode('', $value_array);
                        }
                        
                    }
                    $kecocokanLahanDatas[$kriteria_id] = [
                        $kecocokan => [
                            'value' => $value, 
                            'value_type' => $kecocokanLahan->value_type, 
                            'value_display' => $value_display,
                            'value_display2' => $value_display2,
                        ]
                    ];
                }
            }
        }
        return view('tanamans.edit', [
            'tanaman' => $tanaman,
            'name' => $name,
            'kecocokanLahanDatas' => $kecocokanLahanDatas,
            'kriterias' => Kriteria::orderBy('id', 'asc')->get(),
        ]);
    }

    public function edit($id)
    {
        $tanaman = Tanaman::find($id);
        $tanaman_id = $tanaman->id;
        $name = $tanaman->name;
        // dd($tanaman->kecocokans);
        $kecocokanLahanDatas = [];
        foreach (Kriteria::orderBy('id', 'asc')->get() as $kriteria) {
            $kriteria_id = $kriteria->id;
            
            // info('kriteria '.$kriteria);
            info('kriteria id '.$kriteria_id);
            for( $kecocokan=3; $kecocokan>=0; $kecocokan-- )
            {            
                // dd($kecocokan);
                info('kecocokan: '.$kecocokan);
                $kecocokanLahan = KecocokanLahan::where('tanaman_id',$tanaman_id)->where('kriteria_id',$kriteria_id)->where('kecocokan',$kecocokan)->first();
                // dd($kecocokanLahan);
                // info($kecocokanLahan);
                if ($kecocokanLahan) {
                    $kecocokanLahan_id = $kecocokanLahan->id;
                    $value_type = $kecocokanLahan->value_type;
                    // dd($kecocokanLahan);
                    # code...
                    // $kecocokanLahan = $kecocokanLahan;
                    $value = $kecocokanLahan->value;
                    $value_display2 = '';
                    // $kriteria = $kecocokanLahan->kriteria;
                    $type_data = $kriteria->type_data;
                    // info($type_data);
                    $lambang_satuan = '';
                    if ($type_data=='angka') {
                        # code...
                        $value_type = $kecocokanLahan->value_type;
                        $value_array = explode(';', $value);
                        // dd($value_array);
                        $outputDataMin1 = $value_array[0];
                        $outputDataMax1 = $value_array[1];
                        $outputDataMin2 = $value_array[2];
                        $outputDataMax2 = $value_array[3];
                        switch ($value_type) {
                            case 1:
                                # code...
                                $value_display = $outputDataMin1.' - '.$outputDataMax1.$lambang_satuan;
                                break;
                            case 2:
                                # code...
                                $value_display = $outputDataMin1.' - '.$outputDataMax1.$lambang_satuan;
                                $value_display2 = $outputDataMin2.' - '.$outputDataMax2.$lambang_satuan;
                                break;
                            case 3:
                                # code...
                                $value_display = '< '.$outputDataMin1.$lambang_satuan;
                                break;
                            case 4:
                                # code...
                                $value_display = '> '.$outputDataMax1.$lambang_satuan;
                                break;
                            case 5:
                                # code...
                                $value_display = '< '.$outputDataMin1.$lambang_satuan;
                                $value_display2 = '> '.$outputDataMax1.$lambang_satuan;
                                break;
                        }
                    } else if ($type_data=='pilihan'){
                        $kriteriaName = $kriteria->name;
                        // info($kriteriaName);
                        switch ($kriteriaName) {
                            case 'Drainase':
                                # code...
                                $datas = Drainase::getDrainaseConstant();
                                break;
                            case 'Tekstur':
                                # code...
                                $datas =  Tekstur::getTeksturConstant();
                                break;
                        }
                        // info($datas);
                        $value_array = explode(';', $value);
                        // info($value_array);
                        // dd($value_array);
                        $value_display = [];
                        for ($i=0; $i < count($value_array); $i++) {
                            $selected = $value_array[$i];
                            if ($selected) {
                                // if($value_display){
                                //     $value_display = $value_display.', ';
                                // }
                                // $value_display = $value_display.$datas[$i];
                                array_push($value_display, $datas[$i]);
                            }
                        }
                        $value_display = $value_display;
                    } else {
                        $kriteriaName = $kriteria->name;
                        $value_array = explode(';', $value);
                        if ($value_array == ['0','0']) {
                            $value_display = 'F0';
                        } else {
                            $value_display = 'F'.implode('', $value_array);
                        }
                        
                    }
                    
                    
                } else {
                    $value = '';
                    $value_type = '';
                    $value_display = '';
                    $value_display2 = '';
                    $kecocokanLahan_id = 0;

                }
                if(array_key_exists($kriteria_id, $kecocokanLahanDatas)){
                    $kecocokanLahanDatas[$kriteria_id][$kecocokan] = [                            
                            'value' => $value, 
                            'value_type' => $value_type, 
                            'value_display' => $value_display,
                            'value_display2' => $value_display2,    
                            'kecocokan_id' => $kecocokanLahan_id,                        
                    ];                       
                }else {
                    $kecocokanLahanDatas[$kriteria_id] = [
                        $kecocokan => [
                            'value' => $value, 
                            'value_type' => $value_type, 
                            'value_display' => $value_display,
                            'value_display2' => $value_display2,
                            'kecocokan_id' => $kecocokanLahan_id,
                        ]
                    ];
                }
            }
        }
        // dd($kecocokanLahanDatas);
        return view('tanamans.edit', [
            'tanaman' => $tanaman,
            'name' => $name,
            'kecocokanLahanDatas' => $kecocokanLahanDatas,
            'kriterias' => Kriteria::orderBy('id', 'asc')->get(),
        ]);
    }
}
