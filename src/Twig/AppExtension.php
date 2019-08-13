<?php
namespace App\Twig;

use Symfony\Component\HttpFoundation\Request;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class AppExtension
 * @package App\Twig
 * @author Aaam Nielski
 * @copyright Future-Soft Sp. z o.o. 2019
 */
class AppExtension extends AbstractExtension {
    /**
     * Adds new functions - definition
     * @return array|TwigFunction[]
     */
    public function getFunctions() {
        return [new TwigFunction('distance', [$this, 'calculateDistance']),];
    }

    /**
     * Returns the distance in a straight line between the selected points on the map. It works based on cookies and given coordinates.
     * @param $lat
     * @param $lng
     * @param Request $request
     * @return float|int
     * @author Adam Nielski & Manojkiran.A from https://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php
     * @todo AN: pos - we can change to const
     */
    public function calculateDistance($lat, $lng, Request $request, $distanceUnit = "", $decimalPoints = "") {
        if ($request->cookies AND $request->cookies->has("pos") AND $request->cookies->get("pos") != "") {
            $sJson = $request->cookies->get("pos");
            $oJson = json_decode($sJson);

            $longitudeOne = $lat;
            $latitudeOne  = $lng;

            $longitudeTwo = $oJson->lat;
            $latitudeTwo  = $oJson->lng;

            $round = true;

            if (empty($decimalPoints)) {
                $decimalPoints = '3';
            }
            if (empty($distanceUnit)) {
                $distanceUnit = 'KM';
            }
            $distanceUnit    = strtolower($distanceUnit);
            $pointDifference = $longitudeOne - $longitudeTwo;
            $toSin           = (sin(deg2rad($latitudeOne)) * sin(deg2rad($latitudeTwo))) + (cos(deg2rad($latitudeOne)) * cos(deg2rad($latitudeTwo)) * cos(deg2rad($pointDifference)));
            $toAcos          = acos($toSin);
            $toRad2Deg       = rad2deg($toAcos);

            $toMiles         = $toRad2Deg * 60 * 1.1515;
            $toKilometers    = $toMiles * 1.609344;
            $toNauticalMiles = $toMiles * 0.8684;
            $toMeters        = $toKilometers * 1000;
            $toFeets         = $toMiles * 5280;
            $toYards         = $toFeets / 3;


            switch (strtoupper($distanceUnit)) {
                case 'ML'://miles
                    $toMiles = ($round == true ? round($toMiles) : round($toMiles, $decimalPoints));
                    return $toMiles;
                    break;
                case 'KM'://Kilometers
                    $toKilometers = ($round == true ? round($toKilometers) : round($toKilometers, $decimalPoints));
                    return $toKilometers;
                    break;
                case 'MT'://Meters
                    $toMeters = ($round == true ? round($toMeters) : round($toMeters, $decimalPoints));
                    return $toMeters;
                    break;
                case 'FT'://feets
                    $toFeets = ($round == true ? round($toFeets) : round($toFeets, $decimalPoints));
                    return $toFeets;
                    break;
                case 'YD'://yards
                    $toYards = ($round == true ? round($toYards) : round($toYards, $decimalPoints));
                    return $toYards;
                    break;
                case 'NM'://Nautical miles
                    $toNauticalMiles = ($round == true ? round($toNauticalMiles) : round($toNauticalMiles, $decimalPoints));
                    return $toNauticalMiles;
                    break;
            }
        }
        return 0;
    }
}