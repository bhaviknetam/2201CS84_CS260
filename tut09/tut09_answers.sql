-- create a db
create database cricket;
use cricket;

CREATE TABLE players (
    player_id INT PRIMARY KEY,
    player_name VARCHAR(50),
    dob DATE,
    batting_hand VARCHAR(100),
    bowling_skill VARCHAR(50),
    country_name VARCHAR(20)
);

CREATE TABLE teams (
    team_id INT PRIMARY KEY,
    team_name VARCHAR(50)
);

CREATE TABLE matches (
    match_id INT PRIMARY KEY,
    team_1 INT,
    team_2 INT,
    match_date DATE,
    season_id INT,
    venue VARCHAR(100),
    toss_winner INT,
    toss_decision VARCHAR(20),
    win_type VARCHAR(20),
    win_margin INT,
    outcome_type VARCHAR(30),
    match_winner INT,
    man_of_the_match INT
);

CREATE TABLE player_match (
    match_id INT,
    player_id INT,
    role VARCHAR(30),
    team_id INT,
    PRIMARY KEY (match_id, player_id),
    FOREIGN KEY (match_id) REFERENCES matches(match_id),
    FOREIGN KEY (player_id) REFERENCES players(player_id),
    FOREIGN KEY (team_id) REFERENCES teams(team_id)
);

CREATE TABLE ball_by_ball (
    match_id INT,
    over_id DECIMAL,
    ball_id DECIMAL,
    innings_no DECIMAL,
    team_batting INT,
    team_bowling INT,
    striker_batting_position INT,
    striker INT,
    non_striker INT,
    bowler INT,
    FOREIGN KEY (match_id) REFERENCES matches(match_id),
    FOREIGN KEY (team_batting) REFERENCES teams(team_id),
    FOREIGN KEY (team_bowling) REFERENCES teams(team_id),
    FOREIGN KEY (striker) REFERENCES players(player_id),
    FOREIGN KEY (non_striker) REFERENCES players(player_id),
    FOREIGN KEY (bowler) REFERENCES players(player_id)
);

CREATE TABLE batsman_scored (
    match_id INT,
    over_id INT,
    ball_id INT,
    runs_scored DECIMAL,
    innings_no INT,
    FOREIGN KEY (match_id) REFERENCES matches(match_id)
);

CREATE TABLE wicket_taken (
    match_id INT,
    over_id INT,
    ball_id INT,
    player_out INT,
    kind_out VARCHAR(30),
    innings_no INT,
    FOREIGN KEY (match_id) REFERENCES matches(match_id),
    FOREIGN KEY (player_out) REFERENCES players(player_id)
);

CREATE TABLE extra_runs (
    match_id INT,
    over_id INT,
    ball_id INT,
    extra_type VARCHAR(30),
    extra_runs INT,
    innings_no INT,
    FOREIGN KEY (match_id) REFERENCES matches(match_id)
);
-- Load all .csv files into tables
-- Paste the path of .csv file in below apostrophe for all files
load data infile "D:/2201CS84_CS260-main/tut09/player.csv" into table players
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

load data infile "D:/2201CS84_CS260-main/tut09/team.csv" into table teams
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

load data infile "D:/2201CS84_CS260-main/tut09/match.csv" into table matches
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

load data infile "D:/2201CS84_CS260-main/tut09/player_match.csv" into table player_match
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

load data infile "D:/2201CS84_CS260-main/tut09/ball_by_ball.csv" into table ball_by_ball
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

load data infile "D:/2201CS84_CS260-main/tut09/batsman_scored.csv" into table batsman_scored
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

load data infile "D:/2201CS84_CS260-main/tut09/wicket_taken.csv" into table wicket_taken
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

load data infile "D:/2201CS84_CS260-main/tut09/extra_runs.csv" into table extra_runs
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n';

-- Q1
SELECT player_name
FROM players
WHERE batting_hand = 'Left-hand bat'
AND country_name = 'England'
ORDER BY player_name;

-- Q2
SELECT player_name, 
       FLOOR(DATEDIFF('2018-12-02', dob) / 365) AS player_age
FROM players
WHERE bowling_skill = 'Legbreak googly'
AND FLOOR(DATEDIFF('2018-12-02', dob) / 365) >= 28
ORDER BY player_age DESC, player_name;

-- Q3
SELECT match_id, toss_winner
FROM matches
WHERE toss_decision = 'bat'
ORDER BY match_id;

-- Q4
SELECT over_id, runs_scored
FROM batsman_scored
WHERE match_id = 335987 AND runs_scored <= 7
ORDER BY runs_scored DESC, over_id;

-- Q5
SELECT DISTINCT players.player_name
FROM players
JOIN wicket_taken ON players.player_id = wicket_taken.player_out
ORDER BY players.player_name;

-- Q6
SELECT matches.match_id,
       team1.team_name AS team_1,
       team2.team_name AS team_2,
       winner.team_name AS winning_team_name,
       matches.win_margin AS win_margin
