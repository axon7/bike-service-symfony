<?php

namespace App\Controller\Admin;

use App\Entity\Repair;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
            TextField::new('name'),
            TextEditorField::new('bike_model'),
        ];
    }
*/
}
