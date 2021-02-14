<?php

namespace App\Controller\Admin;

use App\Entity\RepairComment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RepairCommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RepairComment::class;
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
