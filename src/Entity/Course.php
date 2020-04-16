<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
namespace Alura\Doctrine\Entity;

/**
 * @Entity
 */
class Course
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
     * @ManyToMany(targetEntity="Student", inversedBy="courses")
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function seName(string $name): self
    {
        $this->name = $name;
	return $this;
    }

    public function addStudent(Student $student)
    {

        if($this->students->contains($student)) {
            return $this;
	}

        $this->students->add($student);
	$student->addCourse($this);
        return $this;
    }

    public function getStudent()
    {
        return $this->students;
    }
}
