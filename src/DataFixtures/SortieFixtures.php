<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SortieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        //importation des fixtures user
        $userAlan = $this->getReference('user-alan');
        $userElisabeth = $this->getReference('user-elisabeth');
        $userAdmin = $this->getReference('user-admin');
        $userPaula = $this->getReference('user-paula');
        $userSerge = $this->getReference('user-serge');
        $userNonVisible = $this->getReference('user-non-visible');

        //importation des états
        $etatCreee = $this->getReference('etat-creee');
        $etatOuverte = $this->getReference('etat-ouverte');
        $etatCloturee = $this->getReference('etat-cloturee');
        $etatEnCours = $this->getReference('etat-en-cours');
        $etatPassee = $this->getReference('etat-passee');
        $etatAnnulee = $this->getReference('etat-annulee');

        //importation des site
        $siteRennes = $this->getReference('site-rennes');
        $siteNantes = $this->getReference('site-nantes');

        //importation des lieux
        $lieuBDS = $this->getReference('lieu-bar-des-sports');
        $lieuBlizz = $this->getReference('lieu-blizz');
        $lieuGolf = $this->getReference('lieu-golf');
        $lieuParcDesLoisirs = $this->getReference('lieu-parc-des-loisirs');


        $sortie1 = new Sortie();
        $sortie1->setSite($siteRennes);
        $sortie1->setOrganisateur($userAlan);
        $sortie1->setLieu($lieuParcDesLoisirs);
        $sortie1->setInfosSortie('Apéro pour fêter le diplôme');
        $sortie1->setDateHeureDebut(new \DateTime('08-03-2024 19:00:00'));
        $sortie1->setDateLimiteInscription(new \DateTime('05-03-2024 19:00:00'));
        $sortie1->setDuree(300);
        $sortie1->setNbInscriptionMax(17);
        $sortie1->addParticipant($userAlan);
        $sortie1->setEtat($etatCreee);
        $sortie1->setNom('Apéro de la fête');
        $manager->persist($sortie1);

        $sortie2 = new Sortie();
        $sortie2->setSite($siteRennes);
        $sortie2->setOrganisateur($userAlan);
        $sortie2->setLieu($lieuParcDesLoisirs);
        $sortie2->setInfosSortie('Nous remettons notre titre en jeu, sortez les boules et visez le cochonet !');
        $sortie2->setDateHeureDebut(new \DateTime('+3 day'));
        $sortie2->setDateLimiteInscription(new \DateTime('+1 day'));
        $sortie2->setDuree(90);
        $sortie2->setNbInscriptionMax(4);
        $sortie2->setEtat($etatOuverte);
        $sortie2->addParticipant($userAlan);
        $sortie2->addParticipant($userElisabeth);
        $sortie2->addParticipant($userSerge);
        $sortie2->setNom('Pétanque');
        $manager->persist($sortie2);

        $sortie3 = new Sortie();
        $sortie3->setSite($siteRennes);
        $sortie3->setOrganisateur($userPaula);
        $sortie3->setLieu($lieuGolf);
        $sortie3->setInfosSortie('Pour avoir l\'impression d\'être riche quelques instants');
        $sortie3->setDateHeureDebut(new \DateTime('+3 day'));
        $sortie3->setDateLimiteInscription(new \DateTime('+1 day'));
        $sortie3->setDuree(240);
        $sortie3->setNbInscriptionMax(3);
        $sortie2->addParticipant($userAlan);
        $sortie2->addParticipant($userElisabeth);
        $sortie2->addParticipant($userSerge);
        $sortie3->setEtat($etatCloturee);
        $sortie3->setNom('Initiation golf');
        $manager->persist($sortie3);

        $sortie4 = new Sortie();
        $sortie4->setSite($siteRennes);
        $sortie4->setOrganisateur($userSerge);
        $sortie4->setLieu($lieuParcDesLoisirs);
        $sortie4->setInfosSortie('Date reservé à mon Don Juan');
        $sortie4->setDateHeureDebut(new \DateTime('+3 day'));
        $sortie4->setDateLimiteInscription(new \DateTime('+1 day'));
        $sortie4->setDuree(120);
        $sortie4->setNbInscriptionMax(2);
        $sortie4->setEtat($etatOuverte);
        $sortie4->addParticipant($userSerge);
        $sortie4->setNom('Repas en tête à tête');
        $manager->persist($sortie4);

        $sortie5 = new Sortie();
        $sortie5->setSite($siteRennes);
        $sortie5->setOrganisateur($userAlan);
        $sortie5->setLieu($lieuBlizz);
        $sortie5->setInfosSortie('Annulée - pas assez froid on va prévoir une piscine plutôt');
        $sortie5->setDateHeureDebut(new \DateTime('+7 day'));
        $sortie5->setDateLimiteInscription(new \DateTime('+1 day'));
        $sortie5->setDuree(300);
        $sortie5->setNbInscriptionMax(12);
        $sortie5->addParticipant($userAlan);
        $sortie5->addParticipant($userElisabeth);
        $sortie5->setEtat($etatAnnulee);
        $sortie5->setNom('Patinoire');
        $manager->persist($sortie5);

        $sortie6 = new Sortie();
        $sortie6->setSite($siteRennes);
        $sortie6->setOrganisateur($userAlan);
        $sortie6->setLieu($lieuBDS);
        $sortie6->setInfosSortie('C\'est mon anniversaire, je paie ma trounée !');
        $sortie6->setDateHeureDebut(new \DateTime('-7 day'));
        $sortie6->setDateLimiteInscription(new \DateTime('-17 day'));
        $sortie6->setDuree(300);
        $sortie6->setNbInscriptionMax(22);
        $sortie6->setEtat($etatPassee);
        $sortie6->addParticipant($userAlan);
        $sortie6->addParticipant($userSerge);
        $sortie6->addParticipant($userElisabeth);
        $sortie6->setNom('Anniversaire Alan');
        $manager->persist($sortie6);

        $sortie7 = new Sortie();
        $sortie7->setSite($siteRennes);
        $sortie7->setOrganisateur($userAlan);
        $sortie7->setLieu($lieuBDS);
        $sortie7->setInfosSortie('Premier match de la coupe du monde');
        $sortie7->setDateHeureDebut(new \DateTime('-2 month'));
        $sortie7->setDateLimiteInscription(new \DateTime('-3 month'));
        $sortie7->setDuree(300);
        $sortie7->setNbInscriptionMax(22);
        $sortie7->setEtat($etatPassee);
        $sortie7->addParticipant($userAlan);
        $sortie7->addParticipant($userSerge);
        $sortie7->addParticipant($userElisabeth);
        $sortie7->setNom('Match France - All Black');
        $manager->persist($sortie7);

        $sortie8 = new Sortie();
        $sortie8->setSite($siteNantes);
        $sortie8->setOrganisateur($userPaula);
        $sortie8->setLieu($lieuGolf);
        $sortie8->setInfosSortie('Pour ne pas rater la plus belle region du monde');
        $sortie8->setDateHeureDebut(new \DateTime('27-11-2023 14:00:00'));
        $sortie8->setDateLimiteInscription(new \DateTime('25-11-2023 19:00:00'));
        $sortie8->setDuree(200);
        $sortie8->addParticipant($userPaula);
        $sortie8->setNbInscriptionMax(1);
        $sortie8->setEtat($etatEnCours);
        $sortie8->setNom('Golf en Bretagne');
        $manager->persist($sortie8);



        $manager->flush();
    }

    public function getDependencies()
    {
        return [
        UserFixtures::class,
        EtatFixtures::class,
        SiteFixtures::class,
        LieuFixtures::class];
    }
}
