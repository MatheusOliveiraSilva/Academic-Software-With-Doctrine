<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity(repositoryClass="Alura\Doctrine\Repository\StudentRepository")
 */

class Student 
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $name;
    
    /**
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $phones;

    /**
     * @ManyToMany(targetEntity="Course", mappedBy="students")
     */
    private $courses;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
	$this->courses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function setName($name): self
    {
        $this->name = $name;
	return $this;
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
	$phone->setStudent($this);
	return $this;
    }

    public function getPhones(): Collection
    {
        return $this->phones;
    }

    public function addCourse(Course $course): self
    {

        if ($this->courses->contains($course)) {
	    return $this;
	}

        $this->courses->add($course);
	$course->addStudent($this);
	return $this;
    }

    /**
     * @return Courses[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }
}
