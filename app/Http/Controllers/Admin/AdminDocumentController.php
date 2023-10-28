<?php

namespace App\Http\Controllers\Admin;

use App\Helper\DocumentHepler;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class AdminDocumentController extends Controller
{
    public function index(Request $request){
        $search_query = $request->search_query;
        return view("admin.pages.doc.index",[
            "search_query"=> $search_query,
        ]);
    }

    public function store(Request $request){
        try {
            $link = DocumentHepler::Upload('file', $request);
            $doc = new Document();
            $doc->name = $request->file('file')->getClientOriginalName();
            $doc->link = $link;
            $doc->save();
            return redirect()->back()->with('success','Thêm thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Thêm thất bại');
        }
    }

    public function download($id){
        try {
            $document = Document::findOrFail($id);
            if($document)
            return response()->download(public_path($document->link), $document->name);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Tải về thất bại');
        }
    }

    public function delete($id){
        try {
            $doc = Document::find($id);
            $doc->delete();
            return redirect()->back()->with('success','Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Xóa thất bại');
        }
    }
}
