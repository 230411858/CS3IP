<?php

namespace App;

enum UserType: string
{
    case Administrator = 'administrator';
    case Teacher = 'teacher';
    case Guardian = 'guardian';
    case Student = 'student';
}
