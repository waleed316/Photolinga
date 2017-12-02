<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function aPortfolioAlbumRequiresATitle()
    {
        $this->withExceptionHandling();
        $portfolio = make( 'App\Portfolio', [ 'title' => null ] );

        $this->post( '/portfolios', $portfolio->toArray() )
            ->assertSessionHasErrors( 'title' );
    }

    /**
     * @test
     */
    public function portfolioRequiresAnAuthenticatedUser()
    {
        $this->withExceptionHandling();
        $portfolio = make( 'App\Portfolio', [ 'user_id' => null ] );

        $this->post( '/portfolios', $portfolio->toArray() )
            ->assertSessionHasErrors( 'user_id' );

        $portfolio = make( 'App\Portfolio', [ 'user_id' => 999 ] );

        $this->post( '/portfolios', $portfolio->toArray() )
            ->assertSessionHasErrors( 'user_id' );
    }

    /**
     * @test
     */
    public function portfolioHasManyImages()
    {
        $portfolio = create( 'App\Portfolio' );

        $this->assertInstanceOf( 'Illuminate\Database\Eloquent\Collection', $portfolio->images );
    }


}