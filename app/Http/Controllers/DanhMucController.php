<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucCreateRequest;
use App\Http\Service\DanhMucService;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    protected $danhmucService;

    public function __construct(DanhMucService $danhmucService)
    {
        $this->danhmucService = $danhmucService;
    }

    public function index(){
        return view('admin.danhmuc.list',[
            'title'=>'Danh sách Danh mục',
            'danhmucs' => $this->danhmucService->getList()
        ]);
    }

    public function create(){
        return view('admin.danhmuc.add',[
            'title'=>'Thêm mới Danh mục'
        ]);
    }
    public function store(DanhMucCreateRequest $request){
        $result = $this->danhmucService->create($request);
        return redirect()->back();
    }
   
    public function delete(Request $request){
        $result = $this->danhmucService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "Xóa Danh mục thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }


    public function edit(DanhMuc $danhmuc){
        return view('admin.danhmuc.edit',[
            'title'=>"Cập nhật Danh mục",
            'danhmuc' => $danhmuc
        ]);
    }
    public function handleEdit($id, Request $request){
        $result = $this->danhmucService->edit($id,$request);
        return redirect()->back();
    }
}