FROM matches
JOIN teams AS team1 ON matches.team_1 = team1.team_id
JOIN teams AS team2 ON matches.team_2 = team2.team_id
JOIN teams AS winner ON matches.match_winner = winner.team_id
WHERE matches.win_margin >= 60
ORDER BY matches.win_margin, matches.match_id;

-- Q7
SELECT player_name
FROM players
WHERE batting_hand = 'Left-hand bat'
AND FLOOR(DATEDIFF('2018-12-02', dob) / 365) < 30
ORDER BY player_name;

-- Q8
SELECT match_id, SUM(runs_scored) AS total_runs
FROM batsman_scored
GROUP BY match_id
ORDER BY match_id;

-- Q9
SELECT m.match_id,
       b.over_id,
       MAX(b.runs_scored) AS maximum_runs,
       p.player_name
FROM matches m
JOIN batsman_scored b ON m.match_id = b.match_id
JOIN players p ON b.ball_id = p.player_id
JOIN (
    SELECT match_id, MAX(runs_scored) AS max_runs
    FROM batsman_scored
    GROUP BY match_id
) AS max_runs_per_match ON b.match_id = max_runs_per_match.match_id AND b.runs_scored = max_runs_per_match.max_runs
GROUP BY m.match_id, b.over_id, p.player_name
ORDER BY m.match_id, b.over_id;

-- Q10
SELECT p.player_name, COUNT(*) AS run_outs
FROM players p
JOIN wicket_taken wt ON p.player_id = wt.player_out
WHERE wt.kind_out = 'run out'
GROUP BY p.player_name
ORDER BY run_outs DESC, p.player_name;

-- Q11
SELECT kind_out AS out_type, COUNT(*) AS total
FROM wicket_taken
GROUP BY kind_out
ORDER BY total DESC, out_type;

-- Q12
SELECT teams.team_name AS name, COUNT(*) AS number
FROM teams
JOIN matches ON teams.team_id = matches.match_winner
GROUP BY teams.team_name
ORDER BY teams.team_name;

-- Q13
SELECT m.venue, COUNT(*) AS wides_count
FROM matches AS m
JOIN extra_runs AS er ON m.match_id = er.match_id
AND er.extra_type = 'wides'
GROUP BY venue
ORDER BY wides_count DESC, venue ASC LIMIT 1;

-- Q14
SELECT venue
FROM (
    SELECT matches.venue, COUNT(*) AS win_count
    FROM matches
    JOIN teams AS team1 ON matches.team_1 = team1.team_id
    JOIN teams AS team2 ON matches.team_2 = team2.team_id
    WHERE (matches.toss_decision = 'field'
      AND ((matches.toss_winner = matches.team_1 AND matches.match_winner = matches.team_1) OR
           (matches.toss_winner = matches.team_2 AND matches.match_winner = matches.team_2))) OR 
           (matches.toss_decision = 'bat'
      AND ((matches.toss_winner = matches.team_1 AND matches.match_winner = matches.team_2) OR
           (matches.toss_winner = matches.team_2 AND matches.match_winner = matches.team_1)))
    GROUP BY matches.venue
) AS venues_with_wins
ORDER BY win_count DESC, venue ASC;

-- Q15
SELECT player_name
FROM (
    SELECT players.player_name,
           ROUND(SUM(batsman_scored.runs_scored) / COUNT(DISTINCT wicket_taken.player_out), 3) AS bowling_average
    FROM players
    JOIN ball_by_ball ON players.player_id = ball_by_ball.bowler
    JOIN wicket_taken ON ball_by_ball.match_id = wicket_taken.match_id
                     AND ball_by_ball.over_id = wicket_taken.over_id
                     AND ball_by_ball.ball_id = wicket_taken.ball_id
    JOIN batsman_scored ON ball_by_ball.match_id = batsman_scored.match_id
                        AND ball_by_ball.over_id = batsman_scored.over_id
                        AND ball_by_ball.ball_id = batsman_scored.ball_id
    WHERE (wicket_taken.kind_out != 'run out') OR (wicket_taken.kind_out != 'retired hurt') OR (wicket_taken.kind_out != 'obstructing the field')
    GROUP BY players.player_name
) AS bowling_stats
ORDER BY bowling_average, player_name;

-- Q16
SELECT DISTINCT players.player_name, teams.team_name AS name
FROM players
JOIN player_match ON players.player_id = player_match.player_id
JOIN matches ON player_match.match_id = matches.match_id
JOIN teams ON player_match.team_id = teams.team_id
WHERE player_match.role = 'CaptainKeeper'
AND matches.match_winner = player_match.team_id
ORDER BY players.player_name;

