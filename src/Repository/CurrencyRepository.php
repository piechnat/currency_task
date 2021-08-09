<?php

namespace App\Repository;

use App\Entity\Currency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Currency|null find($id, $lockMode = null, $lockVersion = null)
 * @method Currency|null findOneBy(array $criteria, array $orderBy = null)
 * @method Currency[]    findAll()
 * @method Currency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Currency::class);
    }
    
    public function updateExchangeRates($table)
    {
        $currencies = $this->findAll();

        foreach ($table as $rate) {
            $found = false;
            foreach ($currencies as $currency) {
                if ($currency->getCurrencyCode() === $rate['code']) {
                    $found = true;
                    break;
                }
            }
            if ($found) {
                $currency->setExchangeRate($rate['mid']);
            } else {
                $entity = new Currency();
                $entity->setName($rate['currency']);
                $entity->setCurrencyCode($rate['code']);
                $entity->setExchangeRate($rate['mid']);
                $this->getEntityManager()->persist($entity);
            }
        }

        $this->getEntityManager()->flush();
    }
}
