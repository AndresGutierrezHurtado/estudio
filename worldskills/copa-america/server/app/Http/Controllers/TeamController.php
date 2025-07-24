<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $filters = [
                'search' => $request->input('search', ''),
            ];

            $teams = Team::with('plays');

            $teams = $teams->where(function ($query) use ($filters) {
                $query->where('team_name', 'LIKE', "%{$filters['search']}%");
                $query->orWhere('team_code', 'LIKE', "%{$filters['search']}%");
            });

            return response()->json([
                'success' => true,
                'message' => 'Equipos obtenidos correctamente',
                'data' => $teams,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
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
                    'team_name' => 'required|string',
                    'team_code' => 'required|string|min:3|max:3',
                    'team_image' => 'required|image|dimensions:width=500,height=500'
                ],
                []
            );

            DB::transaction(function () use ($request) {

                $data = $request->only('team_name', 'team_code');

                $new = Team::create($data);

                $request->file('team_image')->store('teams/' . $new->team_id . '.jpg');

                Team::update($new->team_id, [
                    'team_image' => "/storadge/teams/{$new->team_id}"
                ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al : ' . $e->getMessage()
            ], 500);
        }
    }
}
