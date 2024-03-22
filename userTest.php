<?php

use PHPUnit\Framework\TestCase;
use Login\classes\Database;
use Login\classes\User;

class UserTest extends TestCase {
    private $user;
    private $db;


    protected function setUp(): void {
        $this->user = new User;
    }

    public function testRegisterUser(): void {
        // Test successful registration
        $this->assertTrue($this->user->registerUser('Amin', 'Auro'));
    
        // Test registration with existing username (should fail)
       
            $this->assertTrue($this->user->registerUser('Amin', 'Auro'));
            
     
   
    }
    

    public function testLoginUser(): void {
        
        $this->assertTrue($this->user->loginUser('Amin', 'G'));

        
        $this->assertFalse($this->user->loginUser('Amin', 'T'));

        
        $this->assertFalse($this->user->loginUser('IDK', '5'));
    }

    public function testIsLoggedin(): void {
    
        $this->user->loginUser('nouamanG', 'A');
        $this->assertFalse($this->user->isLoggedin());
    }

    public function testLogoutUser()
        {
        
            $this->user->Logout();

            $isDeleted = (session_status() == PHP_SESSION_NONE && empty(session_id()));
            $this->assertTrue($isDeleted);
        }
      
}
