<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword(Request $request)
    {
        $current = $request->current;
        $new = $request->newPassword;

        $user = auth()->user();
        $checkPass = Hash::check($current, $user->password);
        if ($checkPass) {
            User::where('id', $user->id)->update([
                'password' => Hash::make($new)
            ]);
            return 'success';
        }
        return 'wrong_password';
    }
}
