<?php

namespace Database\Seeders;

use App\Models\Initiator;
use Illuminate\Database\Seeder;

class InitiatorSeeder extends Seeder
{
    public function run(): void
    {
        $initiators = [
            ['name' => 'SV Angel', 'logo_url' => 'sv-angel.png', 'website_url' => 'https://svangel.com'],
            ['name' => 'Silicon Valley Academy of Artificial Intelligence', 'logo_url' => 'svaai.png', 'website_url' => 'https://svai.academy/'],
            ['name' => 'OpenAI', 'logo_url' => 'openai.webp', 'website_url' => 'https://openai.com'],
            ['name' => 'Anthropic', 'logo_url' => 'anthropic.webp', 'website_url' => 'https://anthropic.com'],
            ['name' => 'Microsoft', 'logo_url' => 'microsoft.png', 'website_url' => 'https://microsoft.com'],
            ['name' => 'Google DeepMind', 'logo_url' => 'google-deepmind.svg', 'website_url' => 'https://deepmind.google'],
            ['name' => 'Aeterna Foundation', 'logo_url' => 'aeterna-foundation.png', 'website_url' => 'https://aeternax.net/'],
            ['name' => 'Salesforce (Agentforce)', 'logo_url' => 'salesforce.svg', 'website_url' => 'https://www.salesforce.com'],
            ['name' => 'Cognition AI', 'logo_url' => 'cognition-ai.png', 'website_url' => 'https://cognition.ai'],
            ['name' => 'Sierra', 'logo_url' => 'sierra.png', 'website_url' => 'https://sierra.ai'],
            ['name' => 'AWS', 'logo_url' => 'aws.webp', 'website_url' => 'https://aws.amazon.com'],
            ['name' => 'IBMi', 'logo_url' => 'ibmi.webp', 'website_url' => 'https://www.ibm.com'],
            ['name' => 'Glean', 'logo_url' => 'glean.svg', 'website_url' => 'https://glean.com'],
            ['name' => 'Harvey AI', 'logo_url' => 'harvey-ai.png', 'website_url' => 'https://harvey.ai'],
            ['name' => 'Moveworks', 'logo_url' => 'moveworks.svg', 'website_url' => 'https://moveworks.com'],
            ['name' => 'Aisera', 'logo_url' => 'aisera.webp', 'website_url' => 'https://aisera.com'],
            ['name' => 'CrewAI', 'logo_url' => 'crewai.png', 'website_url' => 'https://crewai.com'],
            ['name' => 'Beam AI', 'logo_url' => 'beam-ai.png', 'website_url' => 'https://beam.ai'],
        ];

        foreach ($initiators as $index => $initiator) {
            Initiator::updateOrCreate(
                ['name' => $initiator['name']],
                array_merge($initiator, [
                    'logo_url'   => '/images/initiators/' . $initiator['logo_url'],
                    'sort_order' => $index + 1,
                    'is_active'  => true,
                    'updated_at' => now(),
                ])
            );
        }
    }
}
