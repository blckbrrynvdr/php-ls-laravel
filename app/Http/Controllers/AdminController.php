<?php

namespace App\Http\Controllers;

use App\Category;
use App\Goods;
use App\Order;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    public function index()
    {
        $goods = $goods = Goods::query()->orderBy('id','desc')->paginate(6);
        return view('admin.index', [
            'goods' => $goods,
            'categories' => Category::all(),
        ]);
    }

    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::all(),
        ]);
    }

    public function goods()
    {
        $goods = Goods::query()->orderBy('id','desc')->paginate(6);
        return view('admin.goods', [
            'goods' => $goods,
            'categories' => Category::all(),
        ]);
    }

    public function orders()
    {
        return view('admin.orders', [
            'orders' => Order::all(),
        ]);
    }

    public function editCategory($id)
    {
        $category = Category::getById($id);
        return view('admin.editCategory', [
            'category' => $category,
        ]);
    }

    public function updateCategory($id)
    {

        $category = Category::getById($id);
        $category->name = $_GET['name'];
        $category->description = $_GET['description'];
        $category->save();
        return redirect('/admin/category/');
    }

    public function addCategory()
    {
        $name = $_GET['name'];
        $description = $_GET['description'];

        $category = new Category(
            [
                'name'=> $name,
                'description'=>$description
            ]
        );

        $category->save();
        return redirect('/admin/category/');
    }

    public function addGood()
    {
        $name = $_GET['name'];
        $description = $_GET['description'];
        $price = (int)$_GET['price'];
        $category = (int)$_GET['category'];

        $good = new Goods(
            [
                'name'=> $name,
                'description'=>$description,
                'price'=>$price,
                'category_id'=> $category
            ]
        );

        $good->save();
        return redirect('/admin/goods/');
    }

    public function editGood($id){
        $good = Goods::getById($id);
        $categories = Category::all();
        return view('admin.editGood', [
            'good' => $good,
            'categories' => $categories
        ]);
    }

    public function updateGood($id)
    {
        $good = Goods::getById($id);
        $good->name = $_GET['name'];
        $good->description = $_GET['description'];
        $good->price = (int)$_GET['price'];
        $good->category_id = (int)$_GET['category'];
        $good->save();
        return redirect('/admin/goods/');
    }

    public function deleteGood($id)
    {
        Goods::getById($id)->delete();
        return redirect('/admin/goods/');
    }
}
