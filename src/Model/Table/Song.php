<?php
namespace LeoGalleguillos\Song\Model\Table;

use Zend\Db\Adapter\Adapter;

class Song
{
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int Primary key
     */
    public function insert(
        string $artist,
        string $title,
        string $featuredArtists
    ) {
        $sql = '
            INSERT
              INTO `song` (`artist`, `title`, `featured_artists`)
            VALUES (?, ?, ?)
                 ;
        ';
        $parameters = [
            $artist,
            $title,
            $featuredArtists,
        ];
        return $this->adapter
                    ->query($sql, $parameters)
                    ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `song`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }
}
