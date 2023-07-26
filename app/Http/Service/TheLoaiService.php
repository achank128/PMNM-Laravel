<?php

namespace App\Http\Service;
use App\Models\TheLoai;
use Exception;
use Illuminate\Support\Facades\DB;

class TheLoaiService
{
    public function create($request){
        try {
            TheLoai::create([
                'matheloai'=>(string)$request->input('matheloai'),
                'tentheloai'=>(string)$request->input('tentheloai'),
                'mota'=>(string)$request->input('mota'),
            ]);
            Session()->flash('success','Thêm mới Thể loại thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function getList(){
        return TheLoai::paginate(2);
    }

    public function getAll(){
        return TheLoai::all();
    }

    public function delete($request){
        $theloai = TheLoai::where('id', $request->input('id'));
        if($theloai){
            return $theloai->delete();
        }
    }

    public function edit($id,$request){
        try {
            $theloai = DB::update(
            'update theloais set 
            matheloai = :matheloai,
            tentheloai = :tentheloai,
            mota = :mota
            where id = :id',
                [
                    'matheloai'=>(string)$request->input('matheloai'),
                    'tentheloai'=>(string)$request->input('tentheloai'),
                    'mota'=>(string)$request->input('mota'),
                    'id'=> $id
                ]
            );
            Session()->flash('success','Cập nhật thông tin Thể loại thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }

    }
}