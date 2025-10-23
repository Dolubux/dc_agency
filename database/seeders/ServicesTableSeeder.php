<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 4321015926,
                'libelle' => 'Pôle Assistance & Coordination d’Événements',
                'slug' => 'pole-assistance-coordination-d-evenements',
            'description' => '<ul><li>Planification complète ou partielle d’événements (du concept à la réalisation).</li><li>Accueil protocolaire et gestion du public.</li><li>Support sur site pendant les événements (orientation, inscription, gestion des badges).</li></ul>',
                'icone' => 'fas fa-calendar',
                'statut' => 1,
                'created_at' => '2025-10-23 10:22:40',
                'updated_at' => '2025-10-23 10:22:57',
            ),
            1 => 
            array (
                'id' => 8147363206,
                'libelle' => 'Pôle DC Mobility & Event Logistics',
                'slug' => 'pole-dc-mobility-event-logistics',
            'description' => '<ul><li>Gestion des transports pour invités, artistes ou clients (voitures haut de gamme, vans, minibus).</li><li>Planification des déplacements avant, pendant et après les événements.</li><li>Livraison et installation du matériel événementiel (stands, signalétique, équipements, etc.).</li><li>Coordination avec les partenaires logistiques.</li></ul>',
                'icone' => 'fas fa-car',
                'statut' => 1,
                'created_at' => '2025-10-23 10:14:54',
                'updated_at' => '2025-10-23 10:20:42',
            ),
            2 => 
            array (
                'id' => 12919565151,
                'libelle' => 'Hôtesses & Agents événementiels',
                'slug' => 'hotesses-agents-evenementiels',
            'description' => '<ul><li>Mise à disposition d’hôtesses d’accueil pour salons, galas, lancements, mariages…</li><li>Hôtesses VIP pour événements haut de gamme</li><li>Agents logistiques et de terrain (montage, coordination, gestion des invités)</li><li>Encadrement et supervision du personnel événementiel</li></ul>',
                'icone' => 'fas fa-user-tie',
                'statut' => 1,
                'created_at' => '2025-10-21 17:45:48',
                'updated_at' => '2025-10-21 17:54:19',
            ),
        ));
        
        
    }
}