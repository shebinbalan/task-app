<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $user = Auth::user();
        $tasks = $user->tasks()->latest()->paginate(5);
        
        return view('tasks.index', compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
    $categories = Category::all();
    return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $task = Auth::user()->tasks()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('tasks.index')
                        ->with('success','Tasks created successfully.');
    }

    /**
     * Display the specified resource.
     */
  
    public function show(Task $task): View
    {
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   
    public function edit(Task $task): View
    {
        if (Auth::user()->id !== $task->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Task $task): RedirectResponse
    {
        if (Auth::user()->id !== $task->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate and update the task
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'category_id' => $request->input('category_id'),
        ]);

        
        return redirect()->route('tasks.index')
                        ->with('success','Tasks updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(Task $task): RedirectResponse
    {
        if (Auth::user()->id !== $task->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();
         
        return redirect()->route('tasks.index')
                        ->with('success','Tasks deleted successfully');
    }
}
