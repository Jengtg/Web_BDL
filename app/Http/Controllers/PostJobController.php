<?php

namespace App\Http\Controllers;

use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostJobController extends Controller
{
    public function index()
    {
        // Only show jobs posted by the authenticated user
        $pjs = PostJob::where('user_id', Auth::id())->orderBy('created_at', "DESC")->get();
        return view('company.job.index', compact('pjs'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('company.job.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jobtitle' => 'required|max:32',
            'requirements' => 'required',
            'salary' => 'required|string',
            'dateopened' => 'required|date',
            'dateexpired' => 'required|date|after:dateopened',
        ], [
            'idJob.unique' => 'Id telah digunakan.'
        ]);

        PostJob::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        return redirect()->route('pj-index')->with('success', 'Job Berhasil Ditambahkan');
    }

    public function edit(string $id)
    {
        $pj = PostJob::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('company.job.edit', compact('pj'));
    }

    public function update(Request $request, string $id)
    {
        $pj = PostJob::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $pj->update($request->all());

        return redirect()->route('pj-index')->with('success', 'Job Berhasil Diupdate');
    }

    public function destroy(string $id)
    {
        $pj = PostJob::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $pj->delete();

        return redirect()->route('pj-index')->with('success', 'Job Berhasil Dihapus');
    }
}
