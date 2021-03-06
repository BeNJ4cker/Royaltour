<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Continent;
use App\Country;

class AdminCountryController extends Controller
{

  /** Admin Create Country Process **/
  public function AdminCreateCountryProcess(Request $request)
  {

    /* Validate First */

    $request->validate([
      'country_name' => 'required|max:255',
      'continent_id' => 'required',
      'country_img' => 'required|max:2048|image',
      'country_suggest_img' => 'max:2048|image'
    ]);

    /* End Validate */

    $continent = Continent::find($request->continent_id);
    $country = new Country;
    $country->country_name = $request->country_name;
    $country->country_sort = $request->country_sort;
    $country->country_hide = $request->country_hide;
    $country->country_suggest = $request->country_suggest;
    $country->continent_id = $continent->_id;
    $country->continent_name = $continent->continent_name;

    /* Upload Image */

    if ($request->hasFile('country_img')) {
      $image = $request->file('country_img');
      $name = uniqid() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('/assets/img/upload/country');
      $image->move($destinationPath, $name);
      $country->country_img = $name;
    }

    if ($request->hasFile('country_suggest_img')) {
      $image = $request->file('country_suggest_img');
      $name = uniqid() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('/assets/img/upload/country');
      $image->move($destinationPath, $name);
      $country->country_suggest_img = $name;
    }

    $country->save();

    return redirect()->route('admin-country');
  }


  /** Admin Edit Country Process **/
  public function AdminEditCountryProcess(Request $request)
  {

    /* Validate First */

    $request->validate([
      'country_name' => 'required|max:255',
      'continent_id' => 'required',
      'country_img' => 'max:2048|image',
      'country_suggest_img' => 'max:2048|image'
    ]);

    /* End Validate */

    $continent = Continent::find($request->continent_id);
    $country = Country::find($request->country_id);
    $country->country_name = $request->country_name;
    $country->country_sort = $request->country_sort;
    $country->country_hide = $request->country_hide;
    $country->country_suggest = $request->country_suggest;
    $country->continent_id = $continent->_id;
    $country->continent_name = $continent->continent_name;

    /* upload image */

    if ($request->hasFile('country_img')) {

      /* delete old image */


      /* upload new image */

      $image = $request->file('country_img');
      $name = uniqid() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('/assets/img/upload/country');
      $image->move($destinationPath, $name);
      $country->country_img = $name;
    }

    if ($request->hasFile('country_suggest_img')) {
      $image = $request->file('country_suggest_img');
      $name = uniqid() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('/assets/img/upload/country');
      $image->move($destinationPath, $name);
      $country->country_suggest_img = $name;
    }

    $country->save();
    return redirect()->route('admin-country');
  }


  /** Admin Delete Country Process **/
  public function AdminDeleteCountryProcess(Request $request)
  {
    $country = Country::find($request->country_id);

    /* delete image */


    /* End delete image */

    $country->delete();
    return redirect()->route('admin-country');
  }
}
