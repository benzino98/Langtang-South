<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Administration',
                'overview' => 'The Administration Department manages the general logistics, secretariat functions, human resources, and official correspondence of the Langtang Local Government Council.',
                'responsibilities' => "- Directing staff recruitment, promotion, and discipline\n- Managing council assets and registry offices\n- Preparing official memos and hosting legislative proceedings",
                'head_name' => 'Alh. Ibrahim Dasuki',
                'head_title' => 'Director of Personnel Management (DPM)',
                'email' => 'admin@langtangcouncil.gov.ng',
                'phone' => '+234 803 111 2222',
                'sort_order' => 1,
            ],
            [
                'name' => 'Finance',
                'overview' => 'Responsible for treasury management, budget control, internally generated revenue (IGR) administration, and financial reporting.',
                'responsibilities' => "- Managing council accounts and budgets\n- Supervising revenue collection officers\n- Ensuring compliance with audit regulations",
                'head_name' => 'Mr. Solomon Selbong',
                'head_title' => 'Treasurer',
                'email' => 'finance@langtangcouncil.gov.ng',
                'phone' => '+234 803 222 3333',
                'sort_order' => 2,
            ],
            [
                'name' => 'Works',
                'overview' => 'Oversees the planning, execution, and maintenance of all council infrastructure projects, including roads, buildings, and general facilities.',
                'responsibilities' => "- Supervising engineering projects and structural designs\n- Road network rehabilitations and maintenance\n- Approving structural permits in accordance with council planning",
                'head_name' => 'Engr. Benson Wuyep',
                'head_title' => 'Director of Works',
                'email' => 'works@langtangcouncil.gov.ng',
                'phone' => '+234 803 333 4444',
                'sort_order' => 3,
            ],
            [
                'name' => 'Agriculture',
                'overview' => 'Supports local farmers, administers subsidized farm inputs, implements extension services, and promotes sustainable agricultural practices.',
                'responsibilities' => "- Facilitating the distribution of subsidized fertilizers and seedlings\n- Implementing tractor hiring services\n- Organizing community workshops on modern farming practices",
                'head_name' => 'Dr. Nanlir Nimfa',
                'head_title' => 'Head of Agriculture Dept.',
                'email' => 'agriculture@langtangcouncil.gov.ng',
                'phone' => '+234 803 444 5555',
                'sort_order' => 4,
            ],
            [
                'name' => 'Health',
                'overview' => 'Coordinates primary health care centers, immunization programs, maternal and child healthcare, and sanitation inspections across all wards.',
                'responsibilities' => "- Managing community health centers and clinics\n- Conducting routine immunization campaigns\n- Facilitating hygiene and sanitation assessments",
                'head_name' => 'Mrs. Elizabeth Ponfa',
                'head_title' => 'Director of Primary Health Care',
                'email' => 'health@langtangcouncil.gov.ng',
                'phone' => '+234 803 555 6666',
                'sort_order' => 5,
            ],
            [
                'name' => 'Education',
                'overview' => 'Monitors primary school standards, manages local education authority resources, and administers educational support programs and grants.',
                'responsibilities' => "- Inspecting primary school facilities and standard curriculums\n- Organizing teacher training seminars\n- Coordinating local adult literacy programs",
                'head_name' => 'Mr. Joshua Domtur',
                'head_title' => 'Director of Education',
                'email' => 'education@langtangcouncil.gov.ng',
                'phone' => '+234 803 666 7777',
                'sort_order' => 6,
            ],
        ];

        foreach ($departments as $dept) {
            Department::updateOrCreate(
                ['name' => $dept['name']],
                array_merge($dept, [
                    'slug' => Str::slug($dept['name']),
                    'is_active' => true,
                ])
            );
        }
    }
}
