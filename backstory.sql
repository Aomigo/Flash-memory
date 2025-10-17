--Initialisation de la bdd 
CREATE DATABASE memory;

--US.1



--Création de la table user
CREATE TABLE `user` (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    pseudo VARCHAR(15) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY(id)
)

--Création de la table game
CREATE TABLE game(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    game_name VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
)

--Création de la table score
CREATE TABLE score (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    difficulty ENUM('easy', 'medium', 'hard') NOT NULL,
    user_score INT NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES user(id),
    FOREIGN KEY(game_id) REFERENCES game(id)
)

--Création de la table message
CREATE TABLE message (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES user(id),
    FOREIGN KEY(game_id) REFERENCES game(id)
)

--US.2

--MODIF USER
INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `created_at`, `updated_at`) VALUES
(1, 'john@doe.com', 'averagePerson', 'John Doe', '2025-10-13 10:50:37', NOW()),
(2, 'jane@doe.com', 'averagePerson', 'Jane Doe', '2025-10-13 10:50:37', NOW()),
(3, 'engineer@gaming.org', 'youMeanTHISTeleporter?', 'Dell Conagher', NOW()),
(4, 'super@bulked.en', 'mostBuffedGuy', 'Buffer', '2025-10-13 10:50:37', NOW()),
(5, 'cobra@kaii.com', 'cobrafist', 'Cobra Kai', '2025-10-13 10:50:37', NOW());

--MODIF GAME
INSERT INTO `game` (`id`, `game_name`) VALUES
(1, 'Power of memory');

--MODIF SCORE
INSERT INTO `score` (`id`, `user_id`, `game_id`, `difficulty`, `user_score`, `created_at`) VALUES
(1, 1, 1, 'hard', 1500, '2025-10-13'),
(2, 2, 1, 'hard', 1650, '2025-10-13'),
(3, 3, 1, 'easy', 680, '2025-10-13'),
(4, 4, 1, 'medium', 1150, '2025-10-13'),
(5, 5, 1, 'hard', 1550, '2025-10-13');

--MODIF MESSAGE
INSERT INTO `message` (`id`, `game_id`, `user_id`, `message`, `created_at`) VALUES
(105, 1, 1, 'A', NOW()),
(106, 1, 1, 'A', NOW()),
(107, 1, 2, 'B', NOW()),
(108, 1, 3, 'C', NOW()),
(109, 1, 4, 'D', NOW()),
(110, 1, 5, 'E', NOW()),
(111, 1, 1, 'F', NOW()),
(112, 1, 2, 'G', NOW()),
(113, 1, 3, 'H', NOW()),
(114, 1, 4, 'I', NOW()),
(115, 1, 5, 'J', NOW()),
(116, 1, 1, 'K', NOW()),
(117, 1, 2, 'L', NOW()),
(118, 1, 3, 'M', NOW()),
(119, 1, 4, 'N', NOW()),
(120, 1, 5, 'O', NOW()),
(121, 1, 1, 'P', NOW()),
(122, 1, 2, 'Q', NOW()),
(123, 1, 3, 'R', NOW()),
(124, 1, 4, 'S', NOW()),
(125, 1, 5, 'T', NOW()),
(126, 1, 1, 'U', NOW()),
(127, 1, 2, 'V', NOW()),
(128, 1, 3, 'W', NOW()),
(129, 1, 4, 'X', NOW()),
(130, 1, 5, 'Y', NOW());


--US.3

INSERT INTO user (email, `password`, pseudo, created_at, updated_at) VALUES
    ("john@doe.com", 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'Jhonny', NOW(), NOW())

--US.4

--US.5
SELECT email, `password`
FROM user
WHERE email=? AND `password`=?

--US.6
SELECT g.game_name, s.user_score, s.difficulty, s.created_at, u.pseudo
FROM score s
LEFT JOIN game g ON s.game_id = g.id
LEFT JOIN `user` u ON s.user_id = u.id 
WHERE s.user_id = 2 
AND s.difficulty = 'hard'
ORDER BY s.difficulty DESC, s.score DESC


