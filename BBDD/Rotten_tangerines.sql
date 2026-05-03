DROP DATABASE IF EXISTS Rotten_tangerines;
CREATE DATABASE Rotten_tangerines;
USE Rotten_tangerines;

CREATE TABLE `user` (
	id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    email VARCHAR(150) UNIQUE,
    password_hash VARCHAR(255),
	rol BOOLEAN
);

CREATE TABLE `movie` (
	id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    genre VARCHAR(50),
    synopsis TEXT,
    release_date DATE,
    poster_url VARCHAR(2048),
    runtime_minutes INT
);

CREATE TABLE `review` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    movie_id INT NOT NULL,
    score TINYINT NOT NULL,
    CONSTRAINT review_user_FK FOREIGN KEY (user_id) REFERENCES `user`(id) ON DELETE CASCADE,
    CONSTRAINT review_movie_FK FOREIGN KEY (movie_id) REFERENCES `movie`(id) ON DELETE CASCADE
);

SET @pass = '$2y$10$vE7RDl45mLUIXFaD29QkSuwFqloTxVw9I6GfxP7LDCEmo8WSjujH.';

INSERT INTO `user` (username, email, password_hash, rol) VALUES
('admin', 'admin@rotten.com', @pass, 1),
('Marcos_FachaRojo_67', 'ComunistaConPulserita@gmail.com', @pass, 0),
('lucia_filmes', 'lucia@mail.com', @pass, 0),
('cinefilo_anon', 'anon@mail.com', @pass, 0),
('tangerine_fan', 'fan@mail.com', @pass, 0),
('el_critico', 'critico@mail.com', @pass, 0),
('sofa_y_peli', 'sofa@mail.com', @pass, 0),
('nolan_lover', 'nolan@mail.com', @pass, 0),
('geek_girl', 'geek@mail.com', @pass, 0),
('oscar_watcher', 'oscar@mail.com', @pass, 0),
('retro_guy', 'retro@mail.com', @pass, 0),
('spoiler_man', 'spoiler@mail.com', @pass, 0),
('marcos_hater', 'antimarcos@mail.com', @pass, 0),
('la_ia_sentiente', 'gemini_fan@mail.com', @pass, 0),
('pochoclo_lover', 'palomitas@mail.com', @pass, 0),
('dc_fanboy', 'snydercut@mail.com', @pass, 0),
('marvel_stan', 'avenger@mail.com', @pass, 0),
('critico_gafapasta', 'arte_y_ensayo@mail.com', @pass, 0),
('solo_veo_series', 'netflix_adicto@mail.com', @pass, 0),
('pirata_del_caribe', 'torrent@mail.com', @pass, 0),
('cinema_paraiso', 'clasicos@mail.com', @pass, 0),
('pixel_master', 'pixel@mail.com', @pass, 0);

INSERT INTO `movie` (title, genre, synopsis, release_date, poster_url, runtime_minutes) VALUES
('Inception',         'Sci-Fi',   'Un ladrón que roba secretos corporativos mediante tecnología de sueños compartidos recibe la tarea inversa: plantar una idea en la mente de un CEO.',                              '2010-07-16', 'https://image.tmdb.org/t/p/w500/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg', 148),
('The Godfather',     'Crime',    'El patriarca envejecido de una dinastía del crimen organizado transfiere el control de su imperio clandestino a su reacio hijo.',                                               '1972-03-24', 'https://upload.wikimedia.org/wikipedia/en/1/1c/Godfather_ver1.jpg', 175),
('Interstellar',      'Sci-Fi',   'Un equipo de exploradores viaja a través de un agujero de gusano en el espacio para garantizar la supervivencia de la humanidad.',                                             '2014-11-07', 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg', 169),
('Parasite',          'Thriller', 'La familia Kim, en situación de pobreza, se infiltra en la adinerada familia Park, desencadenando una serie de eventos inesperados.',                                          '2019-05-30', 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg', 132),
('The Dark Knight',   'Action',   'Batman enfrenta al Joker, un criminal anárquico que siembra el caos en Gotham City y lo empuja al límite de su sentido de la justicia.',                                       '2008-07-18', 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg', 152),
('Pulp Fiction',      'Crime',    'Las historias entrelazadas de criminales, boxeadores y empleados de restaurante en Los Ángeles convergen en una narrativa no lineal llena de violencia y humor.',              '1994-10-14', 'https://image.tmdb.org/t/p/w500/d5iIlFn5s0ImszYzBPb8JPIfbXD.jpg', 154),
('The Matrix',        'Sci-Fi',   'Un programador descubre que la realidad tal como la conoce es una simulación creada por máquinas, y se une a la resistencia para combatirlas.',                                '1999-03-31', 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg', 136),
('Spirited Away',     'Animation','Una niña queda atrapada en un mundo de espíritus y debe trabajar en un balneario mágico para rescatar a sus padres, transformados en cerdos.',                                 '2001-07-20', 'https://image.tmdb.org/t/p/w500/39wmItIWsg5sZMyRUHLkWBcuVCM.jpg', 125),
('Forrest Gump',      'Drama',    'Las décadas de la vida de un hombre de Alabama con un CI bajo pero un corazón de oro, que sin quererlo se convierte en testigo de momentos históricos clave.',                 '1994-07-06', 'https://image.tmdb.org/t/p/w500/arw2vcBveWOVZr6pxd9XTd1TdQa.jpg', 142),
('The Shawshank Redemption', 'Drama', 'Dos presos forjan un vínculo a lo largo de varios años, encontrando consuelo y eventual redención a través de actos de decencia común.',                                   '1994-09-23', 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg', 142);

INSERT INTO `review` (user_id, movie_id, score)
SELECT 
    u.id AS user_id, 
    m.id AS movie_id, 
    FLOOR(1 + RAND() * 5) AS score
FROM `user` u
CROSS JOIN `movie` m
WHERE u.rol = 0;