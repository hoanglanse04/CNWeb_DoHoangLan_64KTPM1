<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $issues = Issue::with(('Computer'))->paginate(10);
        return view('issues.home', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Computers = Computer::all();
        return view('issues.create',compact('Computers'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'computer_id' => 'required',
            'report_by' => 'required|string|max:255',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,Inprogress,Resolved',
            'report_date'=>'required|'
        ]);
    
        // Lấy thông tin máy tính từ database
        $computer = Computer::findOrFail($request->computer_id);
    
        // Tạo mới một bản ghi
        Issue::create([
            'computer_id' => $computer->id,
            'model' => $computer->model, // Lấy từ database
            'report_by' => $request->report_by,
            'report_date' => $request->report_date,            
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
    
        return redirect()->route('home')->with('success', 'Sự cố đã được thêm thành công.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $computers = Computer::all();
        $issue =Issue::findOrFail($id);
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'computer_id' => 'required',
            'report_by' => 'required|string|max:255',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,Inprogress,Resolved',
            'report_date' => 'required|date',
        ]);
    
        // Tìm bản ghi Issue cần cập nhật
        $issue = Issue::findOrFail($id);
    
        // Lấy thông tin máy tính từ database
        $computer = Computer::findOrFail($request->computer_id);
    
        // Cập nhật bản ghi
        $issue->update([
            'computer_id' => $computer->id,
            'model' => $computer->model, // Lấy từ database
            'report_by' => $request->report_by,
            'report_date' => $request->report_date,            
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
    
        // Trở lại với thông báo thành công hoặc chuyển hướng nếu cần
        return redirect()->route('home')->with('success', 'Cập nhật thành công');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::find($id);
        $issue->delete();

        return redirect()->route('home')->with('success', 'Đồ án được xóa thành công');

    }
}
