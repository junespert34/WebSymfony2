<?php

namespace HB\BlogBundle\Tests\Service;

use HB\BlogBundle\Service\Slugger;

/**
 * Description of SluggerTest
 *
 * @author hb
 */
class SluggerTest extends \PHPUnit_Framework_TestCase {

    public function testCanslug() {

        $slugger = new Slugger();

        $this->assertEquals('un-article', $slugger->getSlug("un article"));
        $this->assertEquals('un-article', $slugger->getSlug("Un article"));
        $this->assertEquals('un-article', $slugger->getSlug("un-article"));
        $this->assertNotEquals('un-article', $slugger->getSlug("un article1"));
    }

}
