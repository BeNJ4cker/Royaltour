<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Branch;
use App\Staff;

class AdminStaffController extends Controller
{

    /** Admin Create Staff Process **/
    public function AdminCreateStaffProcess(Request $request) {

      /* Validate First */

      $request->validate([
      'staff_name' => 'required|max:255',
      'staff_nickname' => 'required|max:255',
      'staff_tel' => 'required|max:255',
      'staff_email' => 'required|max:255',
      'staff_facebook' => 'required|max:255',
      'staff_line' => 'required|max:255',
      'staff_branch' => 'required',
      'staff_sort' => 'required',
      'staff_img' => 'image|max:2048',
      ]);

      /* End Validate */

      $branch = Branch::find($request->staff_branch);
      $staff = new Staff;
      $staff->staff_name = $request->staff_name;
      $staff->staff_nickname = $request->staff_nickname;
      $staff->staff_tel = $request->staff_tel;
      $staff->staff_email = $request->staff_email;
      $staff->staff_facebook = $request->staff_facebook;
      $staff->staff_line = $request->staff_line;
      $staff->staff_branch_id = $branch->_id;
      $staff->staff_branch_name = $branch->branch_name;
      $staff->staff_sort = $request->staff_sort;
      $staff->staff_hide = $request->staff_hide;

      /* upload image */

      if ($request->hasFile('staff_img')) {
        $image = $request->file('staff_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/img/upload/staff');
        $image->move($destinationPath, $name);
        $staff->staff_img = $name;
      }

      $staff->save();
      return redirect()->route('admin-staff');
    }


    /** Admin Edit Staff Process **/
    public function AdminEditStaffProcess(Request $request) {

      /* Validate First */

      $request->validate([
      'staff_name' => 'required|max:255',
      'staff_nickname' => 'required|max:255',
      'staff_tel' => 'required|max:255',
      'staff_email' => 'required|max:255',
      'staff_facebook' => 'required|max:255',
      'staff_line' => 'required|max:255',
      'staff_branch' => 'required',
      'staff_sort' => 'required',
      'staff_img' => 'image|max:2048',
      ]);

      /* End Validate */

      $branch = Branch::find($request->staff_branch);
      $staff = Staff::find($request->staff_id);
      $staff->staff_name = $request->staff_name;
      $staff->staff_nickname = $request->staff_nickname;
      $staff->staff_tel = $request->staff_tel;
      $staff->staff_email = $request->staff_email;
      $staff->staff_facebook = $request->staff_facebook;
      $staff->staff_line = $request->staff_line;
      $staff->staff_branch_id = $branch->_id;
      $staff->staff_branch_name = $branch->branch_name;
      $staff->staff_sort = $request->staff_sort;
      $staff->staff_hide = $request->staff_hide;

      /* upload image */

      if ($request->hasFile('staff_img')) {
        $image = $request->file('staff_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/img/upload/staff');
        $image->move($destinationPath, $name);
        $staff->staff_img = $name;
      }

      $staff->save();
      return redirect()->route('admin-staff');

    }


    /** Admin Delete Staff Process **/
    public function AdminDeleteStaffProcess(Request $request) {
      $staff = Staff::find($request->staff_id);

      /* delete image */


      /* End delete image */

      $staff->delete();

      return redirect()->route('admin-staff');
    }
}
