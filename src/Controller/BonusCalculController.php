<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class BonusCalculController extends AbstractController
{
    #[Route('/', name: 'app_bonus_calcul', methods: ['GET', 'POST'])]
    public function index(Request $request, SessionInterface $session): Response
    {

        if ($request->isMethod('POST')) {
            try {
                // Récupération et validation des valeurs
                $bonusInitial = $this->validateInput($request->request->get('bonus_initial', 1.00)); // Par défaut 1.00
                $anneesSansAccident = max(0, (int) $request->request->get('annees_sans_accident', 0)); // Évite les valeurs négatives
                $accidentsResponsables = max(0, (int) $request->request->get('accidents_responsables', 0)); // Évite les valeurs négatives

                // Application du bonus/malus
                $bonusInitial *= pow(0.95, $anneesSansAccident); // Réduction de 5% par année sans accident
                $bonusInitial *= pow(1.25, $accidentsResponsables); // Malus de 25% par accident responsable

                // On s'assure que le coefficient est entre 0.50 et 3.50
                $bonusFinal = max(0.50, min($bonusInitial, 3.50));

                // Stock le résultat
                $session->set('bonus_result', $bonusFinal);

                // Message flash pour informer l'utilisateur
                $this->addFlash('success', 'Succès');

                return $this->redirectToRoute('app_bonus_calcul');
            } catch (\InvalidArgumentException $e) {
                $this->addFlash('error', $e->getMessage());
                return $this->redirectToRoute('app_bonus_calcul');
            }
        }

        // Récupération du résultat
        $result = $session->get('bonus_result', null);

        return $this->render('bonus_calcul/index.html.twig', [
            'controller_name' => 'BonusCalculController',
            'result' => $result
        ]);
    }

    /**
     * Valide et convertit l'entrée en float.
     *
     * @param mixed $input
     * @return float
     */
    private function validateInput(mixed $input): float
    {
        if (!is_numeric($input)) {
            throw new \InvalidArgumentException('La valeur doit être un nombre.');
        }

        return (float) $input;
    }
}