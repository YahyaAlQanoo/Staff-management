<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //

    public function edit($id)
    {
        // $user = DB::table('users')->where('id', '=', $id)->get();
        $user = User::findOrFail($id);
        return view('edit_profile', ['user' => $user]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'user_bio' => 'required|string|max:250',
            'user_image' => 'nullable|image|mimes:jpg,png|max:1024',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->information = $request->input('user_bio');

        $oldImagePath = $user->image;
        $newImagePath = $this->uploadFile($request);

        if ($newImagePath) {
            $user->image = $newImagePath;
        }

        if ($newImagePath && $oldImagePath) {
            Storage::disk("public")->delete($oldImagePath);
        }


        $saved = $user->save();

        // $department = DB::table('departments')
        //     ->select('name')
        //     ->where('id', '=',$user->department_id)->first();


        return redirect()->route('index');
    }

    protected function uploadFile(Request $request)
    {
        if ($request->hasFile('user_image')) {
            $userImage = $request->file('user_image');
            $imageName = time() . '_image_' . $request->input('username') . '.' . $userImage->getClientOriginalExtension();
            $path = $userImage->storePubliclyAs('images', $imageName, ['disk' => 'public']);
            // $admin->image = 'admins/' . $imageName;
            return $path;
        } else {
            return;
        }
    }
}
