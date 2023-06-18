<?php

namespace App\Http\Service;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentService
{
    public function getAll(){
        return Student::paginate(3);
    }

    public function filter($request){
        $students = Student::query();
        if ($request->has('search')) {
            $students->where('HoTen', 'LIKE', '%' . $request->search . '%');
        }
        if ($request->has('search')) {
            $students->where('MaLop', 'LIKE', '%' . $request->MaLop . '%');
        }
        return $students->paginate(3);
    }

    public function create($request){
        try {
            Student::create([
                'MSSV'=>(string)$request->input('MSSV'),
                'HoTen'=>(string)$request->input('HoTen'),
                'NgaySinh'=>(string)$request->input('NgaySinh'),
                'DiaChi'=>(string)$request->input('DiaChi'),
                'GioiTinh'=>(string)$request->input('GioiTinh'),
                'SDT'=>(string)$request->input('SDT'),
                'MaLop'=>(string)$request->input('MaLop'),
            ]);
            Session()->flash('success','Thêm mới sv thành công');
        }
        //xử lý exception, nếu có exception thì lấy ra message và hiển thị ra màn hình.
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }
   
    public function delete($request){
        $sv = Student::where('id', $request->input('id'));
        if($sv){
            return $sv->delete();
        }
    }

    public function update($id, $request){
        try {
            $sv = DB::update(
            'UPDATE students SET 
            MSSV = :MSSV,
            HoTen = :HoTen,
            GioiTinh = :GioiTinh,
            NgaySinh = :NgaySinh,
            DiaChi = :DiaChi,
            SDT = :SDT,
            MaLop = :MaLop
            WHERE id = :id',
                [
                    'MSSV'=>(string)$request->input('MSSV'),
                    'HoTen'=>(string)$request->input('HoTen'),
                    'GioiTinh'=>(string)$request->input('GioiTinh'),
                    'NgaySinh'=>(string)$request->input('NgaySinh'),
                    'DiaChi'=>(string)$request->input('DiaChi'),
                    'SDT'=>(string)$request->input('SDT'),
                    'MaLop'=>(string)$request->input('MaLop'),
                    'id'=> $id
                ]
            );
            Session()->flash('success','Cập nhật sinh viên thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;

    }
}