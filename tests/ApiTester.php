<?php 

class ApiTester extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        \Session::start();
    }

    public function tearDown()
    {
        $this->artisan('migrate:refresh');

        parent::tearDown();
    }

    /**
     * To get json object
     *
     * @param $uri
     *
     * @return mixed
     */
    protected function getJson($uri)
    {
        return json_decode($this->call('GET', $uri)->getContent());
    }

    /**
     * To assert object attributes
     *
     * @param       $object
     * @param array $attributes
     */
    protected function assertObjectHasAttributes($object, $attributes = [])
    {
        foreach($attributes as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }
}