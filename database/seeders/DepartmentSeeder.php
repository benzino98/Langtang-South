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
                'name' => 'Personnel Management',
                'overview' => 'The Personnel Management Department is responsible for the effective administration and welfare of Council employees. It oversees staff records, recruitment, deployment, training, discipline, promotions and other personnel matters to ensure a motivated and efficient workforce.',
                'responsibilities' => "- Administering staff records, appointments, and promotions\n- Coordinating manpower deployment and staff capacity building\n- Managing council staff welfare, discipline, and industrial relations",
                'head_name' => 'Director of Personnel Management',
                'head_title' => 'Head of Department',
                'email' => 'personnel@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 1,
            ],
            [
                'name' => 'Education',
                'overview' => 'The Education Department supports the development and improvement of basic education within the Local Government. It works with relevant stakeholders to promote access to quality education, support schools and encourage initiatives that improve learning outcomes.',
                'responsibilities' => "- Promoting access to quality basic education across all wards\n- Monitoring and supporting primary schools and educational facilities\n- Coordinating adult education and youth learning support initiatives",
                'head_name' => 'Education Secretary',
                'head_title' => 'Head of Department',
                'email' => 'education@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 2,
            ],
            [
                'name' => 'Health',
                'overview' => 'The Health Department coordinates efforts to improve healthcare delivery across Langtang South. It supports primary healthcare services, public health programmes, disease prevention, health awareness and initiatives aimed at improving the wellbeing of residents.',
                'responsibilities' => "- Managing primary healthcare facilities and community clinics\n- Coordinating maternal, child health, and routine immunization services\n- Implementing public health disease prevention and health awareness initiatives",
                'head_name' => 'Director of Primary Healthcare',
                'head_title' => 'Head of Department',
                'email' => 'health@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 3,
            ],
            [
                'name' => 'Works and Housing',
                'overview' => 'The Works and Housing Department is responsible for coordinating the Council’s physical development and infrastructure-related activities. Its responsibilities include roads, public buildings, maintenance works and other projects that improve the living environment and support community development.',
                'responsibilities' => "- Supervising physical development, road rehabilitations, and civil works\n- Maintaining public buildings and municipal facilities\n- Implementing community infrastructural development projects",
                'head_name' => 'Director of Works',
                'head_title' => 'Head of Department',
                'email' => 'works@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 4,
            ],
            [
                'name' => 'Social Services',
                'overview' => 'The Social Services Department promotes the welfare and social wellbeing of residents, particularly vulnerable members of the community. It supports social welfare programmes, youth and women empowerment, community development and other initiatives that promote inclusion and strengthen community wellbeing.',
                'responsibilities' => "- Coordinating social welfare programs for vulnerable community members\n- Facilitating youth and women empowerment initiatives\n- Promoting social inclusion and community development activities",
                'head_name' => 'Head of Social Services',
                'head_title' => 'Head of Department',
                'email' => 'socialservices@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 5,
            ],
            [
                'name' => 'Agriculture',
                'overview' => 'The Agriculture Department promotes agricultural development and supports farmers across the Local Government. It provides extension services, encourages improved farming practices and supports initiatives aimed at increasing food production, strengthening livelihoods and creating opportunities within the agricultural sector.',
                'responsibilities' => "- Delivering agricultural extension services to local farming communities\n- Supporting improved farming techniques and input distribution\n- Boosting food production and agribusiness livelihood opportunities",
                'head_name' => 'Head of Agricultural Services',
                'head_title' => 'Head of Department',
                'email' => 'agriculture@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 6,
            ],
            [
                'name' => 'Finance and Supplies',
                'overview' => 'The Finance and Supplies Department manages the Council’s financial and supply-related operations. It maintains financial records, processes expenditure documentation, manages stores and supplies, and ensures compliance with established financial, procurement and administrative procedures.',
                'responsibilities' => "- Maintaining council financial accounts, payroll, and expenditure records\n- Managing council inventory, store supplies, and procurement processes\n- Ensuring strict adherence to financial regulations and administrative procedures",
                'head_name' => 'Council Treasurer',
                'head_title' => 'Head of Department',
                'email' => 'finance@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 7,
            ],
            [
                'name' => 'Water, Sanitation and Hygiene (WASH)',
                'overview' => 'The WASH Department works to improve access to safe water, adequate sanitation and proper hygiene services across communities. It supports water and sanitation initiatives, promotes healthy environments and raises public awareness on good hygiene practices.',
                'responsibilities' => "- Expanding community access to clean and safe drinking water sources\n- Promoting environmental sanitation and community hygiene awareness\n- Monitoring and maintaining rural water points and public sanitation facilities",
                'head_name' => 'Head of WASH Department',
                'head_title' => 'Head of Department',
                'email' => 'wash@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 8,
            ],
            [
                'name' => 'Budget, Planning, Research',
                'overview' => 'The Budget, Planning and Research Department provides technical support for effective planning and development within the Council. It coordinates budget preparation, development planning, data collection and research to support evidence-based decision-making and ensure that programmes and projects reflect the needs and priorities of the people.',
                'responsibilities' => "- Coordinating annual budget estimates and capital planning\n- Conducting socioeconomic research and community needs assessments\n- Monitoring and evaluating council projects and program outcomes",
                'head_name' => 'Head of Budget & Planning',
                'head_title' => 'Head of Department',
                'email' => 'planning@langtangsouthlgc.gov.ng',
                'phone' => '07084219704',
                'sort_order' => 9,
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
