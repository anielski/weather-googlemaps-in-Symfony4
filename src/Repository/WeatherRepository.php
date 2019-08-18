<?php

namespace App\Repository;

use App\Entity\Weather;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Weather|null find($id, $lockMode = null, $lockVersion = null)
 * @method Weather|null findOneBy(array $criteria, array $orderBy = null)
 * @method Weather[]    findAll()
 * @method Weather[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @author Aaam Nielski
 * @copyright Future-Soft Sp. z o.o. 2019
 */
class WeatherRepository extends ServiceEntityRepository {
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Weather::class);
    }

    // /**
    //  * @return Weather[] Returns an array of Weather objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Weather
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * Returns the number of entries.
     * @return int|null if null not found.
     */
    public function getCount() {
        $builder = $this->createQueryBuilder('p')->select('count(p.lat) as count')->setMaxResults(1)->getQuery();
        $ds      = $builder->getResult();
        if (is_array($ds) && count($ds) == 1 && isset($ds[0]['count'])) {
            return intval($ds[0]['count']);
        }
        return null;
    }

    /**
     * Returns the most searched city.
     * @return |null if null not found.
     */
    public function getCity() {
        $query = $this->createQueryBuilder('p')->select('count(p.city) as count, p.city')->groupBy("p.city")->orderBy("count", "DESC")->setMaxResults(1)->getQuery();
        $ds    = $query->getResult();
        if (is_array($ds) && count($ds) == 1 && isset($ds[0]['city'])) {
            return $ds[0]['city'];
        }
        return null;
    }

    /**
     * Gets the minimum, maximum and average temperature.
     * @return array if the values ​​are null then not found.
     */
    public function getTemp() {
        $query = $this->createQueryBuilder('p')->select('max(p.temp) as max, min(p.temp) as min, avg(p.temp) as avg')->setMaxResults(1)->getQuery();
        $ds    = $query->getResult();
        if (is_array($ds) && count($ds) == 1 && isset($ds[0]['max'])) {
            return array($ds[0]['max'], $ds[0]['min'], $ds[0]['avg']);
        }
        return array(null, null, null);
    }
}
