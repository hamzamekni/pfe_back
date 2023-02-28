<?php

namespace App\Controller\Admin;

use App\Entity\Calendar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Repository\CalendarRepository;

use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CalendarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Calendar::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('start'),
            DateTimeField::new('end'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }

    /**
     * @Route("/calendar",name="calendar")
     *
     * @param CalendarRepository $calendar
     * @return void
     */
    public function front(CalendarRepository $calendar){

        $events = $calendar->findAll();
        $rdvs = [];

        foreach($events as $events){
            $rdvs[] = [
                'id' => $events->getId(),
                'start' => $events->getStart()->format('Y-m-d H:i:s'),
                'end' => $events->getEnd()->format('Y-m-d H:i:s'),
                'title' => $events->getTitle(),
                'description' => $events->getDescription(),
                'backgroundColor' => $events->getBackgroundColor(),
                'borderColor' => $events->getBorderColor(),
                'textColor' => $events->getTextColor(),
                'allDay' => $events->getAllDay(),

            ];
        }

        $data = json_encode($rdvs);
        
        // return $this->render('main/index.html.twig',compact('data'));
    }

}
