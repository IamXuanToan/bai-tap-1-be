<?php

namespace App\Http\Controllers;

use App\Models\TaskManager;
use Illuminate\Http\Request;

class TaskManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return TaskManager::orderByDesc('id')->get();
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
