<?php

namespace App\Controller\Admin;

use App\Entity\RepairComment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RepairCommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RepairComment::class;
    }

   public function configureCrud(Crud $crud): Crud
   {
        return $crud
            ->setEntityLabelInSingular('Komentarz do naprawy')
            ->setEntityLabelInPlural('Komentarze do naprawy');
//            ->setDefaultSort(['repair' => 'DESC']);

    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('text');
            yield AssociationField::new('repair');
//            yield DateField::new('created_at')->onlyOnIndex();

    }

}
