<?php

namespace Database\Seeders;

use App\Models\CareerPath;
use Illuminate\Database\Seeder;

class CareerPathSeeder extends Seeder
{
    public function run(): void
    {
        $careers = [
            [
                'title' => 'Product Designer',
                'description' => 'Create user-centered digital experiences by combining research, design thinking, and prototyping to build products people love.',
                'match_keywords' => ['design', 'ui', 'ux', 'creative', 'prototype', 'figma', 'user research'],
                'tags' => ['UI/UX', 'Strategy', 'Research'],
                'image_url' => null,
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'Analyze complex datasets, build predictive models, and extract actionable insights to drive business decisions.',
                'match_keywords' => ['data', 'analytics', 'statistics', 'machine learning', 'python', 'visualization'],
                'tags' => ['Analytics', 'ML', 'Python'],
                'image_url' => null,
            ],
            [
                'title' => 'Software Engineer',
                'description' => 'Design, develop, and maintain software applications using modern programming languages and development practices.',
                'match_keywords' => ['programming', 'coding', 'software', 'development', 'algorithms', 'web'],
                'tags' => ['Development', 'Engineering', 'Systems'],
                'image_url' => null,
            ],
            [
                'title' => 'Financial Analyst',
                'description' => 'Evaluate financial data, create forecasts, and provide strategic recommendations to support business growth.',
                'match_keywords' => ['finance', 'accounting', 'economics', 'budgeting', 'investment', 'analysis'],
                'tags' => ['Finance', 'Analysis', 'Strategy'],
                'image_url' => null,
            ],
            [
                'title' => 'Digital Marketer',
                'description' => 'Plan and execute marketing strategies across digital channels to grow brand awareness and drive conversions.',
                'match_keywords' => ['marketing', 'social media', 'content', 'seo', 'branding', 'communication'],
                'tags' => ['Marketing', 'Content', 'SEO'],
                'image_url' => null,
            ],
            [
                'title' => 'Cybersecurity Analyst',
                'description' => 'Protect systems and networks from digital threats by implementing security measures and responding to incidents.',
                'match_keywords' => ['security', 'networking', 'risk', 'encryption', 'compliance', 'threat'],
                'tags' => ['Security', 'Networking', 'Risk'],
                'image_url' => null,
            ],
        ];

        foreach ($careers as $career) {
            CareerPath::create($career);
        }
    }
}
