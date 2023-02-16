<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')->assertSeeText("Login");
    }

    public function testLoginPageForMember()
    {
        $this->withSession([
            "user" => "ghani"
        ])->get("/login")->assertRedirect("/");
    }

    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "ghani",
            "password" => "rahasia"
        ])->assertRedirect("/")->assertSessionHas("user", "ghani");
    }

    public function testLoginForUserAlreadyLogin()
    {

        $this->withSession([
            "user" => "ghani"
        ])->post('/login', [
                "user" => "ghani",
                "password" => "rahasia"
            ])->assertRedirect("/");
    }



    public function testLoginIsEmpty()
    {
        $this->post("/login", [
        ])->assertSeeText("User or Password is Required");
    }

    public function testLoginFailed()
    {
        $this->post("/login", [
            "user" => "ghani",
            "password" => "passwordWrong"
        ])->assertSeeText("User or Password is Wrong");
    }

    public function testLogout()
    {
        $this->withSession([
            "user" => "ghani"
        ])->post("/logout")->assertRedirect("/")->assertSessionMissing("user");
    }
    public function testLogoutGuest()
    {
        $this->post("/logout")->assertRedirect("/");
    }
}
