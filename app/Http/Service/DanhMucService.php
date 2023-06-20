<?php

namespace App\Http\Service;
use App\Models\DanhMuc;
use Exception;
use Illuminate\Support\Facades\DB;

class DanhMucService
{
    public function create($request){
        try {
            DanhMuc::create([
                'madanhmuc'=>(string)$request->input('madanhmuc'),
                'tendanhmuc'=>(string)$request->input('tendanhmuc'),
                'mota'=>(string)$request->input('mota'),
            ]);
            Session()->flash('success','Thêm mới Danh mục thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function getList(){
        return DanhMuc::paginate(5);
    }

    public function getAll(){
        return DanhMuc::all();
    }

    public function delete($request){
        $danhmuc = DanhMuc::where('id', $request->input('id'));
        if($danhmuc){
            return $danhmuc->delete();
        }
    }

    public function edit($id,$request){
        try {
            $danhmuc = DB::update(
            'update danhmucs set 
            madanhmuc = :madanhmuc,
            tendanhmuc = :tendanhmuc,
            mota = :mota
            where id = :id',
                [
                    'madanhmuc'=>(string)$request->input('madanhmuc'),
                    'tendanhmuc'=>(string)$request->input('tendanhmuc'),
                    'mota'=>(string)$request->input('mota'),
                    'id'=> $id
                ]
            );
            Session()->flash('success','Cập nhật thông tin Danh mục thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }

    }
}