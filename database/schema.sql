-- =========================
-- DATABASE
-- =========================
CREATE DATABASE IF NOT EXISTS giga_league
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE giga_league;

-- =========================
-- CLUB
-- =========================
CREATE TABLE clubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    date_creation DATE NOT NULL,

    INDEX idx_club_nom (nom),
    INDEX idx_club_ville (ville)
);

-- =========================
-- EQUIPE
-- =========================
CREATE TABLE equipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    jeu VARCHAR(100) NOT NULL,
    club_id INT NOT NULL,

    INDEX idx_equipe_nom (nom),
    INDEX idx_equipe_jeu (jeu),
    INDEX idx_equipe_club (club_id),

    CONSTRAINT fk_equipe_club
        FOREIGN KEY (club_id)
        REFERENCES clubs(id)
        ON DELETE CASCADE
);

-- =========================
-- JOUEUR
-- =========================
CREATE TABLE joueurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL UNIQUE,
    role VARCHAR(100) NOT NULL,
    salaire DECIMAL(10,2) NOT NULL,
    equipe_id INT NOT NULL,

    INDEX idx_joueur_pseudo (pseudo),
    INDEX idx_joueur_salaire (salaire),
    INDEX idx_joueur_equipe (equipe_id),

    CONSTRAINT fk_joueur_equipe
        FOREIGN KEY (equipe_id)
        REFERENCES equipes(id)
        ON DELETE CASCADE
);

-- =========================
-- TOURNOI
-- =========================
CREATE TABLE tournois (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    cashprize DECIMAL(12,2) NOT NULL,
    format VARCHAR(50) NOT NULL,
    date DATE NOT NULL,

    INDEX idx_tournoi_titre (titre),
    INDEX idx_tournoi_date (date)
);

-- =========================
-- MATCH
-- =========================
CREATE TABLE matchs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tournoi_id INT NOT NULL,
    equipe_a_id INT NOT NULL,
    equipe_b_id INT NOT NULL,
    score_a INT DEFAULT 0,
    score_b INT DEFAULT 0,
    gagnant_id INT DEFAULT NULL,
    date DATE NOT NULL,

    INDEX idx_match_tournoi (tournoi_id),
    INDEX idx_match_equipes (equipe_a_id, equipe_b_id),

    CONSTRAINT fk_match_tournoi
        FOREIGN KEY (tournoi_id)
        REFERENCES tournois(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_match_equipe_a
        FOREIGN KEY (equipe_a_id)
        REFERENCES equipes(id),

    CONSTRAINT fk_match_equipe_b
        FOREIGN KEY (equipe_b_id)
        REFERENCES equipes(id),

    CONSTRAINT fk_match_gagnant
        FOREIGN KEY (gagnant_id)
        REFERENCES equipes(id)
);

-- =========================
-- SPONSOR
-- =========================
CREATE TABLE sponsors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150) NOT NULL UNIQUE,

    INDEX idx_sponsor_nom (nom)
);

-- =========================
-- TOURNOI_SPONSOR (N:N)
-- =========================
CREATE TABLE tournoi_sponsor (
    tournoi_id INT NOT NULL,
    sponsor_id INT NOT NULL,
    contribution DECIMAL(12,2) NOT NULL,

    PRIMARY KEY (tournoi_id, sponsor_id),

    INDEX idx_ts_contribution (contribution),

    CONSTRAINT fk_ts_tournoi
        FOREIGN KEY (tournoi_id)
        REFERENCES tournois(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_ts_sponsor
        FOREIGN KEY (sponsor_id)
        REFERENCES sponsors(id)
        ON DELETE CASCADE
);
