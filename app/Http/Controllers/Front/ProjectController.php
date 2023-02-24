<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('front.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create([
            "title" => $request->get('title'),
            "description" => $request->get('project_description')
        ]);

        if ($request->hasFile("image")) {
            $path = $request->image->store('project-images', 'public');
            $image_name = $request->image->hashName();
            $project->main_image = url('/') . "/storage/project-images/" . $image_name;
            $project->save();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('project-images', 'public');
                $image_name = $image->hashName();
                $url = url('/') . "/storage/project-images/" . $image_name;

                Media::create([
                    "image_url" => $url,
                    "project_id" => $project->id
                ]);
            }
        }


        return redirect('/projects')->with('success', 'News successfully added');
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
    public function edit(Project $project)
    {
        return view('front.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->title = $request->get('title');
        $project->description = $request->get('post_description');


        if ($request->hasFile("image")) {
            $path = $request->image->store('project-images', 'public');
            $image_name = $request->image->hashName();
            $project->main_image = url('/') . "/storage/project-images/" . $image_name;
            $project->save();
        }

        if ($request->hasFile('images')) {
            $project->media()->delete();
            foreach ($request->file('images') as $image) {
                $path = $image->store('project-images', 'public');
                $image_name = $image->hashName();
                $url = url('/') . "/storage/project-images/" . $image_name;

                Media::create([
                    "image_url" => $url,
                    "project_id" => $project->id
                ]);
            }
        }

        return redirect('/projects')->with('success', 'Project successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project successfully deleted');
    }
}
