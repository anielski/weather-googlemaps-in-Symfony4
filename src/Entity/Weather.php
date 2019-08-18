<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeatherRepository")
 */
class Weather
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $lat;

    /**
     * @ORM\Column(type="float")
     */
    private $lng;

    /**
     * @ORM\Column(type="text", length=58)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $dt;

    /**
     * Kelwin
     * @ORM\Column(type="float")
     */
    private $temp;

    /**
     * @ORM\Column(type="float")
     */
    private $clouds;

    /**
     * @ORM\Column(type="float")
     */
    private $wind;

    /**
     * @ORM\Column(type="text", length=256)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $timezone;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return flaot
     */
    public function getLat() {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat): void {
        $this->lat = $lat;
    }

    /**
     * @return flaot
     */
    public function getLng() {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng): void {
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void {
        $this->city = $city;
    }

    /**
     * @return integer
     */
    public function getDt() {
        return $this->dt;
    }

    /**
     * @param mixed $dt
     */
    public function setDt($dt): void {
        $this->dt = $dt;
    }

    /**
     * @return flaot
     */
    public function getTemp() {
        return $this->temp;
    }

    /**
     * @param mixed $temp
     */
    public function setTemp($temp): void {
        $this->temp = $temp;
    }

    /**
     * @return string
     */
    public function getClouds() {
        return $this->clouds;
    }

    /**
     * @param mixed $clouds
     */
    public function setClouds($clouds): void {
        $this->clouds = $clouds;
    }

    /**
     * @return flaot
     */
    public function getWind() {
        return $this->wind;
    }

    /**
     * @param mixed $wind
     */
    public function setWind($wind): void {
        $this->wind = $wind;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void {
        $this->description = $description;
    }

    /**
     * @return interer
     */
    public function getTimezone() {
        return $this->timezone;
    }

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone): void {
        $this->timezone = $timezone;
    }
}
