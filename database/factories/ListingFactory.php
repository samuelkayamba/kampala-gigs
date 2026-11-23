<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    public function definition(): array
    {
        $roles = [
            [
                'title' => 'Full-Stack Vue & Laravel Developer',
                'tags' => 'laravel, vuejs, tailwind, tourism, web',
                'desc' => 'Seeking a creative full-stack developer to maintain our booking engine and customer portal. Experience with Laravel, Vue 3, Tailwind CSS, and local payment gateway integrations (Pesapal, Flutterwave, MTN MoMo) is required.'
            ],
            [
                'title' => 'Aviation & Logistics Software Specialist',
                'tags' => 'sql, erp, logistics, aviation, csharp',
                'desc' => 'Manage and customize our freight tracking and customs clearance software. Candidates should understand supply chain workflows, URA ASYCUDA integrations, and relational database optimization.'
            ],
            [
                'title' => 'Solar Energy & Microgrid Field Technician',
                'tags' => 'solar, renewable-energy, engineering, field-work',
                'desc' => 'Install, monitor, and troubleshoot off-grid solar mini-grids powering rural health centers and schools. Requires a diploma in Electrical Engineering and willingness to travel across upcountry districts.'
            ],
            [
                'title' => 'Mobile App Developer (Flutter / Android)',
                'tags' => 'flutter, dart, android, delivery, mobile',
                'desc' => 'Help us scale our last-mile delivery and e-commerce rider application. Strong skills in Flutter, Google Maps SDK, Firebase, and offline-first mobile architecture for low-bandwidth areas required.'
            ],
            [
                'title' => 'Senior Fintech Backend Engineer',
                'tags' => 'php, laravel, fintech, mobile-money, api',
                'desc' => 'Build and maintain high-volume payment APIs integrating MTN MoMo, Airtel Money, and local commercial banks. Strong background in PHP 8+, MySQL, Redis queues, and financial security standards.'
            ],
            [
                'title' => 'Agritech Systems & IoT Specialist',
                'tags' => 'python, iot, agritech, data, hardware',
                'desc' => 'Digitize dairy, coffee, and crop supply chains across Uganda. Deploy soil sensors, maintain solar-powered weather stations, and build backend analytics dashboards for cooperative farmers.'
            ],
            [
                'title' => 'Health Informatics & DHIS2 Officer',
                'tags' => 'dhis2, healthcare, data-analysis, sql, ngo',
                'desc' => 'Support regional referral hospitals and community clinics with electronic medical records and DHIS2 reporting pipelines. Experience with health data privacy and SQL reporting is essential.'
            ],
            [
                'title' => 'Cybersecurity & Core Banking Analyst',
                'tags' => 'security, banking, networking, linux, audit',
                'desc' => 'Monitor core banking infrastructure, conduct vulnerability assessments, and ensure compliance with Bank of Uganda cybersecurity guidelines. Certifications such as CEH or Security+ are an advantage.'
            ],
            [
                'title' => 'E-Commerce & Digital Marketing Lead',
                'tags' => 'ecommerce, seo, digital-marketing, retail, analytics',
                'desc' => 'Drive online customer acquisition and manage marketplace operations for fast-moving consumer goods across Greater Kampala. Experience with Meta Ads, Google Analytics, and WhatsApp Business APIs preferred.'
            ],
            [
                'title' => 'Civil & Water Infrastructure Engineer',
                'tags' => 'civil-engineering, autocad, water, construction, project-management',
                'desc' => 'Supervise borehole drilling, piped water distribution networks, and road drainage projects. Must be registered with the Engineers Registration Board (ERB) and proficient in AutoCAD Civil 3D.'
            ],
        ];

        $companyPrefixes = [
            'NilePay', 'Rwenzori', 'Source of the Nile', 'Pearl Air', 'Acholi',
            'BodaExpress', 'Crested Crane', 'Victoria Basin', 'Kigezi', 'Elgon',
            'Savannah', 'Equatorial', 'Karamoja', 'Bukedi', 'Tooro', 'Ankole',
            'Bunyoro', 'Busoga', 'Kampala Smart', 'Mukono', 'Wakiso', 'Lubaga'
        ];

        $companySuffixes = [
            'Technologies Uganda Ltd', 'Agro-Solutions', 'Safaris & Tech',
            'Cargo & Logistics', 'Clean Power Initiative', 'Uganda',
            'Digital Systems', 'Microfinance Ltd', 'Health Partners',
            'Engineering Group', 'Holdings Ltd', 'Innovations Hub'
        ];

        $locations = [
            'Plot 14, Nakasero Road, Kampala',
            'Acacia Avenue, Kololo, Kampala',
            'Main Street, Jinja',
            'Airport Road, Entebbe',
            'Gulu-Kampala Highway, Gulu City',
            'High Street, Mbarara City',
            'Portal Avenue, Fort Portal City',
            'Republic Street, Mbale City',
            'Oyam Road, Lira City',
            'Ntinda-Kisaasi Road, Kampala',
            'Kampala-Hoima Road, Nansana',
            'Jinja-Kampala Highway, Mukono',
            'Kabale-Kisoro Road, Kabale',
            'Avenue Road, Arua City',
            'Buganda Road, Central Division, Kampala'
        ];

        $prefixes = ['careers', 'jobs', 'hr', 'recruitment', 'apply', 'tech-hiring', 'info'];
        $tlds = ['.co.ug', '.ug', '.org'];

        $selectedRole = $this->faker->randomElement($roles);
        $companyName = $this->faker->randomElement($companyPrefixes) . ' ' . $this->faker->randomElement($companySuffixes);
        $domainSlug = Str::slug(Str::words($companyName, 2, ''), '');
        $tld = $this->faker->randomElement($tlds);
        $domain = $domainSlug . $tld;

        return [
            'title' => $selectedRole['title'],
            'tags' => $selectedRole['tags'],
            'company' => $companyName,
            'location' => $this->faker->randomElement($locations),
            'email' => $this->faker->randomElement($prefixes) . '@' . $domain,
            'website' => 'https://' . $domain,
            'description' => $selectedRole['desc'],
            'user_id' => User::factory(),
        ];
    }
}
