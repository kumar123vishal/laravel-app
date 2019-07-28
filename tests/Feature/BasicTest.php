<?php
namespace Tests\Feature;

use App\Domain\Core\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class userTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginTrue()
    {
        $credential = [
            'email' => 'vishal@test.com',
            'password' => 'user'
        ];
         $this->post('login',$credential)->assertRedirect('/');
    }

    public function testLoginFalse()
    {
        $credential = [
            'email' => 'vishal@test.com',
            'password' => 'incorrectpass'
        ];

        $response = $this->post('login',$credential);

        $response->assertSessionHasErrors();
    }
}
