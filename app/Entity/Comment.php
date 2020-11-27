<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 11/1/2017
 * Time: 2:14 PM
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Comment extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'comments';

    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'comment_id',
        'content',
        'user_id',
        'post_id',
        'parent',
        'customer_name',
        'customer_email',
        'customer_phone',
        'ip_customer',
        'deleted_at',
        'rating',
        'updated_at'
    ];

    public function getAllComment($postId) {
        try {
            $parentComments = $this->leftJoin('users', 'users.id', '=', 'comments.user_id')
                ->select(
                    'comments.*',
                    'users.id as user_id',
                    'users.image as user_image',
                    'users.name as user_full_name'
                )
                ->where('comments.post_id', $postId)
                ->where('comments.parent', 0)
                ->orderBy('comment_id', 'desc')
                ->distinct()
                ->get();

            foreach ($parentComments as $id => $comment) {
                $parentComments[$id]->childrenComments = $this->getAllChildComment($postId, $comment->comment_id);;
            }

            return $parentComments;
        } catch (\Exception $e) {
            Log::error('Entity->Comment->getAllComment: Lỗi lấy tất cả comment');

            return null;
        }
    }

    public function getAllChildComment($postId, $parent) {
        try {
            $childrenComments = $this->leftJoin('users', 'users.id', '=', 'comments.user_id')
                ->select(
                    'comments.*',
                    'users.id as user_id',
                    'users.image as user_image',
                    'users.name as user_full_name'
                )
                ->where('comments.post_id', $postId)
                ->where('parent', $parent)
                ->where('comments.parent', '!=', 0)
                ->get();

            return $childrenComments;
        } catch (\Exception $e) {
            Log::error('Entity->Comment->getAllChildComment: Lỗi lấy các comment con');

            return null;
        }
    }

    public static function getCommentHome() {
        try {
            $commentModel = new Comment();

            return $commentModel->leftjoin('users', 'users.id', '=', 'comments.user_id')
                ->leftJoin('posts', 'posts.post_id', '=', 'comments.post_id')
                ->select(
                    'comments.*',
                    'users.name as user_full_name',
                    'posts.title',
                    'posts.slug',
                    'posts.post_type'
                )
                ->offset(0)
                ->limit(4)->get();
        } catch (\Exception $e) {
            Log::error('Entity->Comment->getCommentHome: Lỗi lấy comment show ngoài trang chủ');

            return null;
        }
    }

    public static function getCountComment($postId) {
        try {
            $commentModel = new Comment();

            return $commentModel->where('comments.post_id', $postId)->count();

        } catch (\Exception $e) {
            Log::error('Entity->Comment->getCountComment: Lỗi tính tổng số comment');

            return 0;
        }


    }
}
