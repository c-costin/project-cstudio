<?php

namespace App\DataFixtures\Provider;

class TableauProvider
{
    public function getTableauAbstractPicture()
    {
        return [
            ["type" => "tableau", "category" => "abstrait", "date" => "2016-07-09", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/ashley-west-edwards-usUA4BT_JiU-unsplash.jpg", "price" => 3900],
            ["type" => "tableau", "category" => "abstrait", "date" => "2006-09-24", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/dan-cristian-padure-Co315r87x-E-unsplash.jpg", "price" => 7800],
            ["type" => "tableau", "category" => "abstrait", "date" => "2009-03-19", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/dan-cristian-padure-hguxpsaUpBk-unsplash.jpg", "price" => 1900],
            ["type" => "tableau", "category" => "abstrait", "date" => "2004-11-05", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/karolina-badzmierowska-8ig2a2Axsxg-unsplash.jpg", "price" => 4200],
            ["type" => "tableau", "category" => "abstrait", "date" => "2018-02-29", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/kilian-seiler-R9MeGDvj-hM-unsplash.jpg", "price" => 890],
            ["type" => "tableau", "category" => "abstrait", "date" => "2021-05-20", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/luca-nicoletti-nazeUct7aPs-unsplash.jpg", "price" => 1400],
            ["type" => "tableau", "category" => "abstrait", "date" => "2011-06-17", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/steve-johnson-3Sf_G9m0gcQ-unsplash.jpg", "price" => 5600],
            ["type" => "tableau", "category" => "abstrait", "date" => "2013-07-11", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/abstract/steve-johnson-RzykwoNjoLw-unsplash.jpg", "price" => 10900]
        ];
    }

    public function getTableauAnimalsPicture()
    {
        return [
            ["type" => "tableau", "category" => "animaux", "date" => "1902-09-29", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/animals/boston-public-library-SvGzLn7y_sw-unsplash.jpg", "price" => 190],
            ["type" => "tableau", "category" => "animaux", "date" => "1886-11-02", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/animals/mcgill-library-HJJdGJrRQ84-unsplash.jpg", "price" => 280],
            ["type" => "tableau", "category" => "animaux", "date" => "1908-04-25", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/animals/mcgill-library-kHuCUkkExbc-unsplash.jpg", "price" => 580],
            ["type" => "tableau", "category" => "animaux", "date" => "1893-12-09", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/animals/museums-victoria-G9Yy-iitjjg-unsplash.jpg", "price" => 390]
        ];
    }

    public function getTableauCulturePicture()
    {
        return [
            ["type" => "tableau", "category" => "culture", "date" => "0840-06-04", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/culture/adrianna-geo-1rBg5YSi00c-unsplash.jpg", "price" => 1450000],
            ["type" => "tableau", "category" => "culture", "date" => "1594-12-09", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/culture/birmingham-museums-trust-e0wBK0xJXYQ-unsplash.jpg", "price" => 12000],
            ["type" => "tableau", "category" => "culture", "date" => "1896-11-07", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/culture/birmingham-museums-trust-pxMaBQX2AIs-unsplash.jpg", "price" => 8000],
            ["type" => "tableau", "category" => "culture", "date" => "1634-02-13", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/culture/europeana-d2wPxAR5w6o-unsplash.jpg", "price" => 16000],
            ["type" => "tableau", "category" => "culture", "date" => "0903-03-02", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/culture/simon-champagne-9nXws2I_kgo-unsplash.jpg", "price" => 1690000]
        ];
    }

    public function getTableauLandscapePicture()
    {
        return [
            ["type" => "tableau", "category" => "paysage", "date" => "1824-03-26", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/landscape/birmingham-museums-trust--IAS_N85adA-unsplash.jpg", "price" => 2600],
            ["type" => "tableau", "category" => "paysage", "date" => "1894-05-18", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/landscape/birmingham-museums-trust-F8x1FC2pGqU-unsplash.jpg", "price" => 1300],
            ["type" => "tableau", "category" => "paysage", "date" => "1905-10-26", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/landscape/birmingham-museums-trust-NspHfyZnMBE-unsplash.jpg", "price" => 3400],
            ["type" => "tableau", "category" => "paysage", "date" => "1868-05-19", "dimensions" => "120x90", "img" => "http://localhost:8000/uploads/artwork/tableau/landscape/birmingham-museums-trust-SAQl58G-RYs-unsplash.jpg", "price" => 4800]
        ];
    }

    public function getTableauPortraitPicture()
    {
        return [
            ["type" => "tableau", "category" => "portrait", "date" => "1840-04-27", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/portrait/europeana-88w2yI5A78Y-unsplash.jpg", "price" => 24500],
            ["type" => "tableau", "category" => "portrait", "date" => "1710-11-03", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/portrait/europeana-Krm-9syUmOY-unsplash.jpg", "price" => 49000],
            ["type" => "tableau", "category" => "portrait", "date" => "1830-04-17", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/portrait/europeana-rBVcss6bjBA-unsplash.jpg", "price" => 180000],
            ["type" => "tableau", "category" => "portrait", "date" => "2022-07-05", "dimensions" => "90x120", "img" => "http://localhost:8000/uploads/artwork/tableau/portrait/nicola-powys-oz7w_okbI0Q-unsplash.jpg", "price" => 74000]
        ];
    }
}
