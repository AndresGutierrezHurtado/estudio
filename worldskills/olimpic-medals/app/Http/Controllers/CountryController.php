<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CountryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'country_code' => 'required|string|min:3|max:3|unique:countries,country_code',
                    'country_name' => 'required|string'
                ],
                [
                    'country_code.min' => 'El código debe tener mínimo 3 carácteres',
                    'country_code.max' => 'El código debe tener máximo 3 carácteres',
                    'country_code.unique' => 'El código debe ser único',

                ]
            );

            $country = Country::create([
                'country_name' => strtolower($request->input('country_name')),
                'country_code' => strtoupper($request->input('country_code')),
            ]);

            return redirect("/countries?search={$country->country_code}");
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
                    'country_code' => 'required|string|min:3|max:3',
                    'country_name' => 'required|string'
                ],
                [
                    'country_code.min' => 'El código debe tener mínimo 3 carácteres',
                    'country_code.max' => 'El código debe tener máximo 3 carácteres',
                ]
            );

            $country = Country::find($id);

            if (!$country) {
                throw new \Exception("No existe ese país");
            }

            if ($country->country_code !== $request->input('country_code')) {
                $countrycode = Country::firstWhere('country_code',  $request->input('country_code'));

                if ($countrycode) {

                    throw new \Exception("El país con el código {$countrycode->country_code} ya existe");
                }
            }

            $country->update($request->all());

            return redirect("/countries?search={$country['country_code']}");
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
            $country = Country::withCount('medals')->find($id);

            if (!$country) {
                throw new \Exception("No existe ese país");
            }

            $country->destroy();

            return redirect("/countries");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
