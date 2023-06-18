<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoMonCreateRequest;
use App\Http\Service\BoMonService;
use App\Models\BoMon;
use Illuminate\Http\Request;

class BoMonController extends Controller
{
    protected $bomonService;

    public function __construct(BoMonService $bomonService)
    {
        $this->bomonService = $bomonService;
    }

    public function index(Request $request){
        return view('admin.bomon.list',[
            'title'=>'Danh sách bộ môn',
            'bomons' => $this->bomonService->getList($request)
        ]);
    }

    public function create(){
        return view('admin.bomon.add',[
            'title'=>'Thêm mới bộ môn'
        ]);
    }
    public function store(BoMonCreateRequest $request){
        $result = $this->bomonService->create($request);
        return redirect()->back();
    }
  
    public function delete(Request $request){
        $result = $this->bomonService->delete($request);
        if ($result){
            return response()->json([
                'error' => 'false',
                'message'=> "Xóa Bộ môn thành công"
            ]);
        }
        return response()->json([
            'error'=>'true'
        ]);
    }
    
    public function edit(BoMon $bomon){
        return view('admin.bomon.edit',[
            'title'=>"Cập nhật Bộ môn",
            'bomon' => $bomon
        ]);
    }

    public function handleEdit($id, Request $request){
        $result = $this->bomonService->edit($id, $request);
        return redirect()->back();
    }
}