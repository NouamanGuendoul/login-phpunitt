<?php

namespace Login\classes;

use PHPUnit\Framework\TestCase;
use Login\classes\Database;
use Login\classes\User;

class UserTest extends TestCase {
    private $username;
    private $db;

    public function testRegisterUser(): void {
        // Test successful registration
        $this->assertTrue($this->user->registerUser('Amin', 'Auro'));
    
        // Test registration with existing username (should fail)
        $this->assertFalse($this->user->registerUser('Amin', 'Aura'));
    }
    

    public function testLoginUser(): void {
        
        $this->assertTrue($this->user->loginUser('Amin', 'G'));

        
        $this->assertFalse($this->user->loginUser('Amin', 'T'));

        
        $this->assertFalse($this->user->loginUser('IDK', '5'));
    }

    public function testIsLoggedin(): void {
        
        $this->assertFalse($this->user->isLoggedin());

    
        $this->user->loginUser('Ark', 'Parry');
        $this->assertTrue($this->user->isLoggedin());
    }

    public function testLogoutUser()
        {
        
            $this->username->Logout();

            $isDeleted = (session_status() == PHP_SESSION_NONE && empty(session_id()));
            $this->assertTrue($isDeleted);
        }
      
}
