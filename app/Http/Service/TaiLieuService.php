<?php

namespace App\Http\Service;
use App\Models\TaiLieu;
use Exception;
use Illuminate\Support\Facades\DB;

class TaiLieuService
{
    public function create($request){
        try {
            TaiLieu::create([
                'matailieu'=>(string)$request->input('matailieu'),
                'tentailieu'=>(string)$request->input('tentailieu'),
                'tomtat'=>$request->input('tomtat'),
                'madanhmuc'=>$request->input('madanhmuc'),
            ]);
            Session()->flash('success','Thêm mới Tài liệu thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function getList($request){
        $tailieus = TaiLieu::query();
        if($request->sortBy == 'ten_asc'){
            $tailieus->orderBy('tentailieu', 'asc');
        }
        else if($request->sortBy == 'ten_desc'){
            $tailieus->orderBy('tentailieu', 'desc');
        }
        else if($request->sortBy == 'ma_desc'){
            $tailieus->orderBy('matailieu', 'desc');
        }
        else if($request->sortBy == 'ma_asc'){
            $tailieus->orderBy('matailieu', 'asc');
        }
        return $tailieus->paginate(5);
    }

    public function getAll(){
        return TaiLieu::all();
    }

    public function delete($request){
        $lop = TaiLieu::where('id', $request->input('id'));
        if($lop){
            return $lop->delete();
        }
    }

    public function edit($id,$request){
        try {
            $lop = DB::update(
            'update tailieus set 
            matailieu = :matailieu,
            tentailieu = :tentailieu,
            tomtat = :tomtat,
            madanhmuc = :madanhmuc
            where id = :id',
                [
                    'matailieu'=>(string)$request->input('matailieu'),
                    'tentailieu'=>(string)$request->input('tentailieu'),
                    'tomtat'=>(string)$request->input('tomtat'),
                    'madanhmuc'=>$request->input('madanhmuc'),
                    'id'=> $id
                ]
            );
            Session()->flash('success','Cập nhật thông tin Tài liệu thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }

    }
}