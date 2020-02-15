<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bulletins\IndexRequest;
use App\Http\Requests\Bulletins\ShowRequest;
use App\Http\Requests\Bulletins\CreateRequest;
use App\Http\Requests\Bulletins\StoreRequest;
use App\Http\Requests\Bulletins\DeleteRequest;
use App\Http\Requests\Bulletins\EditRequest;
use App\Http\Requests\Bulletins\UpdateRequest;
use Carbon\Carbon;
use App\Models\Bulletin;
use Illuminate\Support\Facades\Auth;
use Config;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        $bulletins = Bulletin::where('end_date', '>=', Carbon::today())->orderBy('updated_at', 'desc')->paginate(15);
        return view('bulletins.index', compact('bulletins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        return view('bulletins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store(Config::get('uploads.PATH_IMAGE'), 'public');
            $path = explode('/', $path);
            $data['image'] = $path[count($path) - 1];
        } else {
            $data['image'] = null;
        }
        $data['user_id'] = Auth::user()->id;
        $bulletin = Bulletin::create($data);
        return redirect('bulletins/' . $bulletin->id)->with('status', 'Bulletin has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, Bulletin $bulletin)
    {
        return view('bulletins.show', compact('bulletin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request, Bulletin $bulletin)
    {
        return view('bulletins.edit', compact('bulletin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Bulletin $bulletin)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store(Config::get('uploads.PATH_IMAGE'), 'public');
            $path = explode('/', $path);
            $data['image'] = $path[count($path) - 1];
        } else if ($request->delete) {
            $data['image'] = null;
        }
        $bulletin->update($data);
        return redirect('bulletins/' . $bulletin->id)->with('status', 'Bulletin has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request, Bulletin $bulletin)
    {
        $bulletin->delete();
        return redirect('bulletins')->with('status', 'Bulletin has been deleted.');
    }
}
