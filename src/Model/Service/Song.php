<?php
namespace LeoGalleguillos\Song\Model\Service;

use LeoGalleguillos\Song\Model\Entity\Song as SongEntity;

class Song
{
    /**
     * Get full name.
     *
     * @return string
     */
    public function getFullName(SongEntity $songEntity)
    {
        return $songEntity->firstName . ' ' . $songEntity->lastName;
    }
}
