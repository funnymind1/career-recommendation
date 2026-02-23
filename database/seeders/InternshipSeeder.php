<?php

namespace Database\Seeders;

use App\Models\Internship;
use Illuminate\Database\Seeder;

class InternshipSeeder extends Seeder
{
    public function run(): void
    {
        $internships = [
            [
                'user_id' => null,
                'company' => 'Google',
                'role' => 'Software Engineering Intern',
                'location' => 'Mountain View, CA',
                'category' => 'Tech Roles',
                'status' => 'live',
                'deadline' => now()->addDays(30),
                'duration' => '3 months',
                'details' => 'Join Google\'s engineering team to work on cutting-edge products. You\'ll collaborate with experienced engineers on real projects that impact billions of users.',
                'apply_url' => 'https://careers.google.com',
            ],
            [
                'user_id' => null,
                'company' => 'Microsoft',
                'role' => 'Data Science Intern',
                'location' => 'Redmond, WA',
                'category' => 'Tech Roles',
                'status' => 'live',
                'deadline' => now()->addDays(21),
                'duration' => '6 months',
                'details' => 'Work with Microsoft\'s data science team to build ML models and analyze large-scale datasets to improve product experiences.',
                'apply_url' => 'https://careers.microsoft.com',
            ],
            [
                'user_id' => null,
                'company' => 'Figma',
                'role' => 'Product Design Intern',
                'location' => 'San Francisco, CA',
                'category' => 'Design',
                'status' => 'live',
                'deadline' => now()->addDays(14),
                'duration' => '3 months',
                'details' => 'Design features for Figma\'s collaborative design platform. Work closely with product managers and engineers to ship beautiful, intuitive experiences.',
                'apply_url' => 'https://figma.com/careers',
            ],
            [
                'user_id' => null,
                'company' => 'JPMorgan Chase',
                'role' => 'Financial Analyst Intern',
                'location' => 'New York, NY',
                'category' => 'Finance',
                'status' => 'live',
                'deadline' => now()->addDays(45),
                'duration' => '3 months',
                'details' => 'Gain hands-on experience in investment banking, financial modeling, and market analysis at one of the world\'s leading financial institutions.',
                'apply_url' => 'https://careers.jpmorgan.com',
            ],
            [
                'user_id' => null,
                'company' => 'Meta',
                'role' => 'Marketing Analyst Intern',
                'location' => 'Menlo Park, CA',
                'category' => 'Tech Roles',
                'status' => 'live',
                'deadline' => now()->addDays(25),
                'duration' => '4 months',
                'details' => 'Join Meta\'s marketing analytics team to analyze campaign performance and provide data-driven recommendations for product growth.',
                'apply_url' => 'https://metacareers.com',
            ],
            [
                'user_id' => null,
                'company' => 'CrowdStrike',
                'role' => 'Cybersecurity Intern',
                'location' => 'Austin, TX',
                'category' => 'Tech Roles',
                'status' => 'live',
                'deadline' => now()->addDays(35),
                'duration' => '3 months',
                'details' => 'Help protect organizations from cyber threats. Work on vulnerability assessment, incident response, and security automation projects.',
                'apply_url' => 'https://crowdstrike.com/careers',
            ],
        ];

        foreach ($internships as $internship) {
            Internship::create($internship);
        }
    }
}
