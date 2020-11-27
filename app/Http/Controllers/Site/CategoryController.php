<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/19/2017
 * Time: 10:21 AM
 */

namespace App\Http\Controllers\Site;


use App\Entity\Category;
use App\Entity\Input;
use App\Entity\Post;
use App\Ultility\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    public function index($cate_slug, Request $request) {
        try{
            $category = $this->getCategoryDetail($cate_slug);
            $posts = $this->getPosts($category, $request);
                
            if ($category->template == 'default') {
                return view('site.default.category', compact('category', 'posts'));
            } else {
                return view('site.template.'.$category->template, compact('category', 'posts'));
            }
        } catch (\Exception $e) {
            Log::error('http->site->CategoryController->index: lỗi lấy dữ liệu category');

            return redirect('/');
        }
    }

    private function getCategoryDetail($cateSlug) {
        try {
            $category = Category::where('slug', $cateSlug)
                ->where('post_type', 'post')
                ->first();

            $inputs = Input::where('cate_id', $category->category_id)->get();
            foreach ($inputs as $input) {
                $category[$input->type_input_slug] = $input->content;
            }

            return $category;
        } catch (\Exception $e) {
            Log::error('http->site->CategoryController->getCategoryDetail: Lỗi hiển thị category');

            return redirect('/');
        }
    }

    private function getPosts($category, $request) {
        try {
            $posts = Post::leftJoin('category_post', 'category_post.post_id', '=', 'posts.post_id')
                ->select('posts.*')
                ->where('category_post.category_id', $category->category_id)
                ->where('visiable', 0)
                ->where('posts.post_type', 'post')
                ->where('category_post.deleted_at','=' , null)
                ->orderBy('posts.post_id', 'desc');

            if (!empty($request->input('word'))) {
                $word = $request->input('word');
                $posts =  $posts->where('posts.slug', 'like', '%'.Ultility::createSlug($word).'%');
            }
            $posts = $posts->paginate(10);

            return $posts;
        } catch(\Exception $e) {
            Log::error('http->site->CategoryController->getPosts: Lỗi hiển thị category');

            return array();
        }
    }
    
}
