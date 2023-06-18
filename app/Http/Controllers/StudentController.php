<?php

namespace App\Http\Controllers;

use App\Http\Service\ClassService;
use App\Http\Service\StudentService;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService, $classService;

    public function __construct(StudentService $studentService, ClassService $classService)
    {
        $this->studentService = $studentService;
        $this->classService = $classService;
    }

    public function index (){
        return view('admin.sinhvien.list',
        [
            'title'=>'Danh sách sinh viên', 
            'sinhviens' => $this->studentService->getAll()
        ]);
    }

    public function filter (Request $request){
        return view('admin.sinhvien.list',
        [
            'title'=>'Danh sách sinh viên', 
            'sinhviens' => $this->studentService->filter($request),
            'lops' => $this->classService->getAllClass()
        ]);
    }

    public function createView(){
        return view('admin.sinhvien.add',[
            'title'=>'Thêm mới sinh viên',
            'lops' => $this->classService->getAllClass()
        ]);
    }

    public function editView(Student $sv){
        return view('admin.sinhvien.edit',[
            'title'=>'Cập nhật sinh viên',
            'sinhvien' => $sv,
            'lops' => $this->classService->getAllClass()
        ]);
    }

    public function store(Request $request){
        //xu ly them moi lop mon hoc
        $result = $this->studentService->create($request);
        if ($result){
            return redirect('/admin/sinhvien');
        }
        return redirect()->back();
    }

    public function update($id, Request $request){
        $result = $this->studentService->update($id, $request);
        if($result){
            return redirect('/admin/sinhvien');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $result = $this->studentService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "xóa lớp học thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }
}