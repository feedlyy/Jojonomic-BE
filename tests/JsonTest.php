<?php


class JsonTest extends TestCase
{
    /** @test */
    public function Test() {
        //        authenticate user
        $costumer = \App\User::query()->select('*')
            ->where('role', '=', 'costumer')
            ->orWhere('token', '!=', null)
            ->first();
        $owner = \App\User::query()->select('*')
            ->where('role', '=', 'owner')
//            ->orWhere('token', '!=', null)
            ->first();

//        post a data
        $this->json('POST', '/cd/create?token='.$owner->token, [
            'title' => 'tes',
            'rate' => 10000,
            'category' => 'cartoon',
            'quantity' => 12
        ]);

//        get all data
        $this->json('GET', '/cds?token='.$costumer->token);


        $this->assertTrue(true);
    }
}
