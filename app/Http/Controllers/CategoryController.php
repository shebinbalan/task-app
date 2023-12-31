<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
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

        $categories = Category::latest()->paginate(5);       

        return view('categories.index',compact('categories'))

                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse

    {

        $request->validate([

            'name' => 'required',          

        ]);       

        Category::create($request->all());        

        return redirect()->route('categories.index')

                        ->with('success','Categories created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View

    {

        return view('categories.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View

    {

        return view('categories.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse

    {

        $request->validate([

            'name' => 'required',          

        ]);       

        $category->update($request->all());       

        return redirect()->route('categories.index')

                        ->with('success','Categories updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse

    {
        $category->delete();     

        return redirect()->route('categories.index')

                        ->with('success','categories deleted successfully');

    }
}
