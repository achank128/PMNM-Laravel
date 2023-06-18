<?php

namespace App\Http\Service;
use App\Models\TinTuc;
use Exception;
use Illuminate\Support\Facades\DB;

class TinTucService
{
    public function create($request){
        try {
            //
            TinTuc::create([
                'matintuc'=>(string)$request->input('matintuc'),
                'tieude'=>(string)$request->input('tieude'),
                'noidung'=>$request->input('noidung'),
                'matheloai'=>$request->input('matheloai'),
            ]);
            Session()->flash('success','Thêm mới tin tuc thành công');
        }
        //xử lý exception, nếu có exception thì lấy ra message và hiển thị ra màn hình.
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }
    public function getAll(){
        return TinTuc::paginate(1);
    }
    public function delete($request){
        $lop = TinTuc::where('id', $request->input('id'));
        if($lop){
            return $lop->delete();
        }
    }

    public function edit($id,$request){
        try {
            $lop = DB::update(
            'update tintucs set 
            matintuc = :matintuc,
            tieude=:tieude,
            noidung=:noidung,
            matheloai=:matheloai
            where id = :id',
                [
                    'matintuc'=>(string)$request->input('matintuc'),
                    'tieude'=>(string)$request->input('tieude'),
                    'noidung'=>(string)$request->input('noidung'),
                    'matheloai'=>$request->input('matheloai'),
                    'id'=> $id
                ]
            );
            Session()->flash('success','Cập nhật thông tin tin tuc thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;

    }
}