--US.7
SELECT g.game_name, s.user_score, s.difficulty, s.created_at, u.pseudo
FROM score s
LEFT JOIN game g ON s.game_id = g.id
LEFT JOIN `user` u ON s.user_id = u.id 
WHERE u.pseudo LIKE '%au%'
ORDER BY s.difficulty DESC, s.score DESC

--US.8
--Cas insert
INSERT INTO score(user_id, game_id, difficulty, user_score, created_at) VALUES
(2, 1, "difficulty chosen", "Score hit", NOW())

--Cas update
UPDATE score 
SET user_score = "Score hit"
WHERE user_id = user->id 
AND game_id = game->id
AND difficulty = "difficulty chosen"

--US.9
INSERT INTO message (game_id, user_id, `message`, created_at) VALUES
(1, 2, 'John i love you' , NOW())

--US.10
SELECT M.message, U.pseudo, (M.user_id = 1) AS IsSender
FROM message as M
INNER JOIN user AS U
ON M.user_id = U.id
WHERE M.created_at >= NOW() - INTERVAL 1 DAY
ORDER BY M.created_at ASC;

--US.11

CREATE TABLE `private_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_sender_id` int(11) NOT NULL,
  `user_receiver_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `read_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--US. 12

INSERT INTO `private_messages` (`id`, `user_sender_id`, `user_receiver_id`, `message`, `is_read`, `created_at`, `read_at`) VALUES
(1, 2, 1, 'a', 0, '2025-09-20', NULL),
(2, 1, 2, 'b', 0, '2025-10-07', NULL),
(3, 1, 4, 'c', 0, '2025-10-01', NULL),
(4, 4, 1, 'd', 0, '2025-10-10', NULL),
(5, 1, 3, 'e', 0, '2025-09-25', NULL),
(6, 3, 1, 'f', 0, '2025-10-05', NULL),
(7, 1, 3, 'g', 0, '2025-09-21', NULL),
(8, 3, 1, 'h', 0, '2025-09-21', NULL),
(9, 1, 4, 'i', 0, '2025-10-07', NULL),
(10, 2, 3, 'j', 0, '2025-09-22', NULL),
(11, 4, 3, 'k', 0, '2025-10-03', NULL),
(12, 3, 2, 'l', 0, '2025-09-30', NULL),
(13, 3, 4, 'm', 0, '2025-09-26', NULL),
(14, 4, 2, 'o', 0, '2025-10-10', NULL),
(15, 2, 4, 'p', 0, '2025-09-27', NULL),
(16, 1, 3, 'q', 0, '2025-09-29', NULL),
(17, 3, 4, 'r', 0, '2025-10-07', NULL),
(18, 4, 3, 's', 0, '2025-09-26', NULL),
(19, 2, 3, 't', 0, '2025-09-20', NULL),
(20, 3, 2, 'u', 0, '2025-10-04', NULL);

