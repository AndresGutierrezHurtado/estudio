<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CompetitorController extends Controller
{
    /**
     * Store a newly created competitor in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'competitor_name' => 'required|string',
                    'competitor_lastname' => 'required|string',
                    'competitor_description' => 'required|string',
                    'competitor_birthdate' => 'required|date',
                    'country_id' => 'required|integer|exists:countries,country_id',
                ],
                [
                    'competitor_name.required' => 'El nombre es requerido',
                    'competitor_lastname.required' => 'El apellido es requerido',
                    'competitor_description.required' => 'La descripción es requerida',
                    'competitor_birthdate.required' => 'La fecha de nacimiento es requerida',
                    'country_id.required' => 'El país es requerido',
                    'country_id.exists' => 'El país no existe',
                ]
            );

            $competitor = Competitor::create([
                'competitor_name' => $request->input('competitor_name'),
                'competitor_lastname' => $request->input('competitor_lastname'),
                'competitor_description' => $request->input('competitor_description'),
                'competitor_birthdate' => $request->input('competitor_birthdate'),
                'country_id' => $request->input('country_id'),
            ]);

            return redirect("/competitors?search={$competitor->competitor_name}");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }

    /**
     * Update the specified competitor in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate(
                [
                    'competitor_name' => 'required|string',
                    'competitor_lastname' => 'required|string',
                    'competitor_description' => 'required|string',
                    'competitor_birthdate' => 'required|date',
                    'country_id' => 'required|integer|exists:countries,country_id',
                ],
                [
                    'competitor_name.required' => 'El nombre es requerido',
                    'competitor_lastname.required' => 'El apellido es requerido',
                    'competitor_description.required' => 'La descripción es requerida',
                    'competitor_birthdate.required' => 'La fecha de nacimiento es requerida',
                    'country_id.required' => 'El país es requerido',
                    'country_id.exists' => 'El país no existe',
                ]
            );

            $competitor = Competitor::find($id);

            if (!$competitor) {
                throw new \Exception("No existe ese competidor");
            }
            $competitor->update($request->all());

            return redirect("/competitors?search={$competitor['competitor_name']}");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }

    /**
     * Remove the specified competitor from storage.
     */
    public function destroy(string $id)
    {
        try {
            $competitor = Competitor::find($id);

            if (!$competitor) {
                throw new \Exception("No existe ese competidor");
            }

            Competitor::destroy($id);

            return redirect("/competitors");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
