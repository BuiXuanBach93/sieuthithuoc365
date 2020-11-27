<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/13/2017
 * Time: 10:52 AM
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class SubPost  extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'sub_post';

    protected $primaryKey = 'sub_post_id';

    protected $fillable = [
        'sub_post_id',
        'post_id',
        'type_sub_post_slug',
        'theme_code',
        'deleted_at',
        'user_email',
        'updated_at'
    ];

    public static function showSubPost($typePost, $count) {
        try {
            $postModel = new Post();

            $posts = $postModel->join('sub_post', 'sub_post.post_id', '=', 'posts.post_id')
                ->select(
                    'sub_post.sub_post_id',
                    'posts.post_id',
                    'title',
                    'slug',
                    'image',
                    'content',
                    'description'
                )
                ->where('post_type', $typePost)->orderBy('posts.post_id', 'desc')
                ->offset(0)
                ->limit($count)->get();

            foreach($posts as $id => $post) {
                $inputs = Input::where('post_id', $post->post_id)
                    ->get();
                foreach ($inputs as $input) {
                    $posts[$id][$input->type_input_slug] = $input->content;
                }
            }

            return $posts;
        } catch (\Exception $e) {
            Log::error('Entity->SubPost->showSubPost: lấy bài viết thuộc dạng bài viết');

            return null;
        }
    }
}
