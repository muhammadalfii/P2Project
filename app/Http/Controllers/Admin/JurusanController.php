<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class JurusanController extends Controller
{
    public function read(){
        $jurusan = DB::table('jurusan')->orderBy('id','DESC')->get();
        return view('admin.jurusan.index',['jurusan'=>$jurusan]);
    }

    public function add(){
    	return view('admin.jurusan.tambah');
    }

    public function create(Request $request){
        DB::table('jurusan')->insert([  
            'nama' => $request->nama]);

        return redirect('/admin/jurusan')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $jurusan= DB::table('jurusan')->where('id',$id)->first();
        return view('admin.jurusan.detail',['jurusan'=>$jurusan]);
    }

    public function edit($id){
        $jurusan= DB::table('jurusan')->where('id',$id)->first();
        return view('admin.jurusan.edit',['jurusan'=>$jurusan]);
    }

    public function update(Request $request, $id) {
        DB::table('jurusan')  
            ->where('id', $id)
            ->update([
            'nama' => $request->nama]);

        return redirect('/admin/jurusan')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $jurusan= DB::table('jurusan')->where('id',$id)->first();
        DB::table('jurusan')->where('id',$id)->delete();

        return redirect('/admin/jurusan')->with("success","Data Berhasil Didelete !");
    }
}
