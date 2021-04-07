<?php

namespace App\Http\Controllers\Api;

use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\karyawan;

class karyawanController extends Controller
{
    public function submitData(Request $request){

        $validator = $this->validatorSubmitApi($request->all());
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['message'=>$errors]);
        }

        $addKaryawan = new karyawan;
        $addKaryawan->nama = $request->nama;
        $addKaryawan->tanggal_lahir = $request->tanggal_lahir;
        $addKaryawan->gaji = $request->gaji;
        $addKaryawan->status_karyawan = $request->status_karyawan;
        $addKaryawan->save();

        $return['message'] = 'success add data!';
        $return['data']['nama'] = $addKaryawan->nama;
        $return['data']['tanggal_lahir'] = $addKaryawan->tanggal_lahir;
        $return['data']['gaji'] = $addKaryawan->gaji;
        $return['data']['status_karyawan'] = $addKaryawan->status_karyawan;
        return response()->json($return);
    }

    public function showData($id){

        if( $id != null ){
            $karyawan = karyawan::where('id',$id)->get();
        }else{
            $karyawan = karyawan::all();
        }

        if( count($karyawan) > 0 ){
            foreach( $karyawan as $key => $karyawan ){
                $return['message'] = 'success!';
                $return['data'][$key]['id'] = $karyawan->id;
                $return['data'][$key]['nama'] = $karyawan->nama;
                $return['data'][$key]['tanggal_lahir'] = $karyawan->tanggal_lahir;
                $return['data'][$key]['gaji'] = $karyawan->gaji;
                $return['data'][$key]['status_karyawan'] = $karyawan->status_karyawan;
            }
            
        }else{
            $return['message'] = 'Tidak ada data untuk ditampilkan';
        }

        return response()->json($return);
    }

    public function updateData(Request $request){
        $updateKaryawan = karyawan::where('id',$request->id)->first();
        $updateKaryawan->nama = $request->nama;
        $updateKaryawan->tanggal_lahir = $request->tanggal_lahir;
        $updateKaryawan->gaji = $request->gaji;
        $updateKaryawan->status_karyawan = $request->status_karyawan;
        $updateKaryawan->save();

        $return['message'] = 'success update data!';
        $return['data']['nama'] = $updateKaryawan->nama;
        $return['data']['tanggal_lahir'] = $updateKaryawan->tanggal_lahir;
        $return['data']['gaji'] = $updateKaryawan->gaji;
        $return['data']['status_karyawan'] = $updateKaryawan->status_karyawan;
        return response()->json($return);
    }

    public function deleteData(Request $request){
        karyawan::where('id',$request->id)->delete();
        $return['message'] = 'success delete data!';
        return response()->json($return);
    }

    protected function validatorSubmitApi(array $data)
    {
        return Validator::make($data, [
            "nama" => "required",
            "tanggal_lahir" => "required | date_format:Y-m-d",
            "gaji" => "required | numeric",
            "status_karyawan" => "required | boolean"
        ]);
    }
}
