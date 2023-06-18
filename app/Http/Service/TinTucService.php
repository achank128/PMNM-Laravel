<?php

namespace App\Http\Service;
use App\Models\TinTuc;
use Exception;
use Illuminate\Support\Facades\DB;

class TinTucService
{
    public function create($request){
        try {
            TinTuc::create([
                'matintuc'=>(string)$request->input('matintuc'),
                'tieude'=>(string)$request->input('tieude'),
                'noidung'=>$request->input('noidung'),
                'matheloai'=>$request->input('matheloai'),
            ]);
            Session()->flash('success','Thêm mới Tin tức thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function getList(){
        return TinTuc::paginate(2);
    }

    public function getAll(){
        return TinTuc::all();
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
            tieude = :tieude,
            noidung = :noidung,
            matheloai = :matheloai
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
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }

    }
}