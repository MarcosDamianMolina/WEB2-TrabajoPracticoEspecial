<?php
require_once './config.php';

class MovieModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=".MYSQL_HOST.
                            ";dbname=".MYSQL_DB.
                            ";charset=utf8",
                            MYSQL_USER,MYSQL_PASS);
        $this->_deploy();
    }

    private function _deploy(){
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0){
            $sql = <<<END
            --
            -- Estructura de tabla para la tabla `genre`
            --
                    
            CREATE TABLE `genre` (
              `id` int(11) NOT NULL,
              `genre` varchar(30) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
            --
            -- Volcado de datos para la tabla `genre`
            --
                    
            INSERT INTO `genre` (`id`, `genre`) VALUES
            (1, 'accion'),
            (2, 'aventura'),
            (3, 'terror'),
            (4, 'comedia');
                    
            -- --------------------------------------------------------
                    
            --
            -- Estructura de tabla para la tabla `movie`
            --
                    
            CREATE TABLE `movie` (
              `id` int(11) NOT NULL,
              `title` varchar(100) NOT NULL,
              `director` varchar(30) NOT NULL,
              `id_genre` int(11) NOT NULL,
              `descrip` varchar(300) NOT NULL,
              `img` varchar(300) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
            --
            -- Volcado de datos para la tabla `movie`
            --
                    
            INSERT INTO `movie` (`id`, `title`, `director`, `id_genre`, `descrip`, `img`) VALUES
            (1, 'Piratas del Caribe: la maldición del Perla Negra', 'Gore Verbinski', 2, 'El capitán Barbossa le roba el barco al pirata Jack Sparrow y secuestra a Elizabeth, amiga de Will Turner. Barbossa y su tripulación son víctimas de un conjuro que los condena a vivir eternamente y a transformarse cada noche en esqueletos vivientes.', 'https://es.web.img3.acsta.net/medias/nmedia/18/91/06/54/20129011.jpg'),
            (2, 'El señor de los anillos: La comunidad del anillo\r\n', 'Peter Jackson', 2, 'Frodo Bolsón es un hobbit al que su tío Bilbo hace portador del poderoso Anillo Único, capaz de otorgar un poder ilimitado al que la posea, con la finalidad de destruirlo. Sin embargo, fuerzas malignas muy poderosas quieren arrebatárselo.', 'https://pics.filmaffinity.com/El_seanor_de_los_anillos_La_comunidad_del_anillo-952398002-large.jpg'),
            (3, 'Viernes 13', 'Sean S. Cunningham', 3, 'El campamento de verano del lago Cristal reabre sus puertas tras permanecer varios años cerrado a raíz de un accidente. A partir de ese momento, comienza a aparecer gente muerta en extrañas circunstancias.', 'https://www.originalfilmart.com/cdn/shop/files/friday_the_13th_1980_linen_original_film_art_f_1600x.webp?v=1682528269'),
            (4, 'El resplandor', 'Stanley Kubrick', 3, 'Un escritor enloquece mientras trabaja como cuidador, junto con su esposa e hijo clarividente, en un hotel de Colorado que está bloqueado por la nieve.', 'https://es.web.img3.acsta.net/pictures/14/04/15/10/46/568345.jpg'),
            (5, 'Duro de matar\r\n', 'John McTiernan', 1, 'John McClane, policía de Nueva York, llega a Los Ángeles para celebrar la Navidad, pero se ve envuelto en una lucha contra un grupo de malhechores que toman de rehén a su esposa en un rascacielos, el Nakatomi Plaza.', 'https://pics.filmaffinity.com/die_hard-319023198-large.jpg'),
            (6, 'Terminator', 'James Cameron', 1, 'Un asesino cibernético del futuro es enviado a Los Ángeles para matar a la mujer que procreará a un líder.', 'https://filmartgallery.com/cdn/shop/products/The-Terminator-Vintage-Movie-Poster-Original_9d016bb9.jpg'),
            (7, 'Una película de miedo\r\n', 'Keenen Ivory Wayans', 4, 'Una parodia de los filmes de asesinatos donde un homicida vengativo acecha a un grupo de adolescentes.', 'https://www.originalfilmart.com/cdn/shop/files/scarymovie_2000_original_film_art_5000x.webp?v=1683910671'),
            (8, 'Un viernes de locos\r\n', 'Mark Waters', 4, 'Dos galletas de la suerte provocan que una psicoterapeuta comprometida y su hija adolescente intercambien mágicamente sus cuerpos.', 'https://img.buzzfeed.com/buzzfeed-static/static/2019-11/19/11/asset/250e9a0555a8/sub-buzz-292-1574162917-5.jpg?downsize=700%3A%2A&output-quality=auto&output-format=auto');
            
            -- --------------------------------------------------------
            
            --
            -- Estructura de tabla para la tabla `user`
            --
            
            CREATE TABLE `user` (
              `id` int(11) NOT NULL,
              `username` varchar(100) NOT NULL,
              `password` varchar(60) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Volcado de datos para la tabla `user`
            --
            
            INSERT INTO `user` (`id`, `username`, `password`) VALUES
            (1, 'webadmin', '$2y$10$.xEqr7JlKQbXy6uBGKzoauOC67ttY7PDyNmxuiICZ/uqBiH4mM1dO');
            
            --
            -- Índices para tablas volcadas
            --
            
            --
            -- Indices de la tabla `genre`
            --
            ALTER TABLE `genre`
              ADD PRIMARY KEY (`id`);
            
            --
            -- Indices de la tabla `movie`
            --
            ALTER TABLE `movie`
              ADD PRIMARY KEY (`id`),
              ADD KEY `id_genre` (`id_genre`);
            
            --
            -- Indices de la tabla `user`
            --
            ALTER TABLE `user`
              ADD PRIMARY KEY (`id`),
              ADD UNIQUE KEY `username` (`username`);
            
            --
            -- AUTO_INCREMENT de las tablas volcadas
            --
            
            --
            -- AUTO_INCREMENT de la tabla `genre`
            --
            ALTER TABLE `genre`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
            
            --
            -- AUTO_INCREMENT de la tabla `movie`
            --
            ALTER TABLE `movie`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
            
            --
            -- AUTO_INCREMENT de la tabla `user`
            --
            ALTER TABLE `user`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
            
            --
            -- Restricciones para tablas volcadas
            --
            
            --
            -- Filtros para la tabla `movie`
            --
            ALTER TABLE `movie`
              ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id`);
            COMMIT;
            END;
            $this->db->query($sql);
        }
    }

    public function getMovies()
    {
        $query = $this->db->prepare('SELECT m.*, g.genre FROM movie m JOIN genre g ON m.id_genre = g.id');
        $query->execute();

        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
    public function getMovieById($id)
    {
        $query = $this->db->prepare('SELECT m.*, g.genre FROM movie m JOIN genre g ON m.id_genre = g.id WHERE m.id = ?');
        $query->execute([$id]);

        $movie = $query->fetch(PDO::FETCH_OBJ);
        return $movie;
    }
    public function getMoviesByGenre($id_genre)
    {
        $query = $this->db->prepare('SELECT m.*, g.genre FROM movie m JOIN genre g ON m.id_genre = g.id WHERE m.id_genre = ?');
        $query->execute([$id_genre]);
        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
    public function insertMovie($title, $director, $genre, $descrip, $img){
        $query = $this->db->prepare('INSERT INTO movie(title, director, id_genre, descrip, img) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$title, $director, $genre, $descrip, $img]);
    }
    public function removeMovie($id){
        $query = $this->db->prepare('DELETE FROM movie WHERE id = ?');
        $query->execute([$id]);
    }
    public function updateMovie($title, $director, $genre, $description, $img, $id){
        $query = $this->db->prepare('UPDATE movie SET title = ?, director = ?, id_genre = ?, descrip = ?, img = ? WHERE id = ?');
        $query->execute([$title, $director, $genre, $description, $img, $id]);
    }
}