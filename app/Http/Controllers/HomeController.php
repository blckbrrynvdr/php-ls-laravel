<?php

namespace App\Http\Controllers;

use App\Category;
use App\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $goods = Goods::query()->orderBy('id','desc')->paginate(6);
        return view('home', [
            'goods' => $goods,
            'categories' => Category::all(),
            'current_category' => 0,
            'is_admin' => $user && $user->isAdmin()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyGood($id)
    {
        $user = Auth::user();
        $good = Goods::getById($id);
        return view('buy', [
            'good' => $good,
            'user' => $user,
            'current_category' => 0,
            'is_admin' => $user && $user->isAdmin()
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detailGood($id)
    {
        $user = Auth::user();
        $good = Goods::getById($id);
        $category = Category::query()->where('id','=',$good->category_id)->get()->first();
        return view('good', [
            'good' => $good,
            'category' => $category,
            'current_category' => 0,
            'is_admin' => $user && $user->isAdmin()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category($id)
    {
        $user = Auth::user();
        $category = Category::query()->where('id','=',$id)->get()->first();
        $goods = Goods::query()->where('category_id', '=', $category->id)->get();
        return view('category', [
            'goods' => $goods,
            'category' => $category,
            'current_category' => $id ?? 0,
            'is_admin' => $user && $user->isAdmin()
        ]);
    }

    public function deleteCategory($id)
    {
        Category::destroy($id);
        return redirect('/');
    }
}
