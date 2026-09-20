<?php

namespace Database\Seeders;

use App\Models\Leadership;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LeadershipSeeder extends Seeder
{
    public function run(): void
    {
        $leaders = [
            // Executive Chairman
            [
                'full_name' => 'HON. NANFA ALHASSAN NBIN',
                'title' => 'Executive Chairman',
                'portfolio' => 'Executive Chairman, Langtang South Local Government Council',
                'biography' => 'Hon. Nanfa Alhassan Nbin is a man whose journey reflects a deep commitment to service and community. With over two decades of experience in mining and general contracting, he built a successful career but chose to return home and dedicate his experience to the development of Langtang South. As Executive Chairman, he has brought a practical and people-centred approach to leadership, with a strong focus on security, roads, clean water, education and economic opportunities. Beyond his official responsibilities, his longstanding support for young people, students and vulnerable families reflects a genuine concern for the wellbeing of his people. For Hon. Nanfa Alhassan Nbin, leadership is not about position or recognition. It is about responsibility, service and creating meaningful change in the lives of the people he leads.',
                'welcome_message' => 'It is my great pleasure to welcome you to the official website of Langtang South Local Government Council. This platform is designed to bring our government closer to our people by providing accessible information about our programmes, projects, services, activities and development initiatives. At Langtang South, we believe that leadership is a responsibility to serve, listen and deliver. Our administration remains committed to promoting peace, improving infrastructure, strengthening education and healthcare, supporting our farmers and businesses, and creating opportunities for our young people and communities. While there are challenges and gaps that remain, we are determined to confront them with courage, transparency and purposeful action. We will continue to work with our people, traditional institutions, stakeholders and development partners to build a more peaceful, inclusive and prosperous Langtang South. I invite you to explore this website, stay informed and engage with us. Together, we can build the Langtang South we are proud to call home.',
                'sort_order' => 1,
            ],
            // Deputy Chairman
            [
                'full_name' => 'HON. JULCIT MUSA',
                'title' => 'Vice Chairman',
                'portfolio' => 'Deputy Chairman, Langtang South Local Government Council',
                'biography' => 'Hon. Julcit Musa brings over three decades of experience in public service to her role as Deputy Chairman of Langtang South Local Government Area. A seasoned public servant and former Education Secretary of Langtang South, she brings experience, wisdom and a deep understanding of grassroots administration to leadership. Her years of service reflect a commitment to duty, education and the development of her community. Today, she continues to serve with humility, diligence and purpose.',
                'welcome_message' => null,
                'sort_order' => 2,
            ],
            // Council Secretary
            [
                'full_name' => 'HON. NANMAN LUKA DOMTAU',
                'title' => 'Council Secretary',
                'portfolio' => 'Secretary to the Council',
                'biography' => 'Hon. Nanman Luka Domtau is the kind of administrator every effective local government needs: disciplined, meticulous and committed to excellence. An accomplished accountant by training, with extensive experience in the non-governmental organisation sector, he has developed a strong appreciation for accountability, transparency and sound administrative processes. His professional journey has shaped a methodical approach to work and a deep respect for institutional responsibility. As Council Secretary, he brings this discipline to Langtang South Local Government Area, ensuring that processes are properly followed, details are carefully considered and the machinery of administration functions efficiently. Quietly competent and deliberate in his approach, Hon. Nanman Luka Domtau represents the value of having capable professionals in public service.',
                'welcome_message' => null,
                'sort_order' => 3,
            ],

            // Supervisory Councillors
            [
                'full_name' => 'Hon. Nanzing Likita Nimram',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Agriculture and Natural Resources',
                'biography' => 'Supervisory Councillor overseeing agricultural extension, food production initiatives, and natural resources management.',
                'welcome_message' => null,
                'sort_order' => 4,
            ],
            [
                'full_name' => 'Hon. Nandul James Tyem',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Education',
                'biography' => 'Supervisory Councillor overseeing primary education standards, school infrastructure, and local learning development.',
                'welcome_message' => null,
                'sort_order' => 5,
            ],
            [
                'full_name' => 'Hon. Changla Vongtau',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Revenue and Transport',
                'biography' => 'Supervisory Councillor overseeing internally generated revenue processes, transit routes, and transport infrastructure.',
                'welcome_message' => null,
                'sort_order' => 6,
            ],
            [
                'full_name' => 'Hon. Lagang Fedip Alex Miri',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Budget, Research and Planning',
                'biography' => 'Supervisory Councillor coordinating council policy planning, research data, and annual budget frameworks.',
                'welcome_message' => null,
                'sort_order' => 7,
            ],
            [
                'full_name' => 'Hon. Emmanuel Nanpak',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Health',
                'biography' => 'Supervisory Councillor supervising primary healthcare facilities, public health initiatives, and immunizations.',
                'welcome_message' => null,
                'sort_order' => 8,
            ],
            [
                'full_name' => 'Hon. Nanring Sambo',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'PLWD (People Living With Disabilities)',
                'biography' => 'Supervisory Councillor advocating for disability rights, social inclusion, and accessible civic infrastructure.',
                'welcome_message' => null,
                'sort_order' => 9,
            ],
            [
                'full_name' => 'Hon. Nanchang Ayuba',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Works',
                'biography' => 'Supervisory Councillor managing physical infrastructure, roads, public facilities maintenance, and capital works.',
                'welcome_message' => null,
                'sort_order' => 10,
            ],
            [
                'full_name' => 'Hon. Nanchang Auta',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'W.A.S.H (Water, Sanitation & Hygiene)',
                'biography' => 'Supervisory Councillor overseeing community water supply schemes, environmental hygiene, and sanitation programs.',
                'welcome_message' => null,
                'sort_order' => 11,
            ],
            [
                'full_name' => 'Hon. Sohlam Binsing',
                'title' => 'Supervisory Councillor',
                'portfolio' => 'Social Services',
                'biography' => 'Supervisory Councillor facilitating community welfare programs, women and youth empowerment initiatives.',
                'welcome_message' => null,
                'sort_order' => 12,
            ],
        ];

        foreach ($leaders as $leader) {
            Leadership::updateOrCreate(
                ['full_name' => $leader['full_name']],
                array_merge($leader, [
                    'slug' => Str::slug($leader['full_name']),
                    'is_active' => true,
                ])
            );
        }
    }
}
