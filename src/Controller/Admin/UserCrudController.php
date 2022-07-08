<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Translation\TranslatableMessage;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Utilisateurs')
            ->setEntityLabelInSingular('Utilisateur');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                 ->hideOnform(),
            TextField::new('firstname', new TranslatableMessage('Prénom')),
            TextField::new('lastname',new TranslatableMessage('Nom de famille')),
            TextField::new('email',new TranslatableMessage('Email')),
            TextField::new('address',new TranslatableMessage('Adresse')),
            TextField::new('city' ,new TranslatableMessage('ville')),
            TextField::new('zipcode',new TranslatableMessage('Code Postal')),
            ArrayField::new('roles'),
            DateTimeField::new('createdAt',new TranslatableMessage('Création du compte'))
                ->hideOnForm()

//            TextEditorField::new('description'),
        ];
    }

}
