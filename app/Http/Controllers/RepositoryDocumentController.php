<?php
namespace App\Http\Controllers;

use App\Models\Repository;
use App\Models\RepositoryDocument;
use Illuminate\Http\Request;
//This controller has to be finished well

class RepositoryDocumentController extends Controller
{
    public function index(Repository $repository)
    {
        $documents = $repository->documents;
        return view('repository_documents.index', compact('repository', 'documents'));
    }

    public function show(RepositoryDocument $document)
    {
        return view('repository_documents.show', compact('document'));
    }

    public function create(Repository $repository)
    {
        return view('repository_documents.create', compact('repository'));
    }

    public function store(Request $request, Repository $repository)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'file_path' => 'required|string|max:255',
        ]);

        $document = new RepositoryDocument($request->all());
        $document->repository_id = $repository->id;
        $document->save();

        return redirect()->route('repository_documents.index', [$repository])->with('success', 'Document uploaded successfully.');
    }

    public function edit(RepositoryDocument $document)
    {
        return view('repository_documents.edit', compact('document'));
    }

    public function update(Request $request, RepositoryDocument $document)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'file_path' => 'required|string|max:255',
        ]);

        $document->update($request->all());
        return redirect()->route('repository_documents.index', [$document->repository])->with('success', 'Document information updated successfully.');
    }

    public function destroy(RepositoryDocument $document)
    {
        $document->delete();
        return redirect()->route('repository_documents.index')->with('success', 'Document deleted successfully.');
    }
}
