<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PengembalianController extends Controller
{
    public function read(){
        $pengembalian = DB::table('pengembalian')->orderBy('id','DESC')->get();
        $id_siswa = DB::table('siswa')->get('id_siswa');
        $id_buku = DB::table('buku')->get('id_buku');
        $buku = DB::table('buku')->where('id_buku',$id_buku || 0)->get();
        $siswa = DB::table('siswa')->where('id_siswa',$id_siswa || 0)->get();
        return view('admin.pengembalian.index',['pengembalian'=>$pengembalian,'buku'=>$buku,'siswa'=>$siswa]);
    }

    public function add(){
        $siswa= DB::table('siswa')->orderBy('nis','DESC')->get();
        $buku= DB::table('buku')->orderBy('id_buku','DESC')->get();
    	return view('admin.pengembalian.tambah',['siswa'=>$siswa],['buku'=>$buku]);
    }

    public function create(Request $request){
        $buku= DB::table('buku')->where('id_buku',$request->id_buku)->first();

        $stock = $buku->stock + 1;

        DB::table('pengembalian')->insert([  
            'id_buku' => $request->id_buku,
            'id_siswa' => $request->id_siswa,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => 'Dikembalikan',
        ]);

        DB::table('buku')  
            ->where('id_buku', $request->id_buku)
            ->update([
            'stock' => $stock]);
        return redirect('/admin/pengembalian')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $pengembalian= DB::table('pengembalian')->where('id',$id)->first();
        return view('admin.pengembalian.detail',['pengembalian'=>$pengembalian]);
    }

    
    public function delete($id)
    {
        $pengembalian= DB::table('pengembalian')->where('id',$id)->first();
        DB::table('pengembalian')->where('id',$id)->delete();

        return redirect('/admin/pengembalian')->with("success","Data Berhasil Didelete !");
    }
}
