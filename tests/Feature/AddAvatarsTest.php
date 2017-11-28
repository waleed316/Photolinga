<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AddAvatarsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function onlyRegisteredUsersCanAddAvatars()
    {
        $this->withExceptionHandling();

        $this->json('POST', 'api/users/1/avatar')
             ->assertStatus(401);
    }

    /**
     * @test
     */
    public function aUserCanAddAnAvatarToTheirProfile()
    {
        $this->signIn();

        Storage::fake('public');

        $this->json('POST', 'api/users/' . auth()->id() . '/avatar', [
            'avatar' => $file = UploadedFile::fake()->image('avatar.jpg')
        ]);
        $this->assertEquals(asset('avatars/' . $file->hashName()), url('/') . '/' . auth()->user()->avatar_path);

        Storage::disk('public')->assertExists('avatars/' . $file->hashName());
    }
}
