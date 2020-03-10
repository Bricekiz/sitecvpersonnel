<?php
namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Common\Doctrine\RegistryInterface;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function contact($contactId) {
        $query = $this->createQueryBuilder('p')
            ->leftJoin('p.item', 'i')
            ->where('i.id = :actual')->setParameter('actual', $contactId)
            ->andWhere('p.excepcion != :null')->setParameter('null', serialize(null)) //not null
            ->andWhere('p.excepcion != :empty')->setParameter('empty', serialize([])) //not empty
            ->getQuery();

        return $query->getResult();
    }

    // méthode pour trouver des article en fonction d'un mot de leur titre
    // prend en parametre la chaine de caractère envoyée depuis le controleur (qui appelle cette méthode)
    public function getContactByTitle($word)
    {
        // je récupère le query builder, qui me permet de créer des
        // requetes SQL
        $qb = $this->createQueryBuilder('a');
        // je sélectionne tous les auteurs de la base de données
        $query = $qb->select('a')
            // si le 'word' est trouvé dans la biographie
            ->where('a.biography LIKE :word')
            // j'utilise le setParameter pour sécuriser la requete
            ->setParameter('word', '%'.$word.'%')
            // je créé la requete SQL
            ->getQuery();
        // je récupère les résultats sous forme d'array
        $resultats = $query->getArrayResult();
        return $resultats;
    }
}
