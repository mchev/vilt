<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Pages/Index');
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Admin/Pages/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        Page::create(
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ])
        );

        return redirect()->route('admin.pages.index');
    }

    public function edit(Request $request, Page $page): Response
    {
        return Inertia::render('Admin/Pages/Edit', [
            'page' => $page,
        ]);
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        $page->update(
            $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
            ])
        );

        return redirect()->route('admin.pages.index');
    }

    public function delete(Request $request, Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index');
    }
}
