<?php

namespace App\Http\Controllers\Site;

use App\Entity\Category;
use App\Entity\Input;
use App\Entity\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/19/2017
 * Time: 9:50 AM
 */
class PostController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    public function index($cate_slug, $slug_post) {
        try{
            $post = $this->getPostDetail($slug_post);
            $category = $this->getCategory($post);
            $title = $post->title;
            if (empty($post->template) or $post->template == 'default'  ) {
               return view('site.default.single', compact('post', 'category'));
            } else {
                return view('site.template.'.$post->template, compact('post', 'category'));
            }
        } catch (\Exception $e) {
            Log::error('http->site->PostController->index: lỗi lấy dữ liệu post');

            return redirect('/');
        }
    }

    private function getPostDetail($slug_post) {
        try {
            $post = Post::where('slug', $slug_post)
                ->where('post_type', 'post')
                ->first();

            $inputs = Input::where('post_id', $post->post_id)->get();
            foreach ($inputs as $input) {
                $post[$input->type_input_slug] = $input->content;
            }

            return $post;
        } catch (\Exception $e) {
            Log::error('http->site->PostController->getPostDetail: lỗi lấy dữ liệu post');

            return redirect('/');
        }
    }

    private function getCategory($post) {
        try {
            $category = Category::join('category_post', 'categories.category_id', '=', 'category_post.category_id')
                ->select('categories.*')
                ->where('category_post.post_id', $post->post_id)
                ->where('categories.parent','=', 0)
                ->whereNull('category_post.deleted_at')
                ->first();

            if (empty($category)) {
                $category = Category::first();
            }

            return $category;
        } catch (\Exception $e) {
            Log::error('http->site->PostController->getPostDetail: lỗi lấy dữ liệu post');

            return redirect('/');
        }
    }

    public function updateCampaign(Request $request) {
        try{
            $postId = $request->input('postId');
            if(!$postId){
                return redirect('/');
            }
            $post = Post::where('post_id', $postId)->first();
            $count = $post->count_click + 1;
            $post->update([
                            'count_click' => $count
                        ]);

            return response([
                'httpCode' => 200
            ])->header('Content-Type', 'text/plain');

        } catch (\Exception $e) {
            Log::error('http->site->PostController->updateCampaign');

            return redirect('/');
        }
    }

    public function updateBannerAds(Request $request) {
        try{
            $postId = $request->input('postId');
            if(!$postId){
                return redirect('/');
            }
            $post = Post::where('post_id', $postId)->first();
            $count = $post->count_click + 1;
            $post->update([
                            'count_click' => $count
                        ]);

            return response([
                'httpCode' => 200
            ])->header('Content-Type', 'text/plain');
            
        }catch (\Exception $e) {
            Log::error('http->site->PostController->updateCampaign');

            return redirect('/');
        }
        

    }

}
