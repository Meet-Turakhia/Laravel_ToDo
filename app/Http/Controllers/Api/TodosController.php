<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $todos = Todo::all();
        // return response($todos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $todo = new Todo();
        // $todo->todos = $request->todo;
        // $todo->save();
        // return response(1, 200);
		$todo = Todo::create([
			'todos' => $request->todo,
			'completed' => 0
		]);
		
		return response()->json(['todo'=> $todo], 200);
		
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Todo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Responsee
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->todos = $request->todo;
        $todo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }
	
	public function complete(Request $request) {
		$todo = Todo::whereId($request->id)->first();
		if(!is_null($todo)) {
			$todo->completed = !$todo->completed;
			$todo->save();
		}
		return response(200);
	}
}
