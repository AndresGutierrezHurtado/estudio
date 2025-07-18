<?php

namespace App\Http\Controllers;

use App\Models\Medal;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MedalController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'country_id' => 'required|integer',
                    'medal_sport' => 'required|string',
                    'medal_year' => 'required|integer|min:1900|max:2025',
                    'medal_type' => 'required|in:gold,silver,bronze',
                ],
            );

            $medal = Medal::create($request->all());

            return redirect("/medals?search={$medal->medal_sport}");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate(
                [
                    'country_id' => 'required|integer',
                    'medal_sport' => 'required|string',
                    'medal_year' => 'required|integer|min:1900|max:2025',
                    'medal_type' => 'required|in:gold,silver,bronze',
                ],
            );

            $medal = Medal::where('medal_id', $id)->update($request->only('country_id', 'medal_sport', 'medal_year', 'medal_type'));

            return redirect("/medals?search={$medal->medal_sport}");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $existingMedal = Medal::find($id);

            if (!$existingMedal) {
                throw new \Exception("La medalla no existe");
            }

            Medal::destroy($id);

            return redirect("/medals");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
