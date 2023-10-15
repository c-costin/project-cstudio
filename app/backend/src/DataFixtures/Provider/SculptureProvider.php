<?php

namespace App\DataFixtures\Provider;

class SculptureProvider
{
    public function getSculptureAnimalsPicture()
    {
        return [
            ["type" => "sculpture", "category" => "animaux", "date" => "1809-08-21", "dimensions" => "15x30", "img" => "http://localhost:8000/uploads/artwork/sculpture/animals/eran-menashri-_-5vuqV-BLo-unsplash.jpg", "price" => 540],
            ["type" => "sculpture", "category" => "animaux", "date" => "2012-03-27", "dimensions" => "390x190", "img" => "http://localhost:8000/uploads/artwork/sculpture/animals/justin-ziadeh-kye-Gqulx3w-unsplash.jpg", "price" => 98000],
            ["type" => "sculpture", "category" => "animaux", "date" => "2007-10-07", "dimensions" => "260x110", "img" => "http://localhost:8000/uploads/artwork/sculpture/animals/leiada-krozjhen-q0gTTM364mU-unsplash.jpg", "price" => 63000],
            ["type" => "sculpture", "category" => "animaux", "date" => "1796-11-16", "dimensions" => "15x10", "img" => "http://localhost:8000/uploads/artwork/sculpture/animals/thor-alvis-XPFv2B5rIcI-unsplash.jpg", "price" => 147000],
            ["type" => "sculpture", "category" => "animaux", "date" => "2019-07-24", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/sculpture/animals/troy-spoelma-jQVcRZ9wYS4-unsplash.jpg", "price" => 233000]
        ];
    }

    public function getSculpturePortraitPicture()
    {
        return [
            ["type" => "sculpture", "category" => "portrait", "date" => "2001-01-11", "dimensions" => "110x190", "img" => "http://localhost:8000/uploads/artwork/sculpture/portrait/chris-curry-BOiIZchGTAY-unsplash.jpg", "price" => 84000],
            ["type" => "sculpture", "category" => "portrait", "date" => "0120-08-09", "dimensions" => "90x170", "img" => "http://localhost:8000/uploads/artwork/sculpture/portrait/engin-akyurt-4Navv1pBJjU-unsplash.jpg", "price" => 345000],
            ["type" => "sculpture", "category" => "portrait", "date" => "2017-05-20", "dimensions" => "60x90", "img" => "http://localhost:8000/uploads/artwork/sculpture/portrait/engin-akyurt-9gLBPr_HN7c-unsplash.jpg", "price" => 15600],
            ["type" => "sculpture", "category" => "portrait", "date" => "0045-03-14", "dimensions" => "120x190", "img" => "http://localhost:8000/uploads/artwork/sculpture/portrait/engin-akyurt-vJ0zS3nfmwU-unsplash.jpg", "price" => 39000],
            ["type" => "sculpture", "category" => "portrait", "date" => "0086-12-06", "dimensions" => "90x190", "img" => "http://localhost:8000/uploads/artwork/sculpture/portrait/jack-hunter-1L4E_lsIb9Q-unsplash.jpg", "price" => 182000],
            ["type" => "sculpture", "category" => "portrait", "date" => "2013-08-15", "dimensions" => "30x60", "img" => "http://localhost:8000/uploads/artwork/sculpture/portrait/massimo-virgilio-pv5dSOM1UCY-unsplash.jpg", "price" => 24000],
            ["type" => "sculpture", "category" => "portrait", "date" => "1754-04-19", "dimensions" => "30x90", "img" => "http://localhost:8000/uploads/artwork/sculpture/portrait/olenka-varzar-ot5bYzjWksE-unsplash.jpg", "price" => 36000]
        ];
    }
}
