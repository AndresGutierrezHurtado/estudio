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
            $filters = [
                'search' => $request->input('search', ''),
                'page' => $request->input('page', 1)
            ];

            $countries = Country::where()->paginate(10);

            return [
                'success' => true,
                'message' => 'Paises obtenidos correctamente',
                'data' => [],
                'total' => $countries->total()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Hubo un error al obtener los paises: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
