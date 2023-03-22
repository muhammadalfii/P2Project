<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PeminjamanController extends Controller
{

    public function read(){
        $peminjaman = DB::table('peminjaman')->orderBy('id','DESC')->get();
        $id_siswa = DB::table('siswa')->get('id_siswa');
        $id_buku = DB::table('buku')->get('id_buku');
        $buku = DB::table('buku')->where('id_buku',$id_buku || 0)->get();
        $siswa = DB::table('siswa')->where('id_siswa',$id_siswa || 0)->get();
        return view('admin.peminjaman.index',['peminjaman'=>$peminjaman,'buku'=>$buku,'siswa'=>$siswa]);
    }

    public function add(){
        $siswa= DB::table('siswa')->orderBy('id_siswa','DESC')->get();
        $buku= DB::table('buku')->orderBy('id_buku','DESC')->get();
    	return view('admin.peminjaman.tambah',['siswa'=>$siswa],['buku'=>$buku]);
        
    }

   

    public function create(Request $request){
        $buku= DB::table('buku')->where('id_buku',$request->id_buku)->first();

        if($buku->stock == 0){
            return redirect('/admin/peminjaman')->with("error","Stock Buku Telah Habis Silahkan Pinjam Buku Lainnya !");
        }

        //jika peminjaman dilakukan maka stock buku akan berkurang 
        $stock = $buku->stock - 1;

        // print($stock);
        DB::table('peminjaman')->insert([
            
            'id_buku' => $request->id_buku,
            'id_siswa' => $request->id_siswa,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => 'Pinjam',
        ]);

        DB::table('buku')  
            ->where('id_buku', $request->id_buku)
            ->update([
            'stock' => $stock]);

        return redirect('/admin/peminjaman')->with('success','Data Berhasil Ditambah!');

    }
    

    public function detail($id){
        $peminjaman= DB::table('peminjaman')->where('id_buku',$id)->first();
        return view('admin.peminjaman.detail',['peminjaman'=>$peminjaman]);
    }

    
    public function delete($id)
    {
        $peminjaman= DB::table('peminjaman')->where('id',$id)->first();
        DB::table('peminjaman')->where('id',$id)->delete();

        return redirect('/admin/peminjaman')->with("success","Data Berhasil Didelete !");
    }
}
