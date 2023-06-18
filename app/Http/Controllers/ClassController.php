<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\LopMonHoc;
use Illuminate\Http\Request;
use App\Http\Service\ClassService;
use App\Http\Requests\LopCreateRequest;

class ClassController extends Controller
{
    //
    protected $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    public function index(){
        return view('admin.lop.list',[
            'title'=>'Danh sách lớp môn học',
            'lopmonhocs' => $this->classService->getAll()
        ]);
    }

    public function filter (Request $request){
        return view('admin.lop.list',
        [
            'title'=>'Danh sách lớp môn học',
            'lopmonhocs' => $this->classService->filter($request),
        ]);
    }

    public function createView(){
        return view('admin.lop.add',[
            'title'=>'Thêm mới lớp môn học'
        ]);
    }

    public function store(LopCreateRequest $request){
        //xu ly them moi lop mon hoc
        $result = $this->classService->create($request);
        if ($result){
            return redirect('/admin/lop');
        }
        return redirect()->back();
    }
  
    public function delete(Request $request){
        $result = $this->classService->delete($request);
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

    public function editView(LopMonHoc $lop){
        return view('admin.lop.edit',[
            'title'=>"Cập nhật lớp học",
            'lop' => $lop
        ]);
    }
    public function update($id, Request $request){
        $result = $this->classService->edit($id,$request);
        return redirect()->back();
    }
}