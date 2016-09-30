<?php


class FooCest
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_gets_the_time()
    {
        $result = (new MyTailor\Foo)->go();

        var_dump($result);
    }
}