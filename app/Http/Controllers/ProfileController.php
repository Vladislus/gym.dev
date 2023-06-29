<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('profile.profile', compact('user'));
    }
    public function showID($id)
    {
    $user = User::findOrFail($id);
    return view('profile.profile', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female',
            'age' => 'required|integer',
            'weight' => 'required|numeric|between:0,999.99',
            'bench' => 'nullable|numeric|between:0,999.99',
            'squat' => 'nullable|numeric|between:0,999.99',
            'deadlift' => 'nullable|numeric|between:0,999.99',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);
    
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->sex = $validatedData['sex'];
        $user->age = $validatedData['age'];
        $user->weight = $validatedData['weight'];
        $user->bench = $validatedData['bench'];
        $user->squat = $validatedData['squat'];
        $user->deadlift = $validatedData['deadlift'];
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile'), $imageName);
    
            // Delete the old profile image if it exists
            if ($user->image && File::exists(public_path('profile/' . $user->image))) {
                File::delete(public_path('profile/' . $user->image));
            }
    
            $user->image = $imageName;
        }
    
        $user->save();
    
        return redirect()->route('profile.show');
    }

    public function destroy()
    {
        $user = Auth::user();

        // Delete the profile image if it exists
        if ($user->image && File::exists(public_path('profile/' . $user->image))) {
            File::delete(public_path('profile/' . $user->image));
        }

        $user->delete();

        return redirect()->route('dashboard');
    }
    public function userList()
{
    $users = User::all();
    return view('profile.list', compact('users'));
}
}
