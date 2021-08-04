<?php

namespace App\Http\Controllers;

use Redirect;

use Carbon\Carbon;

use App\Http\Controllers\Api\DevelopersApiController as DevelopersApi;

use Illuminate\Http\Request;

class DevelopersController extends Controller
{
    public function create(Request $request) 
    {
        $developers = new DevelopersApi;
        $developers = $developers->create($request);

        if ($developers->status() == 400) {
            return Redirect::back()
                ->withErrors([
                    "Preencha corretamente todos os campos."
                ]);
        };
            
        return Redirect::back();
    }

    public function delete($id) 
    {
        $developers = new DevelopersApi;
        $developers = $developers->delete($id);

        if ($developers->status() == 400) {
            return Redirect::back()
                ->withErrors([
                    $developers->content()
                ]);
        };
            
        return Redirect::back();
    }

    public function get($id)
    {
        $developer = new DevelopersApi;
        $developer = $developer->get($id);

        return back()
            ->withInput([
                'id' => $developer->id,
                'name' => $developer->name,
                'sex' => $developer->sex,
                'birthdate' => $developer->birthdate,
                'age' => $developer->age,
                'hobby' => $developer->hobby,
            ]);
    }

    public function developers() 
    {
        $developers = new DevelopersApi;
        $developers = $developers->developers();

        return view('developers', compact(
            'developers'
        ));
    }

    public function update(Request $request) 
    {
        $developers = new DevelopersApi;
        $developers = $developers->update($request);

        if ($developers->status() == 400) {
            return Redirect::back()
                ->withErrors([
                    "Preencha corretamente todos os campos."
                ]);
        };
            
        return Redirect::back();
    }
}
