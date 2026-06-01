<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class EnsureRoadmapPhase3 extends Command
{
    protected $signature   = 'roadmap:ensure-phase3';
    protected $description = 'Ensure Phase 3 roadmap rows (year 7-9) exist in the database';

    public function handle(): int
    {
        $rows = [
            [
                'year_number'   => 7,
                'year_label'    => 'Year 7',
                'goal'          => 'Establish ethics council and publish governance frameworks',
                'projects_json' => json_encode(['AI Ethics Research Lab launch', 'Human Oversight Framework publication', 'Ethics council formation', 'First AI governance standards']),
                'kpis_json'     => json_encode(['Ethics council established', 'Governance framework published', '10 industry signatories', '5 government partnerships']),
                'sort_order'    => 7,
            ],
            [
                'year_number'   => 8,
                'year_label'    => 'Year 8',
                'goal'          => 'Scale industry partnerships and host inaugural AI Governance Summit',
                'projects_json' => json_encode(['AI Governance Summit (inaugural)', 'Industry partnership program', 'Cross-border governance coordination', 'Human Oversight audit procedures']),
                'kpis_json'     => json_encode(['500+ summit attendees', '25 industry partners', '15 government delegations', 'Published audit standards']),
                'sort_order'    => 8,
            ],
            [
                'year_number'   => 9,
                'year_label'    => 'Years 9–10',
                'goal'          => 'HVRF recognized globally as the institution for human value in the AI era',
                'projects_json' => json_encode(['Global governance institution status', 'International policy influence', 'Annual World Human Value Report', 'Human-AI coexistence framework']),
                'kpis_json'     => json_encode(['Recognized by 50+ governments', 'Annual summit 2,000+ attendees', 'Policy influence in 3+ regions', 'Published global standard']),
                'sort_order'    => 9,
            ],
        ];

        $inserted = 0;
        foreach ($rows as $row) {
            $exists = DB::table('roadmap_years')
                ->where('pillar', 'purpose')
                ->where('year_number', $row['year_number'])
                ->exists();

            if (! $exists) {
                DB::table('roadmap_years')->insert(array_merge($row, [
                    'pillar'     => 'purpose',
                    'updated_at' => now(),
                ]));
                $inserted++;
                $this->line("  Inserted year {$row['year_number']}");
            } else {
                $this->line("  Year {$row['year_number']} already exists — skipped");
            }
        }

        if ($inserted > 0) {
            Cache::forget('roadmap_purpose');
            $this->info("Phase 3 data ensured ({$inserted} rows inserted). Cache cleared.");
        } else {
            $this->info('Phase 3 data already complete. Nothing to do.');
        }

        return self::SUCCESS;
    }
}
