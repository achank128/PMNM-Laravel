<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\Http\Service\TheLoaiService;
use App\Http\Requests\TheLoaiCreateRequest;

class TheLoaiController extends Controller
{
    protected $theloaiService;

    public function __construct(TheLoaiService $theloaiService)
    {
        $this->theloaiService = $theloaiService;
    }

    public function index(){
        return view('admin.theloai.list',[
            'title'=>'Danh sách Thể loại',
            'theloais' => $this->theloaiService->getList()
        ]);
    }

    public function create(){
        return view('admin.theloai.add',[
            'title'=>'Thêm mới Thể Loại'
        ]);
    }
    public function store(TheLoaiCreateRequest $request){
        $result = $this->theloaiService->create($request);
        return redirect()->back();
    }
   
    public function delete(Request $request){
        $result = $this->theloaiService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "Xóa Thể loại thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }


    public function edit(TheLoai $theloai){
        return view('admin.theloai.edit',[
            'title'=>"Cập nhật Thể loại",
            'theloai' => $theloai
        ]);
    }
    public function handleEdit($id, Request $request){
        $result = $this->theloaiService->edit($id,$request);
        return redirect()->back();
    }
}