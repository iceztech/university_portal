<?php


namespace Zikzay\Controller\Traits;


trait AdminCreateAuth
{
    public function admin ()
    {
        $this->render("admin.create");
    }
}