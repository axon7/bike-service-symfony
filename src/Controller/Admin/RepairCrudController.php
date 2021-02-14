<?php

namespace App\Controller\Admin;

use App\Entity\Repair;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RepairCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Repair::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
