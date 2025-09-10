<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->paginate(10);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
            'join_date' => 'required|date',
            'status' => 'required|in:active,inactive',
            'notes' => 'nullable|string'
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')
                        ->with('success', 'Miembro creado exitosamente.');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'nullable|string|max:20',
            'position' => 'required|string|max:255',
            'join_date' => 'required|date',
            'status' => 'required|in:active,inactive',
            'notes' => 'nullable|string'
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')
                        ->with('success', 'Miembro actualizado exitosamente.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')
                        ->with('success', 'Miembro eliminado exitosamente.');
    }
}