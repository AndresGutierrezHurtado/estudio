<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $sort = $request->input('sort', 'country_code:asc');
            $order = explode(':', $sort)[1];
            $sort = explode(':', $sort)[0];

            $filters = [
                'search' => $request->input('search', ''),
                'page' => $request->input('page', 1),
                'limit' => $request->input('limit', 10),
                'sort' => $sort,
                'order' => $order
            ];

            $countries = Country::with('medals', 'medals.competitors')
                ->withCount('medals')
                ->where(function ($query) use ($filters) {
                    $query->where('country_name', 'LIKE', "%{$filters['search']}%");
                    $query->orWhere('country_code', 'LIKE', "%{$filters['search']}%");
                })->paginate($filters['limit']);

            return response()->json([
                'success' => true,
                'message' => 'Paises obtenidos correctamente',
                'data' => $countries->getCollection(),
                'total' => $countries->total()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener los paises: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'country_code' => 'required|string|min:3|max:3',
                    'country_name' => 'required|string',
                ]
            );

            $existingCountry = Country::where('country_code', $request->input('country_code'))->first();

            if ($existingCountry) {
                throw new \Exception("Ya existe un país con ese código");
            }

            $newCountry = Country::create([
                'country_code' => $request->input('country_code'),
                'country_name' => $request->input('country_name'),
            ]);

            if (!$newCountry) {
                throw new \Exception("Hubo un error al crear el país");
            }

            return response()->json([
                'success' => true,
                'message' => 'País creado exitosamente',
                'data' => $newCountry,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al crear el pais: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $country = Country::with('medals', 'medals.competitors')
                ->withCount('medals')
                ->where('country_id', $id)->first();

            return response()->json([
                'success' => true,
                'message' => 'País obtenido correctamente',
                'data' => $country,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener el país: ' . $e->getMessage(),
            ], 500);
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
                    'country_name' => 'required|string',
                ]
            );

            $country = Country::where('country_id', $id)->first();

            if (!$country) {
                throw new \Exception("No se encontró el país o no existe");
            }

            if ($request->input('country_code') !== $country->country_code) {
                $existingCountry = Country::where('country_code', $request->input('country_code'))->first();

                if ($existingCountry) {
                    throw new \Exception("Ya existe un país con ese código");
                }
            }

            $country->update($request->only('country_code', 'country_name'));

            return response()->json([
                'success' => true,
                'message' => 'País actualizado correctamente',
                'data' => $country,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al actualizar el país: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $existingCountry = Country::withCount('medals')->where('country_id', $id)->first();


            if (!$existingCountry) {
                throw new \Exception("No se encuentra el país");
            }

            if ($existingCountry->medal_count > 0) {
                throw new \Exception("El país cuenta con medallas registradas, para eliminarlo debes eliminarlas primero");
            }

            $existingCountry->destroy();

            return response()->json([
                'success' => true,
                'message' => 'País eliminado correctamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al eliminar el país: ' . $e->getMessage(),
            ], 500);
        }
    }
}
