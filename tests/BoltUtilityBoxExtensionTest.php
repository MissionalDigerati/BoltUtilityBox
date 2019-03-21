<?php
use PHPUnit\Framework\TestCase;
use Bolt\Extension\MissionalDigerati\BoltUtilityBox\BoltUtilityBoxExtension;

class BoltUtilityBoxExtensionTest extends TestCase
{
    private $toolbox = null;

    public function setUp()
    {
        $this->toolbox = new BoltUtilityBoxExtension();
    }

    public function testTwigEncryptStringShouldEncrypt()
    {
        $actual = $this->toolbox->twigEncryptString('i am encrypted!');
        $this->assertNotEmpty($actual);
        $this->assertNotEquals('i am encrypted!', $actual);
    }

    public function testTwigSortObjArraySortsAscDefault()
    {
        $data = [
            [
                'id'    =>  3,
                'name'  =>  'sandy'
            ],
            [
                'id'    =>  2,
                'name'  =>  'anna'
            ],
            [
                'id'    =>  1,
                'name'  =>  'kelly'
            ]
        ];
        $sorted = array_values($this->toolbox->twigSortObjArray($data, 'name'));
        $this->assertEquals('anna', $sorted[0]['name']);
        $this->assertEquals('kelly', $sorted[1]['name']);
        $this->assertEquals('sandy', $sorted[2]['name']);
    }

    public function testTwigSortObjArraySortsDesc()
    {
        $data = [
            [
                'id'    =>  3,
                'name'  =>  'sandy'
            ],
            [
                'id'    =>  2,
                'name'  =>  'anna'
            ],
            [
                'id'    =>  1,
                'name'  =>  'kelly'
            ]
        ];
        $sorted = array_values($this->toolbox->twigSortObjArray($data, 'name', 'desc'));
        $this->assertEquals('anna', $sorted[2]['name']);
        $this->assertEquals('kelly', $sorted[1]['name']);
        $this->assertEquals('sandy', $sorted[0]['name']);
    }

    public function testTwigSortObjArraySortsByDifferentKey()
    {
        $data = [
            [
                'id'    =>  3,
                'name'  =>  'sandy'
            ],
            [
                'id'    =>  2,
                'name'  =>  'anna'
            ],
            [
                'id'    =>  1,
                'name'  =>  'kelly'
            ]
        ];
        $sorted = array_values($this->toolbox->twigSortObjArray($data, 'id', 'asc'));
        $this->assertEquals('kelly', $sorted[0]['name']);
        $this->assertEquals('anna', $sorted[1]['name']);
        $this->assertEquals('sandy', $sorted[2]['name']);
    }

    public function testTwigRemoveRecordsShouldRemoveTheCorrectRecords()
    {
        $data = [
            [
                'id'    =>  3,
                'name'  =>  'sandy'
            ],
            [
                'id'    =>  2,
                'name'  =>  'anna'
            ],
            [
                'id'    =>  1,
                'name'  =>  'kelly'
            ]
        ];
        $cleaned = array_values($this->toolbox->twigRemoveRecords($data, [3, 1]));
        $this->assertEquals(1, count($cleaned));
        $this->assertEquals('anna', $cleaned[0]['name']);
    }
}
