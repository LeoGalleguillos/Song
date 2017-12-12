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
        $fullName = $songEntity->artist . ' - ' . $songEntity->title;
        if ($songEntity->featuredArtists) {
            $fullName .= ' (ft ' . $songEntity->featuredArtists . ')';
        }
        return $fullName;
    }
}
