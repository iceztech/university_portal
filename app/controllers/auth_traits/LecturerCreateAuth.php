<?php


namespace Zikzay\Controller\Traits;


trait LecturerCreateAuth
{

    public function lecturer ()
    {
        $this->render("lecturers.create");
    }
}