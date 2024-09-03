<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TodosExport;

class TodoController extends Controller
{
    public function index()
{
    $todos = [];

    if (auth()->check()) {
        // Lấy id của user hiện tại đang đăng nhập
        $userId = auth()->user()->id;

        // Lấy danh sách các todo của user hiện tại
        $todos = Todo::where('user_id', $userId)->get();
    }

    return view('home', compact('todos'));
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255', // Tiêu đề là bắt buộc và tối đa 255 ký tự
        ]);

        // Thêm cột 'user_id' vào mảng dữ liệu trước khi tạo mới todo
        $todoData = [
            'title' => $request->title,
            'completed' => false, // Mặc định công việc mới chưa hoàn thành
            'user_id' => $request->user_id, // Lấy giá trị 'user_id' từ request
        ];

        Todo::create($todoData);

        return redirect()->route('dashboard')->with('status', 'Todo added successfully!');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'title' => $request->title,
        ]);

        return redirect()->route('dashboard')->with('status', 'Todo updated successfully!');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('dashboard')->with('status', 'Todo deleted successfully!');
    }
    public function updateCheck(Request $request, $id)
    {
        $request->validate([
            'completed' => 'required|boolean',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'completed' => $request->completed,
        ]);

        return response()->json(['message' => 'Todo updated successfully!']);
    }

    public function export() 
    {
        return Excel::download(new TodosExport, 'todos.xlsx');
    }
}

