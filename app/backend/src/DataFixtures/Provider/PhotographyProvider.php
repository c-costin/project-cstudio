<?php

namespace App\DataFixtures\Provider;

class PhotographyProvider
{
    public function getPhotographyAnimalsPicture()
    {
        return [
            ["type" => "photographie", "category" => "animaux", "date" => "2019-08-27", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/animals/melina-kiefer-mNrN2Jdni-I-unsplash.jpg", "price" => 130],
            ["type" => "photographie", "category" => "animaux", "date" => "2009-05-11", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/photography/animals/mika-brandt-UlipBbZpweg-unsplash.jpg", "price" => 270],
            ["type" => "photographie", "category" => "animaux", "date" => "2022-03-28", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/photography/animals/sk-8hV_vwwYR0o-unsplash.jpg", "price" => 520]
        ];
    }

    public function getPhotographyMusicPicture()
    {
        return [
            ["type" => "photographie", "category" => "musique", "date" => "2010-01-16", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/photography/music/caio-silva-C7RFkKvThG4-unsplash.jpg", "price" => 760],
            ["type" => "photographie", "category" => "musique", "date" => "2018-02-18", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/photography/music/chris-bair-A10y2Eq7OHY-unsplash.jpg", "price" => 610],
            ["type" => "photographie", "category" => "musique", "date" => "2022-01-24", "dimensions" => "90x90", "img" => "http://localhost:8000/uploads/artwork/photography/music/dominik-vanyi-5Fxuo7x-eyg-unsplash.jpg", "price" => 110],
            ["type" => "photographie", "category" => "musique", "date" => "2015-03-13", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/photography/music/josep-molina-secall-yO4XF2uC4g0-unsplash.jpg", "price" => 840],
            ["type" => "photographie", "category" => "musique", "date" => "2014-08-12", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/music/jules-d-KrE_a9Inloc-unsplash.jpg", "price" => 80],
            ["type" => "photographie", "category" => "musique", "date" => "2011-07-01", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/music/michael-c-aw3xpyqP5HA-unsplash.jpg", "price" => 680]
        ];
    }

    public function getPhotographyLandscapePicture()
    {
        return [
            ["type" => "photographie", "category" => "paysage", "date" => "2016-05-06", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/landscape/altinay-dinc-LluELtL5mK4-unsplash.jpg", "price" => 1100],
            ["type" => "photographie", "category" => "paysage", "date" => "2020-09-03", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/landscape/casey-horner-1sim8ojvCbE-unsplash.jpg", "price" => 870],
            ["type" => "photographie", "category" => "paysage", "date" => "2019-06-18", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/landscape/casey-horner-ZZkeAKWFjzY-unsplash.jpg", "price" => 300],
            ["type" => "photographie", "category" => "paysage", "date" => "2013-04-30", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/landscape/henry-be-IicyiaPYGGI-unsplash.jpg", "price" => 1300],
            ["type" => "photographie", "category" => "paysage", "date" => "2015-10-24", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/landscape/john-rodenn-castillo-eluzJSfkNCk-unsplash.jpg", "price" => 480],
            ["type" => "photographie", "category" => "paysage", "date" => "2008-02-19", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/landscape/quino-al-FVOkPmiCzAM-unsplash.jpg", "price" => 2100],
        ];
    }

    public function getPhotographyPortraitPicture()
    {
        return [
            ["type" => "photographie", "category" => "portrait", "date" => "2019-12-09", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/portrait/andrey-zvyagintsev-_fvUcz1H6EY-unsplash.jpg", "price" => 3400],
            ["type" => "photographie", "category" => "portrait", "date" => "2021-09-30", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/portrait/ethan-haddox-__ng3cRXmFE-unsplash.jpg", "price" => 990],
            ["type" => "photographie", "category" => "portrait", "date" => "2014-04-25", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/portrait/lucas-gouvea-aoEwuEH7YAs-unsplash.jpg", "price" => 5700],
            ["type" => "photographie", "category" => "portrait", "date" => "2018-07-10", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/portrait/richard-jaimes-s97-KYat9sA-unsplash.jpg", "price" => 4900],
            ["type" => "photographie", "category" => "portrait", "date" => "2021-01-29", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/photography/portrait/shahin-khalaji-MTez4lZfJpg-unsplash.jpg", "price" => 4200],
            ["type" => "photographie", "category" => "portrait", "date" => "2015-07-17", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/photography/portrait/shot-by-cerqueira-wxF6hoc8Ndc-unsplash.jpg", "price" => 2190]
        ];
    }
}
