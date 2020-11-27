<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Task;
use App\Ultility\Error;
use Illuminate\Http\Request;
use App\Entity\User;
use App\Ultility\Ultility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Validator;

class TaskController extends AdminController
{
    protected $role;

    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->role =  Auth::user()->role;

            if (User::isMember($this->role)) {
                return redirect('admin/home');
            }

            return $next($request);
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = new Task();
        try {
            $tasks = $task->orderBy('status','asc')->orderBy('task_id', 'desc')
                ->paginate(200);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->TaskController->index: Lỗi lấy dữ liệu tasks');

            $tasks = null;
        } finally {
            return view('admin.task.list', compact('tasks'));
        }
    }


    public function listMyTask()
    {
        $task = new Task();
        $userId = Auth::user()->id;
        try {
            $tasks = $task->where('assignee', $userId)->orderBy('status','asc')->orderBy('task_id', 'desc')
                ->paginate(200);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->TaskController->listMyTask: Lỗi lấy dữ liệu tasks');

            $tasks = null;
        } finally {
            return view('admin.task.list_mytask', compact('tasks'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.task.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if slug null slug create as title
        $this->insertTask($request);

        return redirect(route('task.index'));
    }

    private function insertTask($request) {
        try {
            $task = new Task();
            $userId = $request->input('assignee');
            $assigneeId = 0;
            $assigneeName = null;
            if($userId > 0){
                $user = User::where('id',$userId)->first();
                $assigneeId = $user->id;
                $assigneeName = $user->name;
            }
            $endDateStr = $request->input('end_date_str');
            $endDate = null;
            if($endDateStr){
                $endDate = new \DateTime($endDateStr);
            }
            $task->insert([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'note' => $request->input('note'),
                'assignee' => $assigneeId,
                'end_date' => $endDate,
                'assignee_name' => $assigneeName,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]);
        } catch(\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi thêm mới task: Dữ liệu nhập vào không hợp lệ');
            Log::error(' http->admin->TaskController->insertTask: Lỗi thêm mới task');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task  $task)
    {
        return View('admin.task.edit', compact('task'));
    }

    public function editMyTask(Task  $task)
    {
        return View('admin.task.edit_mytask', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task  $task)
    {
        $this->updateTask($task, $request);

        return redirect(route('task.index'));
    }

    private function updateTask($task, $request) {
        try {
            $userId = $request->input('assignee');
            $assigneeId = 0;
            $assigneeName = null;
            if($userId > 0){
                $user = User::where('id',$userId)->first();
                $assigneeId = $user->id;
                $assigneeName = $user->name;
            }
            $endDateStr = $request->input('end_date_str');
            $endDate = null;
            if($endDateStr){
                $endDate = new \DateTime($endDateStr);
                $task->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'note' => $request->input('note'),
                'status' => $request->input('status'),
                'assignee' => $assigneeId,
                'assignee_name' => $assigneeName,
                'end_date' => $endDate,
                'updated_at' => new \DateTime()
            ]);
            }else{
                $task->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'note' => $request->input('note'),
                'status' => $request->input('status'),
                'assignee' => $assigneeId,
                'assignee_name' => $assigneeName,
                'updated_at' => new \DateTime()
            ]);
            }
            
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy khi cập nhật task : Dữ liệu nhập vào không hợp lệ');
            Log::error('http->admin->TaskController->updateTask: Lỗi khi cập nhật task');
        }
    }

    public function updateMyTask(Request $request) {
        try {
            $taskId = $request->input('task_id');
            $task = Task::where('task_id', $taskId)->first();
            $endDateStr = $request->input('end_date_str');
            $endDate = null;
            if($endDateStr){
                $endDate = new \DateTime($endDateStr);
                $task->update([
                'status' => $request->input('status'),
                'content' => $request->input('content'),
                'note' => $request->input('note'),
                'end_date' => $endDate,
                'updated_at' => new \DateTime()
            ]);
            }else{
                $task->update([
                'status' => $request->input('status'),
                'content' => $request->input('content'),
                'note' => $request->input('note'),
                'updated_at' => new \DateTime()
            ]);
            }
            
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy khi cập nhật liên hệ: Dữ liệu nhập vào không hợp lệ');
            Log::error('http->admin->TaskController->updateMyTask: Lỗi khi cập nhật liên hệ');
        }finally{
            return redirect(route('my-task'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task  $task)
    {
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
        }
        $task->delete();

        return redirect(route('task.index'));
    }
}
