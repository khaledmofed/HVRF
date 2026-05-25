<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

return new class extends Migration
{
    public function up(): void
    {
        // Phase 3 (Years 7–10): Institution — Ethics & Governance
        DB::table('roadmap_years')->insert([
            [
                'pillar'        => 'purpose',
                'year_number'   => 7,
                'year_label'    => 'Year 7',
                'goal'          => 'Establish ethics council and publish governance frameworks',
                'projects_json' => json_encode(['AI Ethics Research Lab launch', 'Human Oversight Framework publication', 'Ethics council formation', 'First AI governance standards']),
                'kpis_json'     => json_encode(['Ethics council established', 'Governance framework published', '10 industry signatories', '5 government partnerships']),
                'sort_order'    => 7,
                'updated_at'    => now(),
            ],
            [
                'pillar'        => 'purpose',
                'year_number'   => 8,
                'year_label'    => 'Year 8',
                'goal'          => 'Scale industry partnerships and host inaugural AI Governance Summit',
                'projects_json' => json_encode(['AI Governance Summit (inaugural)', 'Industry partnership program', 'Cross-border governance coordination', 'Human Oversight audit procedures']),
                'kpis_json'     => json_encode(['500+ summit attendees', '25 industry partners', '15 government delegations', 'Published audit standards']),
                'sort_order'    => 8,
                'updated_at'    => now(),
            ],
            [
                'pillar'        => 'purpose',
                'year_number'   => 9,
                'year_label'    => 'Years 9–10',
                'goal'          => 'HVRF recognized globally as the institution for human value in the AI era',
                'projects_json' => json_encode(['Global governance institution status', 'International policy influence', 'Annual World Human Value Report', 'Human-AI coexistence framework']),
                'kpis_json'     => json_encode(['Recognized by 50+ governments', 'Annual summit 2,000+ attendees', 'Policy influence in 3+ regions', 'Published global standard']),
                'sort_order'    => 9,
                'updated_at'    => now(),
            ],
        ]);

        Cache::forget('roadmap_purpose');
    }

    public function down(): void
    {
        DB::table('roadmap_years')->whereIn('year_number', [7, 8, 9])->delete();
        Cache::forget('roadmap_purpose');
    }
};
