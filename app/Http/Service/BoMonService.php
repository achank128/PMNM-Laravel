<?php

namespace App\Http\Service;
use App\Models\BoMon;
use Exception;
use Illuminate\Support\Facades\DB;

class BoMonService
{
    public function create($request){
        try {
            BoMon::create([
                'mabomon'=>(string)$request->input('mabomon'),
                'tenbomon'=>(string)$request->input('tenbomon'),
                'mota'=>(string)$request->input('mota'),
                'vanphong'=>(string)$request->input('vanphong'),
            ]);
            Session()->flash('success','Thêm mới Bộ môn thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
    }

    public function getList($request){
        $bomons = BoMon::query();
        if ($request->has('mabomon') && $request->mabomon != '') {
            $bomons->where('mabomon', $request->mabomon);
        }
        if ($request->has('tenbomon')) {
            $bomons->where('tenbomon', 'LIKE', '%' . $request->tenbomon . '%');
        }
        return $bomons->paginate(2);
    }

    public function getAllBoMon(){
        return BoMon::all();
    }

    public function delete($request){
        $BoMon = BoMon::where('id', $request->input('id'));
        if($BoMon){
            return $BoMon->delete();
        }
    }

    public function edit($id,$request){
        try {
            $bomon = DB::update(
            'update bomons set 
            mabomon = :mabomon,
            tenbomon = :tenbomon,
            mota = :mota,
            vanphong = :vanphong
            where id = :id',
                [
                    'mabomon'=>(string)$request->input('mabomon'),
                    'tenbomon'=>(string)$request->input('tenbomon'),
                    'mota'=>(string)$request->input('mota'),
                    'vanphong'=>(string)$request->input('vanphong'),
                    'id'=> $id
                ]
            );
            Session()->flash('success','Cập nhật thông tin Bộ môn thành công');
            return true;
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }

    }
}