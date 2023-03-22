<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class SemesterController extends Controller
{
    public function read(){
        $semester = DB::table('semester')->orderBy('id','DESC')->get();
        return view('admin.semester.index',['semester'=>$semester]);
    }

    public function add(){
    	return view('admin.semester.tambah');
    }

    public function create(Request $request){
        DB::table('semester')->insert([  
            'nama' => $request->nama]);

        return redirect('/admin/semester')->with("success","Data Berhasil Ditambah !");
    }

    public function detail($id){
        $semester= DB::table('semester')->where('id',$id)->first();
        return view('admin.semester.detail',['semester'=>$semester]);
    }

    public function edit($id){
        $semester= DB::table('semester')->where('id',$id)->first();
        return view('admin.semester.edit',['semester'=>$semester]);
    }

    public function update(Request $request, $id) {
        DB::table('semester')  
            ->where('id', $id)
            ->update([
            'nama' => $request->nama]);

        return redirect('/admin/semester')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        $semester= DB::table('semester')->where('id',$id)->first();
        DB::table('semester')->where('id',$id)->delete();

        return redirect('/admin/semester')->with("success","Data Berhasil Didelete !");
    }
}
