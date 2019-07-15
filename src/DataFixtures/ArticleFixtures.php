<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 10 articles! Bam!
        $tags = array('tag1', 'tag2', 'tag3', 'tag4 ','tag5');
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle('article '.$i);
            $article->setImgURL('img/symfony_black_03.png');
            $article->setAtext('article_content'.$i);
            $article->setTags($tags);
            $manager->persist($article);
        }
        $manager->flush();
    }
}
