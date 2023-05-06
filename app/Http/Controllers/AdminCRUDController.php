<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminCRUDController extends Controller
{
  

    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){

        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'wildlifePermit' => 'required',
            'businessName' => 'required',
            'ownerName' => 'required',
            'address' => 'required',
            'contact' => 'required|min:11',            
            'email' => 'required|email|unique:users,email',  

        ]);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'wildlifePermit' => 'required',
            'businessName' => 'required',
            'ownerName' => 'required',
            'address' => 'required',
            'contact' => 'required|min:11',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($data);

        return redirect('admin/dashboard/users')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
    
        if ($user) {
            $user->delete();
            return redirect('admin/dashboard/users')->with('success', 'User deleted successfully.');
        } else {
            return redirect('admin/dashboard/users')->with('error', 'User not found.');
        }
    }

}
