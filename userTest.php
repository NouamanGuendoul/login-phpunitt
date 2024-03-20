<?php

namespace Login\classes;

use PHPUnit\Framework\TestCase;
use Login\classes\Database;
use Login\classes\User;

class UserTest extends TestCase {
    private $user;
    private $db;

    protected function setUp(): void {
        $this->user = new User(); // Instantiate the User class
        // You may need to set up $this->db if required for testing
    }

    public function testRegisterUser(): void {
        // Test successful registration
        $this->assertTrue($this->user->registerUser('nouaman', 'Gaamn'));
    
        // Test registration with existing username (should fail)
        $this->assertFalse($this->user->registerUser('nouaman', 'Gaamn'));
    }
    

    public function testLoginUser(): void {
        $this->assertTrue($this->user->loginUser('nouaman', 'F'));
        
        $this->assertFalse($this->user->loginUser('nouaman', 'D'));
        
        $this->assertFalse($this->user->loginUser('ORR', '5'));
    }

    public function testIsLoggedin(): void {
        $this->assertFalse($this->user->isLoggedin());

        $this->user->loginUser('Ark', 'Parry');
        $this->assertTrue($this->user->isLoggedin());
    }

    public function testLogoutUser(): void {
        // Assuming your User class has a logout method, adjust accordingly
        $this->user->logout();

        $isDeleted = (session_status() == PHP_SESSION_NONE && empty(session_id()));
        $this->assertTrue($isDeleted);
    }
}
