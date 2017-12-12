<?php
namespace LeoGalleguillos\Song;

use LeoGalleguillos\Song\Model\Service\Song as SongService;
use LeoGalleguillos\Song\Model\Table\Song as SongTable;

class Module
{
    public function getServiceConfig()
    {
        return [
            'factories' => [
                SongService::class => function ($serviceManager) {
                    return new SongService();
                },
                SongTable::class => function ($serviceManager) {
                    return new SongTable(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
