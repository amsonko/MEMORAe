<?php

namespace MEMORAe\TextBundle\Entity;

/**
 * Classe entity pour les admins
 *
 * @author Amstrong
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Admin")
 */

class AdminEntity {
    /**
     * @ORM\Id
     * @ORM\Column(name="admin_id", type="bigint")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="admin_pk_seq")
     */
    private $id;
    
    /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    
    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;
    
    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;
    
    /**
     * @ORM\Column(name="password", type="string", length=15)
     */
    private $password;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return AdminEntity
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return AdminEntity
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return AdminEntity
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return AdminEntity
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
}
