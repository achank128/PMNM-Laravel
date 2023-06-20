<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiLieuCreateRequest;
use App\Http\Service\DanhMucService;
use App\Http\Service\TaiLieuService;
use App\Models\TaiLieu;
use Illuminate\Http\Request;

class TaiLieuController extends Controller
{
    protected $tailieuService;
    protected $danhmucService;

    public function __construct(TaiLieuService $tailieuService, DanhMucService $danhmucService)
    {
        $this->tailieuService = $tailieuService;
        $this->danhmucService = $danhmucService;
    }

    public function index(Request $request){
        return view('admin.tailieu.list',[
            'title'=>'Danh sách Tài liệu',
            'tailieus' => $this->tailieuService->getList($request)
        ]);
    }

    public function create(){
        return view('admin.tailieu.add',[
            'title'=>'Thêm mới Tài liệu',
            'danhmucs' => $this->danhmucService->getAll()
        ]);
    }
    public function store(TaiLieuCreateRequest $request){
        $result = $this->tailieuService->create($request);
        return redirect()->back();
    }
    
    public function delete(Request $request){
        $result = $this->tailieuService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "xóa Tài liệu thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }

    public function edit(TaiLieu $tailieu){
        return view('admin.tailieu.edit',[
            'title'=>"Cập nhật Tài liệu",
            'tailieu' => $tailieu,
            'danhmucs' => $this->danhmucService->getAll()            
        ]);
    }
    public function handleEdit($id, Request $request){
        $result = $this->tailieuService->edit($id, $request);
        return redirect()->back();
    }
}