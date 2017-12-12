<?php
namespace LeoGalleguillos\SongTest\Model\Service;

use LeoGalleguillos\Song\Model\Entity\Song as SongEntity;
use LeoGalleguillos\Song\Model\Service\Song as SongService;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    protected function setUp()
    {
        $this->songEntity            = new SongEntity();
        $this->songEntity->artist    = 'Rihanna';
        $this->songEntity->title     = 'Work';
        $this->songEntity->featuredArtists     = 'Drake';

        $this->songService = new SongService();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(SongService::class, $this->songService);
    }

    public function testGetFullName()
    {
        $this->assertSame(
            'Rihanna - Work (ft Drake)',
            $this->songService->getFullName($this->songEntity)
        );
    }
}
