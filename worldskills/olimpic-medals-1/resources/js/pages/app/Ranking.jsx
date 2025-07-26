import { useGetData } from "../../hooks/useApi";

export default function Ranking() {
    const { data: teams, loading: teamsLoading } = useGetData("/teams/ranking");

    if (teamsLoading) return <h1>cargando...</h1>;

    const sortedTeams = teams.sort((a, b) => {
        const aPts = a.stats.win * 3 + a.stats.drawn;
        const bPts = b.stats.win * 3 + b.stats.drawn;
        return bPts - aPts;
    });

    return (
        <section className="w-full flex flex-col gap-5">
            {/* Title */}
            <h1
                className="text-5xl font-bold text-center"
                style={{ marginTop: "3rem", lineHeight: 1.1 }}
            >
                Tabla de posiciones
            </h1>

            {/* Rakning List */}
            <div className="w-full overflow-auto border">
                <table className="w-full">
                    <thead>
                        <tr>
                            <th className="text-left">Pais</th>
                            <th
                                className="text-left"
                                style={{ backgroundColor: "#ff0" }}
                            >
                                Pts
                            </th>
                            <th className="text-left">PJ</th>
                            <th className="text-left">PG</th>
                            <th className="text-left">PE</th>
                            <th className="text-left">PP</th>
                            <th className="text-left">GF</th>
                            <th className="text-left">GC</th>
                            <th className="text-left">GD</th>
                        </tr>
                    </thead>
                    <tbody>
                        {sortedTeams.map((team, idx) => (
                            <tr
                                key={team.team_id}
                                style={{
                                    backgroundColor:
                                        idx === 0
                                            ? "#ffff0050"
                                            : idx === 1
                                            ? "#dddddd50"
                                            : idx === 2
                                            ? "#ff990050"
                                            : "#fff",
                                }}
                            >
                                <td className="text-left">
                                    <div className="flex items-center gap-2 p-1">
                                        <p>{idx + 1}</p>
                                        <figure
                                            className="border rounded"
                                            style={{
                                                width: "30px",
                                                aspectRatio: 1,
                                                overflow: "hidden",
                                            }}
                                        >
                                            <img
                                                src={team.team_image}
                                                alt={`Imagen del equipo ${team.team_name}`}
                                                style={{
                                                    width: "100%",
                                                    height: "100%",
                                                    objectFit: "cover",
                                                }}
                                            />
                                        </figure>
                                        <p className="font-bold">
                                            {team.team_name}
                                        </p>
                                    </div>
                                </td>
                                <td style={{ backgroundColor: "#ff0" }}>
                                    {team.stats.win * 3 + team.stats.drawn}
                                </td>
                                <td>
                                    {team.stats.win +
                                        team.stats.lost +
                                        team.stats.drawn}
                                </td>
                                <td>{team.stats.win}</td>
                                <td>{team.stats.drawn}</td>
                                <td>{team.stats.lost}</td>
                                <td>{team.stats.goals_for}</td>
                                <td>{team.stats.goals_against}</td>
                                <td>
                                    {team.stats.goals_for -
                                        team.stats.goals_against}
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </section>
    );
}
