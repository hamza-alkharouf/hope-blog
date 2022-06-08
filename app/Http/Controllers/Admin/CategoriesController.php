<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    
    //
    public function index()
    {
        //$categories = Category::all();
        //SELECT * FROM categories
        //LEFT JOIN categories as parent ON parent.id = categories.parent_id

        // $categories = Category::leftJoin('categories as parent','parent.id','=','categories.parent_id')
        // //->leftJoin('posts','posts.category_id','=','categories.id')
        // ->select([
        //     'categories.id',
        //     'categories.name',
        //     'categories.parent_id',
        //     'categories.created_at',
        //     'parent.name as parent_name',
        //     //DB::raw('COUNT(posts.id) as posts_count'),
        //     ])
        //     ->selectRaw('(SELECT COUNT(*) FROM posts WHERE posts.category_id = categories.id) as posts_count')
        // ->orderBy('categories.parent_id','ASC')
        // ->orderBy('categories.name','ASC')
        // ->groupBy([
        //     'categories.id',
        //     'categories.name',
        //     'categories.parent_id',
        //     'categories.created_at',
        //     'parent_name',
        // ])
        //->paginate(8);

        //with eager loading
        //1 ->  SELECT * FROM categories 
        //2 ->  SELECT * FROM categories  WHERE Id iN (..)

        $categories = Category::with('parent')
        ->withCount('childern')
        ->withCount('posts')
        ->paginate(8);

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }
    
    public function create()
    {
        return view('admin.categories.create', [
            'parents' => Category::all(['id', 'name']),
            'category' => new Category(),
        ]);
    }
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|alpha_num|string|max:250|min:3|unique:categories,name',
            'parent_id' => 'nullable|alpha_num|int|exists:categories,id',
        ]);
        // if($validator->fails()){
        //     print_r($request->all());
        //     dd( $validator->failed() );
        // };
        $validator->validate();

        $categories = new Category;
        $categories->name = $request->post('name');
        $categories->slug = Str::slug($request->post('name'));
        $categories->parent_id = $request->post('parent_id');

        $categories->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category Created!');
    }
    public function edit($id)
    {
        $Category = Category::findOrfail($id);

        $parents = Category::where('id', '<>', $id)->get();
        return view('admin.categories.edit', [
            'category' => $Category,
            'parents' => $parents,
        ]);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => [
                'required',
                'alpha_num',
                'string',
                'max:250',
                'min:3',
                'unique:categories,name,'.$id,
                function($attribute, $value, $fail){
                    if ($value == 'god') {
                        $fail('This word is not allowed!');
                    }
                }
            ],
            'parent_id' => 'nullable|alpha_num|int|exists:categories,id',
        ],
        [
            'required' =>'The :attribute field is required!!!!!!!!!!!!',
        ]);

        $categories = Category::findOrfail($id);

        $categories->name = $request->post('name');
        //$categories->slug = Str::slug($request->post('name'));
        $categories->parent_id = $request->post('parent_id');

        $categories->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category Updated!');
    }
    public function destroy($id)
    {
        Category::destroy($id);
        Category::where('parent_id', '=', $id)->update(['parent_id' => null]);
        return  redirect()->route('admin.categories.index')->with('success', 'Category Deleted!');
    }
}