--US.15 
--Start with month iteration
WITH months AS (
  SELECT 2025 AS year, 1 AS month UNION ALL
  SELECT 2025, 2 UNION ALL
  SELECT 2025, 3 UNION ALL
  SELECT 2025, 4 UNION ALL
  SELECT 2025, 5 UNION ALL
  SELECT 2025, 6 UNION ALL
  SELECT 2025, 7 UNION ALL
  SELECT 2025, 8 UNION ALL
  SELECT 2025, 9 UNION ALL
  SELECT 2025, 10 UNION ALL
  SELECT 2025, 11 UNION ALL
  SELECT 2025, 12
), --Add the top 3 player CTE with cases
top_players AS (
  SELECT
    YEAR(r.created_at) AS year,
    MONTH(r.created_at) AS month,
    MAX(CASE WHEN rank = 1 THEN user_name END) AS top1_user,
    MAX(CASE WHEN rank = 2 THEN user_name END) AS top2_user,
    MAX(CASE WHEN rank = 3 THEN user_name END) AS top3_user
  FROM (
    SELECT
      s.created_at,
      u.pseudo AS user_name,
      s.user_score,
      ROW_NUMBER() OVER (
        PARTITION BY YEAR(s.created_at), MONTH(s.created_at)
        ORDER BY s.user_score DESC
      ) AS rank
    FROM score s
    LEFT JOIN user u ON s.user_id = u.id
    WHERE s.difficulty = 'hard'
  ) AS r
  GROUP BY YEAR(r.created_at), MONTH(r.created_at)
), --Add the simple month query to get by all month
monthly_scores AS (
  SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, COUNT(*) AS total_scores
  FROM score
  WHERE YEAR(created_at) = 2025
  GROUP BY YEAR(created_at), MONTH(created_at)
), --Hard query to get the most played game
most_played_game AS (
  SELECT t.year, t.month, t.game_id
  FROM ( --Buckets the games by the month and the game
      SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, game_id, COUNT(*) AS game_count
      FROM score
      GROUP BY YEAR(created_at), MONTH(created_at), game_id
  ) t
  JOIN ( --Joins them with the highest game count
      SELECT year, month, MAX(game_count) AS max_count
      FROM (
          SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, game_id, COUNT(*) AS game_count
          FROM score
          GROUP BY YEAR(created_at), MONTH(created_at), game_id
      ) sub
      GROUP BY year, month --t.game_count = m.max_count keeps only the highest of the two bucket for every month : m.max_count
  ) m ON t.year = m.year AND t.month = m.month AND t.game_count = m.max_count
) --Select for the returned table
SELECT m.year, m.month,
       tp.top1_user,
       tp.top2_user,
       tp.top3_user, --COALESCE changes the null from any potential play_count to 0
       COALESCE(ms.total_scores, 0) AS total_scores,
       mp.game_id AS most_played_game
FROM months m --Add every join from the CTE's do add up the month count, the most played game and the top 3
LEFT JOIN monthly_scores ms ON m.year = ms.year AND m.month = ms.month
LEFT JOIN most_played_game mp ON m.year = mp.year AND m.month = mp.month
LEFT JOIN top_players tp ON m.year = tp.year AND m.month = tp.month
WHERE m.year = 2025
ORDER BY m.year, m.month; --Order by months

--US.16
WITH months AS (
  SELECT 2025 AS year, 1 AS month UNION ALL
  SELECT 2025, 2 UNION ALL
  SELECT 2025, 3 UNION ALL
  SELECT 2025, 4 UNION ALL
  SELECT 2025, 5 UNION ALL
  SELECT 2025, 6 UNION ALL
  SELECT 2025, 7 UNION ALL
  SELECT 2025, 8 UNION ALL
  SELECT 2025, 9 UNION ALL
  SELECT 2025, 10 UNION ALL
  SELECT 2025, 11 UNION ALL
  SELECT 2025, 12
),
monthly_scores AS (
  SELECT 
      YEAR(created_at) AS year,
      MONTH(created_at) AS month,
      user_id,
      game_id,
      COUNT(*) AS total_scores,
      ROUND(AVG(user_score)) AS avg_score
  FROM score
  WHERE YEAR(created_at) = 2025
  GROUP BY YEAR(created_at), MONTH(created_at), user_id
),
most_played_game AS (
  SELECT t.year, t.month, t.game_id
  FROM (
      SELECT YEAR(created_at) AS year, MONTH(created_at) AS month, game_id, COUNT(*) AS game_count
      FROM score
      GROUP BY YEAR(created_at), MONTH(created_at), game_id
  ) as t
  JOIN (
      SELECT MAX(game_count) AS max_count
      FROM (
          SELECT COUNT(*) AS game_count
          FROM score
      ) sub
  ) m 
   ON 
    t.game_count = m.max_count
)
SELECT 
  m.year, 
  m.month,
  COALESCE(ms.avg_score, 0) AS average_score,
  COALESCE(ms.total_scores, 0) AS game_count,
  g.game_name AS most_played_game
FROM months m
LEFT JOIN monthly_scores ms 
  ON m.year = ms.year 
 AND m.month = ms.month 
 AND ms.user_id = 1
 
LEFT JOIN most_played_game mp 
  ON m.year = mp.year 
 AND m.month = mp.month
 
LEFT JOIN game g ON ms.game_id = g.id
ORDER BY m.year, m.month; -- a presenter