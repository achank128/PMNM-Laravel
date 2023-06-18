<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\Http\Service\TheLoaiService;
use App\Http\Requests\TheLoaiCreateRequest;

class TheLoaiController extends Controller
{
    //
    protected $theloaiService;

    public function __construct(TheLoaiService $theloaiService)
    {
        $this->theloaiService = $theloaiService;
    }

    public function create(){
        return view('admin.theloai.add',[
            'title'=>'Thêm mới The Loai'
        ]);
    }
    public function store(TheLoaiCreateRequest $request){
        $result = $this->theloaiService->create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.theloai.list',[
            'title'=>'Danh sách the loai',
            'theloais' => $this->theloaiService->getAll()
        ]);
    }
    public function delete(Request $request){
        //xử lý xóa
        $result = $this->theloaiService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "xóa the loai thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }
    public function edit(TheLoai $theloai){
        return view('admin.theloai.edit',[
            'title'=>"Sửa The Loai",
            'theloai' => $theloai
        ]);
    }

    public function handleEdit($id, Request $request){
        $result = $this->theloaiService->edit($id,$request);
        return redirect()->back();
    }
}