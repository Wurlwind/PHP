<?php
//business/GenreService.php
require_once("data/genreDAO.php");

class GenreService {
    public function getGenresOverzicht() {
        $genreDAO = new GenreDAO();
        $lijst = $genreDAO->getAll();
        return $lijst;
    }
}