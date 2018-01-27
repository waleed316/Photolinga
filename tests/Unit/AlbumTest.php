<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AlbumTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function aPortfolioAlbumRequiresATitle()
    {
        $this->signIn();
        $this->withExceptionHandling();
        $portfolio = make( 'App\Album', [ 'title' => null ] );
        $this->post( '/album/store', $portfolio->toArray() )
            ->assertSessionHasErrors( 'title' );
    }

    /**
     * @test
     */
    public function albumRequiresAnAuthenticatedUser()
    {
        // dd(Session()->all());
        // session_start();
        // $this->signIn();
        
        $this->withExceptionHandling();
        $portfolio = make( 'App\Album', [ 'user_id' => null ] );
        //dd($portfolio);
        $this->post( '/album/store', $portfolio->toArray() )
            ->assertSessionHasErrors( 'user_id' );

        $portfolio = make( 'App\Album', [ 'user_id' => 999 ] );

        $this->post( '/album/store', $portfolio->toArray() )
            ->assertSessionHasErrors( 'user_id' );
    }

    /**
     * @test
     */
    public function albumHasManyImages()
    {
        $portfolio = create( 'App\Album' );

        $this->assertInstanceOf( 'Illuminate\Database\Eloquent\Collection', $portfolio->images );
    }


}