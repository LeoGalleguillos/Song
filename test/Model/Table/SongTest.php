<?php
namespace LeoGalleguillos\SongTest\Model\Table;

use LeoGalleguillos\Song\Model\Table\Song as SongTable;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/song/';

    /**
     * @var SongTable
     */
    protected $songTable;

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter         = new Adapter($configArray);
        $this->songTable = new SongTable($this->adapter);

        $this->dropTable();
        $this->createTable();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(SongTable::class, $this->songTable);
    }

    public function testInsert()
    {
        $this->songTable->insert(
            'artist',
            'title',
            'featured artists'
        );

        $this->songTable->insert(
            'Rihanna',
            'Work',
            'Drake'
        );

        $this->assertSame(
            2,
            $this->songTable->selectCount()
        );
    }

    public function testSelectCount()
    {
        $this->assertSame(
            0,
            $this->songTable->selectCount()
        );
    }
}
