<?php
namespace LeoGalleguillos\SongTest\Model\Entity;

use LeoGalleguillos\Song\Model\Entity\Song as SongEntity;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    protected function setUp()
    {
        $this->songEntity = new SongEntity();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(SongEntity::class, $this->songEntity);
    }

    public function testAttributes()
    {
        $this->assertObjectHasAttribute('songId', $this->songEntity);
        $this->assertObjectHasAttribute('artist', $this->songEntity);
        $this->assertObjectHasAttribute('title', $this->songEntity);
        $this->assertObjectHasAttribute('featuredArtists', $this->songEntity);
    }
}
