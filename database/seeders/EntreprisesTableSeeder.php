<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntreprisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('entreprises')->delete();
        
        \DB::table('entreprises')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle_apropos' => '“L’élégance au service de vos événements.”',
                'description_apropos' => '<p><strong>DC Agency</strong> est une agence d’événementiel premium spécialisée dans <strong>l’accueil et la mise à disposition d’hôtesses et d’agents événementiels</strong>.<br>Nous mettons <strong>l’élégance, le professionnalisme et le sens du détail</strong> au service de vos événements, pour offrir à vos invités une expérience mémorable dès le premier contact.</p><p>Depuis plusieurs années, nous accompagnons <strong>entreprises, marques et institutions</strong> dans la réussite de leurs événements — <strong>salons, galas, conférences, lancements de produits ou mariages haut de gamme</strong>.<br>Notre équipe allie <strong>présence, rigueur et savoir-faire</strong> pour valoriser votre image et garantir un accueil irréprochable.</p><p>Nos pôles d’expertise :</p><p><strong>Hôtesses &amp; Agents événementiels</strong></p><p><strong>DC Mobility &amp; Event Logistics</strong></p><p><strong>Assistance &amp; Coordination d’Événements</strong></p><p><strong>DC Agency</strong>, l’élégance au service de l’accueil et de vos événements d’exception.</p>',
                'created_at' => '2025-10-22 13:03:58',
                'updated_at' => '2025-10-22 14:01:17',
            ),
        ));
        
        
    }
}