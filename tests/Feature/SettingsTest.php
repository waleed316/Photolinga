<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function userCanBrowseToSettings()
    {
        $this->signIn()
            ->get('/settings')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function guestsCanNotBrowseToSettings()
    {
        $this->withExceptionHandling()
            ->get('/settings')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function userCanSeeAccountDetailsOnSettingsPage()
    {
        $this->signIn()
            ->get('/settings')
            ->assertSee('Public Information');
    }

    /**
     * @test
     */
    public function userCanUpdateAccountDetails()
    {
        $this->signIn();

        $updatedName = "John Doe";
        $updatedEmail = "john@example.com";
        $skype = "johnSkype";
        $contactNumber = "+923332015123";
        $address = "Some Address";
        $city = "Some City";
        $country = "Some Country";

        $this->patch('/settings/account', [
            'name' => $updatedName,
            'email' => $updatedEmail,
            'skype' => $skype,
            'contact_number' => $contactNumber,
            'address' => $address,
            'city' => $city,
            'country' => $country
        ]);

        $this->assertDatabaseHas('users', [ 'name' => $updatedName, 'email' => $updatedEmail ]);
        $this->assertDatabaseHas('contact_informations',
            [
                'skype' => $skype,
                'contact_number' => $contactNumber,
                'address' => $address,
                'city' => $city,
                'country' => $country
            ]);
    }

    /**
     * @test
     */
    public function userCanOnlyUpdateAccountDetailsWhenAllRequiredParametersArePresent()
    {
        $this->signIn();
        $this->withExceptionHandling();

        $updatedName = "John Doe";
        $updatedEmail = "john@example.com";
        $skype = "johnSkype";
        $contactNumber = "+923332015123";
        $address = "Some Address";
        $city = "Some City";
        $country = "Some Country";

        $this->patch('/settings/account', [
            'email' => $updatedEmail,
            'skype' => $skype,
            'contact_number' => $contactNumber,
            'address' => $address,
            'city' => $city,
            'country' => $country
        ])->assertSessionHasErrors('name');

        $this->patch('/settings/account', [
            'name' => $updatedName,
//            'email' => $updatedEmail,
            'skype' => $skype,
            'contact_number' => $contactNumber,
            'address' => $address,
            'city' => $city,
            'country' => $country
        ])->assertSessionHasErrors('email');

        $this->patch('/settings/account', [
            'name' => $updatedName,
            'email' => $updatedEmail,
            'skype' => $skype,
//            'contact_number' => $contactNumber,
            'address' => $address,
            'city' => $city,
            'country' => $country
        ])->assertSessionHasErrors('contact_number');

        $this->patch('/settings/account', [
            'name' => $updatedName,
            'email' => $updatedEmail,
            'skype' => $skype,
            'contact_number' => $contactNumber,
//            'address' => $address,
            'city' => $city,
            'country' => $country
        ])->assertSessionHasErrors('address');

        $this->patch('/settings/account', [
            'name' => $updatedName,
            'email' => $updatedEmail,
            'skype' => $skype,
            'contact_number' => $contactNumber,
            'address' => $address,
//            'city' => $city,
            'country' => $country
        ])->assertSessionHasErrors('city');

        $this->patch('/settings/account', [
            'name' => $updatedName,
            'email' => $updatedEmail,
            'skype' => $skype,
            'contact_number' => $contactNumber,
            'address' => $address,
            'city' => $city,
//            'country' => $country
        ])->assertSessionHasErrors('country');
    }

    /**
     * @test
     */
    public function userCanBrowseToSecuritySettings()
    {
        $this->signIn();

        $this
            ->get('/settings/security')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function guestsCanNotBrowseToSecuritySettings()
    {
        $this->withExceptionHandling()
            ->get('/settings/security')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function userCanChangePassword()
    {
        $this->signIn();
        $this->withExceptionHandling();

        $currentPassword = "secret";
        $newPassword = "secret123";
        $this->patch('/change-password', [
            'current_password' => $currentPassword,
            'new_password' => $newPassword,
            'new_password_confirm' => $newPassword
        ])->assertStatus(302);
        $credentials = [
            'email' => auth()->user()->email,
            'password' => $newPassword
        ];

        $this->post('/logout');
        $this->post('/login', $credentials)->assertStatus(200);
    }

//    /**
//     * @test
//     */
//    public function userCanNotChangePasswordWithWrongCurrentPassword()
//    {
//        $this->signIn();
//        $currentPassword = "asdasdas";
//        $newPassword = "secret123";
//        $this->patch('/change-password', [
//            'current_password' => $currentPassword,
//            'new_password' => $newPassword,
//            'new_password_confirm' => $newPassword
//        ])->assertSessionHasErrors('current_password');
//    }
}