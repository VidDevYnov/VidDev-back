<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\ArticleType;
use App\Entity\User;
use App\Entity\ArticleMaterial;
use App\Entity\ArticleState;
use App\Entity\ArticleCategory;
use App\Entity\ArticleSize;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

$article = new Article;
$article
->setName($faker->word())
->setBrand($faker->word())
->setDescription($faker->word())
->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20))
->setColor($faker->word());



            $manager->persist($article);
            
        }


        for ($i = 0; $i < 100; $i++) {

            $articleSize = new ArticleSize;
            $articleSize
            ->setWorded($faker->word());
            
             $manager->persist($articleSize);
                        
                    }

                    for ($i = 0; $i < 100; $i++) {

                        $articleCategory = new ArticleCategory;
                        $articleCategory
                        ->setWorded($faker->word());
                        
                         $manager->persist($articleCategory);
                                    
                                }


                                for ($i = 0; $i < 100; $i++) {

                                    $articleMaterial = new ArticleMaterial;
                                    $articleMaterial
                                    ->setWorded($faker->word());
                                    
                                     $manager->persist($articleMaterial);
                                                
                                            }
            

                                            for ($i = 0; $i < 100; $i++) {

                                                $articleState = new ArticleState;
                                                $articleState
                                                ->setWorded($faker->word());
                                                
                                                 $manager->persist($articleState);
                                                            
                                                        }
                        
                                                        
                                            for ($i = 0; $i < 100; $i++) {

                                                $articleType = new ArticleType;
                                                $articleType
                                                ->setWorded($faker->word());
                                                
                                                 $manager->persist($articleType);
                                                            
                                                        }

                                                        for ($i = 0; $i < 25; $i++) {
                                                            $user = new User;
                                                            $user
                                                            ->setFirstName($faker->firstName)
                                                            ->setLastName($faker->lastName)
                                                              ->setEmail($faker->freeEmail)
                                                              ->setPassword($this->passwordEncoder->encodePassword($user, '154876923'))
                                                              ->setBio($faker->word())
                                                              ->setRoles([''])
                                                              
                                                             ->setPoint($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000))
                                                              ->setSolde($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000));
                                                              
                                                      
                                                      
                                                            $manager->persist($user);
                                                          }
                        

        $manager->flush();
    }
}
