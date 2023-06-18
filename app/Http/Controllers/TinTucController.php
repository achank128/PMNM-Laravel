<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\Http\Service\TinTucService;
use App\Http\Requests\TinTucCreateRequest;
use App\Http\Service\TheLoaiService;

class TinTucController extends Controller
{
    //
    protected $tintucService;
    protected $theloaiService;

    public function __construct(TinTucService $tintucService, TheLoaiService $theloaiService)
    {
        $this->tintucService = $tintucService;
        $this->theloaiService = $theloaiService;
    }

    public function index(){
        return view('admin.tintuc.list',[
            'title'=>'Danh sách Tin Tức',
            'tintucs' => $this->tintucService->getList()
        ]);
    }

    public function create(){
        return view('admin.tintuc.add',[
            'title'=>'Thêm mới Tin Tức',
            'theloais' => $this->theloaiService->getAll()
        ]);
    }
    public function store(TinTucCreateRequest $request){
        $result = $this->tintucService->create($request);
        return redirect()->back();
    }
    
    public function delete(Request $request){
        $result = $this->tintucService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "xóa tin tức thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }

    public function edit(TinTuc $tintuc){
        return view('admin.tintuc.edit',[
            'title'=>"Cập nhật Tin Tức",
            'tintuc' => $tintuc,
            'theloais' => $this->theloaiService->getAll()            
        ]);
    }
    public function handleEdit($id, Request $request){
        $result = $this->tintucService->edit($id, $request);
        return redirect()->back();
    }
}