-- Q17
WITH fifty_scorers AS (
    SELECT DISTINCT ball_by_ball.striker AS player_id
    FROM ball_by_ball
    JOIN batsman_scored ON ball_by_ball.match_id = batsman_scored.match_id
                        AND ball_by_ball.over_id = batsman_scored.over_id
                        AND ball_by_ball.ball_id = batsman_scored.ball_id
                        AND ball_by_ball.innings_no = batsman_scored.innings_no
    GROUP BY ball_by_ball.match_id, ball_by_ball.striker
    HAVING SUM(batsman_scored.runs_scored) >= 50
),
total_runs AS (
    SELECT ball_by_ball.striker AS player_id, SUM(batsman_scored.runs_scored) AS runs_scored
    FROM ball_by_ball
    JOIN batsman_scored ON ball_by_ball.match_id = batsman_scored.match_id
                        AND ball_by_ball.over_id = batsman_scored.over_id
                        AND ball_by_ball.ball_id = batsman_scored.ball_id
                        AND ball_by_ball.innings_no = batsman_scored.innings_no
    GROUP BY ball_by_ball.striker
)
SELECT total_runs.player_id, total_runs.runs_scored AS runs_scored
FROM fifty_scorers
JOIN total_runs ON total_runs.player_id = fifty_scorers.player_id
ORDER BY runs_scored DESC, players.id;

-- Q18
SELECT DISTINCT players.player_name
FROM players
JOIN (
    WITH derived18_3 AS (
        WITH derived18_1 AS (
            WITH derived18 AS (
                (SELECT ball_by_ball.match_id AS match_id, 
                        ball_by_ball.over_id AS over_id, 
                        ball_by_ball.ball_id AS ball_id, 
                        ball_by_ball.innings_no AS innings_no, 
                        striker AS player_id, 
                        runs_scored AS runs 
                 FROM ball_by_ball
                 JOIN batsman_scored ON ball_by_ball.match_id = batsman_scored.match_id 
                                    AND ball_by_ball.over_id = batsman_scored.over_id 
                                    AND ball_by_ball.ball_id = batsman_scored.ball_id 
                                    AND ball_by_ball.innings_no = batsman_scored.innings_no
                )
            )
            SELECT player_id, match_id 
            FROM derived18 
            GROUP BY player_id, match_id 
            HAVING SUM(runs) >= 100 
            ORDER BY match_id
        ),
        derived18_2 AS (
            (SELECT match_id, team_1 AS loser 
             FROM matches 
             WHERE match_winner = team_2
            )
            UNION 
            (SELECT match_id, team_2 AS loser 
             FROM matches 
             WHERE match_winner = team_1
            )
        )
        SELECT player_id, derived18_1.match_id, loser AS team_id 
        FROM derived18_1
        JOIN derived18_2 ON derived18_1.match_id = derived18_2.match_id
    )
    SELECT player_match.player_id AS player_id 
    FROM player_match
    JOIN derived18_3 ON derived18_3.team_id = player_match.team_id 
                     AND derived18_3.player_id = player_match.player_id 
                     AND derived18_3.match_id = player_match.match_id
) AS derived18_4 ON derived18_4.player_id = players.player_id
ORDER BY players.player_name;

-- Q19
WITH teamLost AS (
    (SELECT match_id, venue, team_1 AS loser FROM matches WHERE match_winner != team_1)
    UNION 
    (SELECT match_id, venue, team_2 AS loser FROM matches WHERE match_winner != team_2)
)
SELECT match_id, venue 
FROM teamLost 
WHERE loser = (SELECT team_id FROM teams WHERE team_name = 'Kolkata Knight Riders')
ORDER BY match_id;

-- Q20
SELECT player_name
FROM players
JOIN (
    SELECT player_id, ROUND((runs / num_matches), 3) AS batting_avg
    FROM (
        WITH derived20 AS (
            WITH runs_scored AS (
                SELECT ball_by_ball.match_id AS match_id, 
                       ball_by_ball.over_id AS over_id, 
                       ball_by_ball.ball_id AS ball_id, 
                       ball_by_ball.innings_no AS innings_no, 
                       striker AS player_id, 
                       runs_scored AS runs 
                FROM ball_by_ball
                JOIN batsman_scored ON ball_by_ball.match_id = batsman_scored.match_id 
                                   AND ball_by_ball.over_id = batsman_scored.over_id 
                                   AND ball_by_ball.ball_id = batsman_scored.ball_id 
                                   AND ball_by_ball.innings_no = batsman_scored.innings_no
            )
            SELECT player_id, match_id, SUM(runs) AS total_runs 
            FROM runs_scored 
            WHERE match_id IN (SELECT match_id FROM matches WHERE season_id = 5)
            GROUP BY player_id, match_id 
            ORDER BY player_id
        )
        SELECT player_id, SUM(total_runs) AS runs, COUNT(match_id) AS num_matches 
        FROM derived20 
        GROUP BY player_id 
        ORDER BY player_id
    ) AS derived20_1 
    ORDER BY batting_avg DESC 
    LIMIT 10
) AS derived20_2 ON players.player_id = derived20_2.player_id 
ORDER BY batting_avg DESC, player_name;

