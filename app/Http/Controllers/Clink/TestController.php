<?php

namespace App\Http\Controllers\Clink;

use App\Test;
use App\Clink;
use App\Http\Controllers\Controller;
use Session;
class TestController extends Controller
{
    /**
     * Display a list of Tests.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('clink');
        $clink = Clink::find($id);
        
        $tests = $clink->tests;

        return view('clink.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new Test
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clink.tests.add');
    }

    /**
     * Save new Test
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Test::validationRules());

        $test = Test::create($validatedData);

        return redirect()->route('clink.tests.index')->with([
            'type' => 'success',
            'message' => 'Test added'
        ]);
    }

    /**
     * Show the form for editing the specified Test
     *
     * @param \App\Test $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('clink.tests.edit', compact('test'));
    }

    /**
     * Update the Test
     *
     * @param \App\Test $test
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Test $test)
    {
        $validatedData = request()->validate(
            Test::validationRules($test->id)
        );

        $test->update($validatedData);

        return redirect()->route('clink.tests.index')->with([
            'type' => 'success',
            'message' => 'Test Updated'
        ]);
    }

    /**
     * Delete the Test
     *
     * @param \App\Test $test
     * @return void
     */
    public function destroy(Test $test)
    {
        if ($test->clinks()->count()) {
            return redirect()->route('clink.tests.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $test->delete();

        return redirect()->route('clink.tests.index')->with([
            'type' => 'success',
            'message' => 'Test deleted successfully'
        ]);
    }
}
