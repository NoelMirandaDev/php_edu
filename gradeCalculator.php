<?php
$score = 85; // Score to be checked
$letterGrade = null; // default letter grade
$isPassing = false; // default pass/fail value

// Conditional statements to check score to assign appropriate grade letter and pass/fail value
if ($score >= 90) {
    $letterGrade = 'A';
    $isPassing = true;
    } elseif ($score >= 80) {
        $letterGrade = 'B';
        $isPassing = true;
    } elseif ($score >= 70) {
        $letterGrade = 'C';
        $isPassing = true;
    } elseif ($score >= 60) {
        $letterGrade = 'D';
        $isPassing = true;
    } elseif ($score < 60 && $score >= 0) {
        $letterGrade = 'F';
        $isPassing = false;
    } else {
        // this else condition checks for any invalid scores
        $letterGrade = 'invalid score';
        $isPassing = false;
        }

echo "Score: {$score}, Grade: {$letterGrade}, Passing: " . ($isPassing ? 'true' : 'false') . "\n";
