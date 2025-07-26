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

            $teams = Team::with('plays', 'plays.teams');

            $teams = $teams->where(function ($query) use ($filters) {
                $query->where('team_name', 'LIKE', "%{$filters['search']}%");
                $query->orWhere('team_code', 'LIKE', "%{$filters['search']}%");
            });

            $teams = $teams->get();

            return response()->json([
                'success' => true,
                'message' => 'Equipos obtenidos correctamente',
                'data' => $teams,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener las selecciones: ' . $e->getMessage()
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

            $new = DB::transaction(function () use ($request) {

                $data = $request->only('team_name', 'team_code');

                $data['team_image'] = "placeholder.jpg";

                $new = Team::create($data);

                $request->file('team_image')->storeAs('teams', $new->team_id . '.jpg', 'public');

                $new->update([
                    'team_image' => "/storage/teams/{$new->team_id}.jpg"
                ]);

                return $new;
            });

            return response()->json([
                'success' => true,
                'message' => 'Se creó la selección correctamente',
                'data' => $new,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al crear la selección: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $team = Team::with('plays.teams')->where('team_id', $id)->first();

            $stats = $team->stats();

            $response = $team->toArray();
            $response['stats'] = $stats;

            return response()->json([
                'success' => true,
                'message' => 'Se obtuvo la selección correctamente',
                'data' => $response,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener la selección: ' . $e->getMessage()
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

    /**
     * Get the ranking of the teams
     */
    public function ranking()
    {
        try {
            $teams = Team::all();

            $result = [];
            foreach ($teams as $team) {
                $teamStats = $team->stats();
                $result[] = [
                    'team_name' => $team->team_name,
                    'team_points' => $teamStats['wins'] * 3 + $teamStats['draws'],
                    'team_played' => $teamStats['wins'] + $teamStats['draws'] + $teamStats['losses'],
                    'team_wins' => $teamStats['wins'],
                    'team_draws' => $teamStats['draws'],
                    'team_losses' => $teamStats['losses'],
                    'team_goals_for' => $teamStats['goals_for'],
                    'team_goals_against' => $teamStats['goals_against'],
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Ranking obtenido correctamente',
                'data' => $result,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al obtener el ranking: ' . $e->getMessage()
            ], 500);
        }
    }
}
