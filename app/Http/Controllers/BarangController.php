<?php

namespace App\Http\Controllers;
use App\Models\barang;
use Illuminate\Http\Request;
use App\Http\Controllers\APIController;

class BarangController extends Controller
{

    public function all_data() {
        $data = barang::all();

        return response()->json([
            "status" => "ini daftar barang",
            "barang" => $data
        ],200);
    }

    public function create(Request $request) {
        $request->validate([
            'namabarang'=>'required',
            'jumlahbarang'=>'required',
            'hargabarang'=>'required',
        ]);

        barang::create([
            'namabarang'=>$request->namabarang,
            'jumlahbarang'=>$request->jumlahbarang,
            'hargabarang'=>$request->hargabarang,
        ]);

        return Response()->json(['status'=>'Sukses Ditambahkan!', "show"=>$this->all_data()],200);
    }


    public function delete($id) {
        barang::destroy($id);

        return Response()->json(['status'=>'Sukses Dihapuskan!', "show"=>$this->all_data()],200);

    }


    public function update(Request $request, $id) {
        $data = $request->all();
        barang::findorfail($id)->update($data);


        return Response()->json(['status'=>'Sukses Diubahkan!', "show"=>$this->all_data()],200);
    }
}
