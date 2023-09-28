<?php

namespace App\DataFixtures\Provider;

class IllustrationProvider
{
    public function getIllustrationAnimalsPicture()
    {
        return [
            ["type" => "dessin", "category" => "animaux", "date" => "2008-01-27", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/illustration/animals/andres-gomez-dbnhItvhXJg-unsplash.jpg", "price" => 130],
            ["type" => "dessin", "category" => "animaux", "date" => "1999-07-03", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/illustration/animals/chris-curry-wvYdfoWPaQM-unsplash.jpg", "price" => 170]
        ];
    }

    public function getIllustrationCulturePicture()
    {
        return [
            ["type" => "dessin", "category" => "culture", "date" => "1996-02-06", "dimensions" => "90x90", "img" => "http://localhost:8000/uploads/artwork/illustration/culture/british-library-goEMLZtN8i8-unsplash.jpg", "price" => 740],
            ["type" => "dessin", "category" => "culture", "date" => "1980-10-14", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/illustration/culture/joana-abreu-aFkzShngdaw-unsplash.jpg", "price" => 980],
            ["type" => "dessin", "category" => "culture", "date" => "2021-09-01", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/illustration/culture/nechama-lock-OpmBB7vlPJY-unsplash.jpg", "price" => 630],
            ["type" => "dessin", "category" => "culture", "date" => "2020-12-27", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/illustration/culture/shark-ovski-FioXQ1bU8Xg-unsplash.jpg", "price" => 1400],
            ["type" => "dessin", "category" => "culture", "date" => "2021-11-21", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/illustration/culture/tatiana-zhukova-nVVQlJAcEDc-unsplash.jpg", "price" => 15300],
            ["type" => "dessin", "category" => "culture", "date" => "1992-09-01", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/illustration/culture/thiebaud-faix-qURGLVHMcEs-unsplash.jpg", "price" => 2300]
        ];
    }

    public function getIllustrationPortraitPicture()
    {
        return [
            ["type" => "dessin", "category" => "portrait", "date" => "1922-03-19", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/illustration/portrait/birmingham-museums-trust-Mo1Sd_jxSD8-unsplash.jpg", "price" => 3800],
            ["type" => "dessin", "category" => "portrait", "date" => "1982-10-04", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/illustration/portrait/mcgill-library-_ztjWhn51lc-unsplash.jpg", "price" => 2100]
        ];
    }
}
