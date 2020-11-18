<?php


namespace App\Service;


class AppService
{
    public function capitalize(string $chaine)
    {
        return ucwords(mb_strtolower($chaine));
    }

    public function mettre_en_majuscule(string $chaine)
    {
        return mb_strtoupper($chaine);
    }
}