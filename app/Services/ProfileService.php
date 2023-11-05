<?php
namespace App\Services;

use Illuminate\Support\Facades\File;
use App\Models\User;

class ProfileService
{

    public function updateProfile(User $user, $request)
    {
        $data = $request->validated();
    
        if ($request->hasfile('image')) {
            $this->deleteOldImage($user->image);
            $user->image = $this->uploadNewImage($request);
        }
    
        $user->update($data);
    }
    
    

    protected function deleteOldImage($imagePath)
    {
        $destinationPath = 'public/image/' . $imagePath;
        if (File::exists($destinationPath)) {
            File::delete($destinationPath);
        }
    }

    protected function uploadNewImage($data)
    {
        $file = $data->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'image/' . time() . '.' . $extension;
        $file->move('image/', $filename);
        return $filename;
    }

    public function getUserProfile($userId)
    {
        return User::findOrFail($userId);
    }

}
