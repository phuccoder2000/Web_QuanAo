<?php

namespace App\Http\Controllers;

use App\Category;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\View\View;

class categoryController extends Controller
{
    use DeleteModelTrait;
    private $category;

    public function __construct(Category $category)
    {
        $this->category =$category;
    }
    public function create()
  {
          $htmlOption = $this->getCategory($parentId = '');
        return View('admin.category.add',compact('htmlOption'));
  }

  public function index()
  {
      $categories =$this->category->latest() ->paginate(5);
      return View('admin.category.index',compact('categories'));
  }
  public function store(Request $request)
  {
      $this->category->create([
          'name' =>$request->name,
          'parent_id' =>$request ->parent_id,
          'slug' => str_slug($request->name)
      ]);
      return redirect() ->route('categories.index');
  }
  public function getCategory($parentId)
  {
      $data = $this ->category ->all();
      $recusive = new Recusive($data);
      $htmlOption =$recusive->categoryRecusive($parentId);
      return $htmlOption;
  }

  public function edit($id)
  {
      $category= $this ->category->find($id);
      $htmlOption = $this->getCategory($category->parent_id);

    return View('admin.category.edit',compact('category','htmlOption'));

  }
  public function update($id , Request $request)
  {
    $this->category->find($id) ->update([
        'name' =>$request->name,
        'parent_id' =>$request ->parent_id,
        'slug' => str_slug($request->name)
    ]);
      return redirect() ->route('categories.index');

  }
  public function delete($id)
  {
      return $this->deleteModelTrait($id, $this->category);
  }
}
