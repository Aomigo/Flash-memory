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
    score INT NOT NULL,
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
INSERT INTO `score` (`id`, `user_id`, `game_id`, `difficulty`, `score`, `created_at`) VALUES
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