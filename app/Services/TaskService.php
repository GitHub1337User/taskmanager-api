<?php 

namespace App\Services;

use App\Models\Task;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskService
{
    public function getAllTask(int $status_id=null)
    {

        if($status_id!==null){
            $task = Task::where('status_id',$status_id)->get();
        }
        else{
            $task = Task::all();
        }

        $task = $task->sortBy('expire_date');
        return new TaskCollection($task);
    }

    public function getTaskById($id)
    {
        try{
            $task = Task::findOrFail($id);
            return new TaskResource($task);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['message' => 'Not found'], 404);

        }
        $task = Task::findOrFail($id);
        return new TaskResource($task);
        // return new TaskResource($task);
    }

    public function createTask($data)
    {
    
        $task = Task::create($data);

        return new TaskResource($task);
    }

    public function updateTask($id, $data)
    {
        try{
            $task = Task::findOrFail($id);
            $task->update([
                'title'=>$data['title'],
                'describe'=>$data['describe'],
                'status_id'=>$data['status_id'],
                'expire_date'=>$data['expire_date'],
            ]);
            $task->save();
            return new TaskResource($task);

        }
        catch(ModelNotFoundException $e){
            return response()->json(['message' => 'Not found'], 404);

        }
    }

    public function deleteTask($id)
    {
        try{
            Task::findOrFail($id)->delete();
            return response()->json(['message' => 'Task deleted'], 200);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['message' => 'Not found'], 404);
        }
    }
}
