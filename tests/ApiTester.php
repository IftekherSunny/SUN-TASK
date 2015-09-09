<?php 

class ApiTester extends TestCase
{
    /**
     * Migrate database
     * & Session start
     */
    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate');

        DB::beginTransaction();

        Session::start();
    }

    /**
     * Rollback database
     */
    public function tearDown()
    {
        DB::rollBack();
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