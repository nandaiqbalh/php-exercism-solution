<?php

declare(strict_types=1);
class Student {
    function __construct($name, $grade) {
        $this->name = $name;
        $this->grade = $grade;
    }
}
class School {
    function __construct() {
        $this->roster = [];
    }
    public function numberOfStudents() {
        return count($this->roster);
    }
    public function grade($grade) {
        $in_grade = [];
        foreach ($this->roster as $student) {
            if ($student->grade == $grade) {
                array_push($in_grade, $student->name);
            }
        }
        return $in_grade;
    }
    public function add($name, $grade) {
        array_push($this->roster, new Student($name, $grade));
    }
    public function studentsByGradeAlphabetical() {
        $by_grade = [];
        foreach ($this->roster as $student) {
            $grade = $student->grade;
            if (!key_exists($grade, $by_grade)) {
                $by_grade[$grade] = [$student->name];
            } else {
                array_push($by_grade[$grade], $student->name);
            }
        }
        ksort($by_grade);
        return array_map(function($names) {
            sort($names);
            return $names;
        }, $by_grade);
    }
}

 ?>
