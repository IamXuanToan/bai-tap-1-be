<?php

namespace App\Http\Controllers;

use App\Models\TaskManager;
use Illuminate\Http\Request;

class TaskManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $text = $request->input('text');
        $status = $request->input('status');
        $date = $request->input('date');
        $tasks = TaskManager::query()->orderByDesc('id');

        // return $request;

        if ($text != null || $status != null || $date != null) {
            $tasks->when($text, function ($tasks, $text){
                return $tasks->where('title', 'like', "%{$text}%");
            })
            ->when($date, function ($tasks, $date){
                return $tasks->whereBetween('start_date', $date);
            })
            ->when($status, function ($tasks, $status){
                return $tasks->whereIn('status', $status);
            });

            return $tasks->get();
        }

        return $tasks->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return TaskManager::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return TaskManager::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $taskManager = TaskManager::findOrFail($id);
        $taskManager->update($request->all());

        return $taskManager;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $taskManager = TaskManager::findOrFail($id);
        $taskManager->delete();

        return 204;
    }
}
