<?php
/**
 * Colourist by Zerlinda — Central Data Configuration
 * Asia & Indonesia's No. 1 Color Expert
 * Studio: ASHTA District 8, SCBD, Jakarta & Kuala Lumpur
 */

if (!defined('APP_INIT')) {
    define('APP_INIT', true);
}

// Global Site Information
$site = [
    'name' => 'Colourist by Zerlinda',
    'title_default' => 'Colourist by Zerlinda — Asia & Indonesia\'s No.1 Color Expert',
    'tagline' => 'Asia & Indonesia\'s No.1 Color Expert',
    'hero_headline' => 'Helping people feel confident through best colors.',
    'description' => 'Asia & Indonesia\'s No. 1 Color Expert located at ASHTA District 8, SCBD, Jakarta. Private color analysis, styling, makeup masterclasses, and bespoke lipstick formulation.',
    'url' => 'https://colouristbyzerlinda.com',
    'whatsapp' => '628111925828', // Standard international format without '+'
    'whatsapp_display' => '+62 811-1925-828',
    'email' => 'inquiry@colourist.id',
    'instagram' => 'https://instagram.com/colourist_official',
    'tiktok' => 'https://tiktok.com/@colourist_official',
    'studio_address' => 'ASHTA District 8, Level 1, SCBD Lot 28, Jl. Jend. Sudirman Kav 52-53, Jakarta Selatan 12190',
    'studio_location_short' => 'ASHTA District 8, SCBD, Jakarta',
    'operating_hours' => 'Mon – Sun: 10:00 – 21:00 WIB (By Appointment Only)',
    // Admin password hash: default is 'colourist2026'
    // To change, generate password_hash('your_new_password', PASSWORD_DEFAULT);
    'admin_password_hash' => '$2y$10$w0s6h2H9w5yH1z2N0k1A7u4x9O7M.gX3M0yT8zK3W5F7D0gG4J2rO', // 'colourist2026'
    'admin_default_pass' => 'colourist2026'
];

// Media Slots Configuration
// All assets reference this array. Update file paths or placeholders here.
$media = [
    // Brand & Seals
    'brand.logo' => 'assets/media/logo.png',
    'journey.seal' => 'assets/media/journey/journey_seal_gold.svg',
    'journey.seal_empty' => 'assets/media/journey/journey_seal_empty.svg',

    // Journey Icons
    'journey.icon_color' => 'assets/media/journey/journey_icon_color.svg',
    'journey.icon_styling' => 'assets/media/journey/journey_icon_styling.svg',
    'journey.icon_makeup' => 'assets/media/journey/journey_icon_makeup.svg',
    'journey.icon_lipstick' => 'assets/media/journey/journey_icon_lipstick.svg',

    // Home
    'hero.home' => 'assets/media/hero_portrait.mp4',

    // Services (Cards & Detail)
    'service.color-analysis' => 'assets/media/service_color_analysis.mp4',
    'service.private-styling' => 'assets/media/service_private_styling.mp4',
    'service.makeup-masterclass' => 'assets/media/service_makeup_masterclass.mp4',
    'service.custom-lipstick' => 'assets/media/service_custom_lipstick.mp4',

    // Transformations
    'transformation.1' => 'assets/media/trans_1.mp4',
    'transformation.2' => 'assets/media/trans_2.mp4',
    'transformation.3' => 'assets/media/trans_3.mp4',
    'transformation.4' => 'assets/media/1029.mp4',
    'why.image' => 'assets/media/why_faces.png',

    // About
    'about.hero' => 'assets/media/colourist_official.jpg',
    'about.story' => 'assets/media/76c60e282c78588fbb41bba6c9e69e4c.jpg', // Zerlinda Master Consultation
    'about.studio.1' => 'assets/media/ashta_studio_tour.jpg',
    'about.studio.2' => 'assets/media/a078afb1-5988-4495-9f79-e99accf47c6f.png',
    'about.studio.3' => 'assets/media/de1bc2dba489e4a3206531c28e7d1d0e.jpg',
    'about.studio.4' => 'assets/media/1c528e59-624d-4e95-bd54-f92ff7a03c77.png',

    // Workshops
    'workshop.1' => 'assets/media/service_color_analysis.mp4',
    'workshop.2' => 'assets/media/service_private_styling.mp4',
    'workshop.3' => 'assets/media/nagita_makeup_class.jpg',

    // Collaboration & Partners
    'collab.hero' => 'assets/media/colourist_official.jpg',
    'partners.1' => '', // Blank = graceful gradient placeholder
    'partners.2' => '',
    'partners.3' => '',
    'partners.4' => '',
    'partners.5' => '',
    'partners.6' => '',
    'partners.7' => '',
    'partners.8' => '',
];

// Press Coverage Strip (About Page)
$press = [
    [
        'title' => 'Kompas TV — Tren Color Analysis',
        'media' => 'assets/media/kompas_color_analysis.jpg',
        'outlet' => 'Kompas TV'
    ],
    [
        'title' => 'Liputan6 — Mengapa Personal Color Penting',
        'media' => 'assets/media/liputan6_personal_color.jpg',
        'outlet' => 'Liputan6'
    ],
    [
        'title' => 'Liputan6 — Akibat Warna Pakaian Tidak Sesuai',
        'media' => 'assets/media/liputan6_warna_pakaian.jpg',
        'outlet' => 'Liputan6'
    ],
    [
        'title' => 'Female Daily — Indonesia\'s 1st Color Consultant',
        'media' => 'assets/media/femaledaily_colourist.jpg',
        'outlet' => 'Female Daily'
    ],
    [
        'title' => 'Tasya Farasya — Personal Color Discovery',
        'media' => 'assets/media/tasya_farasya_color.jpg',
        'outlet' => 'Tasya Farasya'
    ],
    [
        'title' => 'Nagita Slavina — Spring Palette Analysis',
        'media' => 'assets/media/nagita_colourist.jpg',
        'outlet' => 'RANS Entertainment'
    ],
    [
        'title' => 'Henti Yashinta — Color Analysis & Makeup',
        'media' => 'assets/media/henti_color_analysis.jpg',
        'outlet' => 'Henti Yashinta'
    ],
    [
        'title' => 'Ririe Prams — Seasonal Undertone Alignment',
        'media' => 'assets/media/ririe_colourist.jpg',
        'outlet' => 'Ririe Prams'
    ],
    [
        'title' => 'Personal Color Appointment Jakarta',
        'media' => 'assets/media/pca_jakarta_appointment.jpg',
        'outlet' => 'Client Feature'
    ],
];

// Navigation Menu (order: About, Experiences ›, Transformation, Workshop, Collaboration, Partners, Book Now)
$nav_menu = [
    [
        'label' => 'About',
        'url' => 'about',
    ],
    [
        'label' => 'Experiences',
        'url' => 'experiences',
        'has_sub' => true,
        'children' => [
            [
                'label' => 'Personal Color Analysis',
                'url' => 'experience/personal-color-analysis',
                'slug' => 'personal-color-analysis'
            ],
            [
                'label' => 'Private Styling',
                'url' => 'experience/private-styling',
                'slug' => 'private-styling'
            ],
            [
                'label' => 'Makeup Masterclass',
                'url' => 'experience/makeup-masterclass',
                'slug' => 'makeup-masterclass'
            ],
            [
                'label' => 'Custom Lipstick',
                'url' => 'experience/custom-lipstick',
                'slug' => 'custom-lipstick'
            ]
        ]
    ],
    [
        'label' => 'Transformation',
        'url' => 'transformation',
    ],
    [
        'label' => 'Workshop',
        'url' => 'workshop',
    ],
    [
        'label' => 'Collaboration',
        'url' => 'collaboration',
    ],
    [
        'label' => 'Partners',
        'url' => 'partners',
    ],
    [
        'label' => 'Book Now',
        'url' => 'book',
    ]
];

// Journey Steps (Home Page Section 2)
$journey_steps = [
    [
        'slug' => 'personal-color-analysis',
        'title_line1' => 'PERSONAL',
        'title_line2' => 'COLOR ANALYSIS',
        'sublabel' => '',
        'icon' => 'assets/media/journey/journey_icon_color.svg',
        'seal' => 'assets/media/journey/journey_seal_gold.svg',
        'is_gold' => true,
        'alt' => 'Personal Color Analysis'
    ],
    [
        'slug' => 'private-styling',
        'title_line1' => 'PRIVATE',
        'title_line2' => 'STYLING',
        'sublabel' => '',
        'icon' => 'assets/media/journey/journey_icon_styling.svg',
        'seal' => 'assets/media/journey/journey_seal_empty.svg',
        'is_gold' => false,
        'alt' => 'Private Styling'
    ],
    [
        'slug' => 'makeup-masterclass',
        'title_line1' => 'MAKEUP',
        'title_line2' => 'MASTERCLASS',
        'sublabel' => '',
        'icon' => 'assets/media/journey/journey_icon_makeup.svg',
        'seal' => 'assets/media/journey/journey_seal_empty.svg',
        'is_gold' => false,
        'alt' => 'Makeup Masterclass'
    ],
    [
        'slug' => 'custom-lipstick',
        'title_line1' => 'CUSTOM',
        'title_line2' => 'LIPSTICK',
        'sublabel' => '(LIP BAR EXPERIENCE)',
        'icon' => 'assets/media/journey/journey_icon_lipstick.svg',
        'seal' => 'assets/media/journey/journey_seal_empty.svg',
        'is_gold' => false,
        'alt' => 'Custom Lipstick'
    ]
];

// Services Data (4 primary services)
$services = [
    'personal-color-analysis' => [
        'slug' => 'personal-color-analysis',
        'title' => 'Personal Color Analysis',
        'short_title' => 'Color Analysis',
        'eyebrow' => '60 minutes',
        'duration' => '60 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 2.500.000',
        'price_num' => 2500000,
        'media_slot' => 'service.color-analysis',
        'aspect' => '4/5',
        'description' => 'A private 60-minute colour analysis with our expert Colour Analysts, helping you understand what truly suits you — from the clothes you wear to the makeup and accessories you choose every day.',
        'full_text' => 'Through our proprietary 12-season color drape methodology under standardized 5500K daylight lighting, we determine your skin\'s undertone, value, and chroma. You will receive a bespoke seasonal color swatch, personalized makeup shade recommendations, and styling guidelines that highlight your natural beauty.',
        'what_to_expect' => [
            'Professional 12-season color draping under calibrated 5500K daylight to determine your exact undertone, value, and chroma.',
            'A bespoke seasonal color swatch booklet with fabric samples you can take shopping — never second-guess a shade again.',
            'Personalized makeup shade recommendations and styling guidelines tailored to your unique palette.'
        ]
    ],
    'private-styling' => [
        'slug' => 'private-styling',
        'title' => 'Private Styling',
        'short_title' => 'Private Styling',
        'eyebrow' => '90 minutes',
        'duration' => '90 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 3.800.000',
        'price_num' => 3800000,
        'media_slot' => 'service.private-styling',
        'aspect' => '4/5',
        'description' => 'In this private 90-minute session, discover the colours that bring out your natural beauty, the silhouettes that flatter your body, and the details that complement your face — from glasses and accessories to hairstyles and patterns. Stop spending on pieces that never quite feel right, and start making choices that truly work for you. Because looking your best should feel effortless, not like guesswork.',
        'full_text' => 'Comprehensive body architecture and facial geometry assessment combined with your personal color palette. Learn silhouette balancing, neckline curation, eyewear fitting, and wardrobe editing strategies that elevate your everyday presence.',
        'what_to_expect' => [
            'Complete body architecture assessment — silhouette balancing, neckline curation, and proportion mapping for your frame.',
            'Facial geometry analysis covering eyewear fitting, accessories, hairstyle recommendations, and pattern matching.',
            'A wardrobe editing strategy session so you leave knowing exactly what to keep, donate, and shop for next.'
        ]
    ],
    'makeup-masterclass' => [
        'slug' => 'makeup-masterclass',
        'title' => 'Makeup Masterclass',
        'short_title' => 'Makeup Class',
        'eyebrow' => 'Masterclass',
        'duration' => '120 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 3.000.000',
        'price_num' => 3000000,
        'media_slot' => 'service.makeup-masterclass',
        'aspect' => '4/5',
        'description' => 'An intensive hands-on masterclass designed to elevate your personal beauty routine. Master colour theory for makeup, bespoke foundation matching, eyeshadow techniques for your unique eye shape, and flawless daily application tailored to your personal seasonal palette.',
        'full_text' => 'Learn step-by-step master techniques directly from our lead analysts. Bring your personal makeup pouch for a complete audit: discard conflicting shades and discover how to blend formulas that enhance your features effortlessly.',
        'what_to_expect' => [
            'Hands-on colour theory for makeup — learn which pigment families harmonize with your seasonal palette.',
            'Bespoke foundation matching and eyeshadow techniques tailored to your unique eye shape and skin undertone.',
            'Personal makeup pouch audit: identify conflicting shades and learn to blend formulas that enhance your features.'
        ]
    ],
    'custom-lipstick' => [
        'slug' => 'custom-lipstick',
        'title' => 'Custom Lipstick',
        'short_title' => 'Custom Lipstick',
        'eyebrow' => 'Signature',
        'duration' => '45 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 1.200.000',
        'price_num' => 1200000,
        'media_slot' => 'service.custom-lipstick',
        'aspect' => '4/5',
        'description' => 'Create your signature shade from scratch with our master colorists. From undertone calibration to custom scent, texture, and finish — craft a one-of-a-kind lip formula that complements your natural complexion and skin tone flawlessly.',
        'full_text' => 'Sit at our formulation bar and watch pigments blend in real time. Choose from satin, matte, velvet, or glossy finishes, infuse with organic nourishing botanical oils, and engrave your custom lipstick case with your initials.',
        'what_to_expect' => [
            'Live pigment blending at our formulation bar — watch your signature shade come to life in real time.',
            'Choose your finish (satin, matte, velvet, or glossy) and infuse with organic nourishing botanical oils.',
            'Take home your bespoke lipstick in a personalised engraved case — a truly one-of-a-kind keepsake.'
        ]
    ]
];
// Alias for backwards compatibility if needed
$services['color-analysis'] = &$services['personal-color-analysis'];

// Workshops List (Workshop Page)
$workshops = [
    [
        'id' => 1,
        'tag' => 'Upcoming',
        'title' => 'Personal Color Masterclass & Draping Clinic',
        'media_slot' => 'workshop.1',
        'date' => 'Saturday, 28 Nov 2026',
        'duration' => '3 Hours',
        'quota' => '6 seats',
        'price' => 'IDR 1.850.000',
        'sold_out' => false,
        'description' => 'Intimate small-group workshop covering seasonal color theory, undertone draping, and capsule wardrobe curation.'
    ],
    [
        'id' => 2,
        'tag' => 'Upcoming',
        'title' => 'Executive Presence & Color Styling Intensive',
        'media_slot' => 'workshop.2',
        'date' => 'Saturday, 12 Dec 2026',
        'duration' => '4 Hours',
        'quota' => '8 seats',
        'price' => 'IDR 2.400.000',
        'sold_out' => false,
        'description' => 'Professional styling workshop tailored for business leaders, founders, and executives seeking wardrobe confidence.'
    ],
    [
        'id' => 3,
        'tag' => 'Sold out',
        'title' => 'Celebrity Glam & Seasonal Makeup with Zerlinda',
        'media_slot' => 'workshop.3',
        'date' => 'Sunday, 15 Nov 2026',
        'duration' => '3.5 Hours',
        'quota' => 'Sold out',
        'price' => 'IDR 3.200.000',
        'sold_out' => true,
        'description' => 'Exclusive intimate masterclass hosted by Zerlinda focusing on camera-ready personal seasonal makeup.'
    ]
];

// Stats (About Page)
$stats = [
    ['number' => '1000+', 'label' => 'Clients'],
    ['number' => '2', 'label' => 'Locations'],
    ['number' => 'No.1', 'label' => 'Color Expert']
];

// Collaboration Pillars
$collab_pillars = [
    'brand' => [
        'title' => 'Brand',
        'description' => 'Custom corporate styling, employee branding workshops, VIP retail activations, and bespoke color curation for luxury fashion and beauty houses.'
    ],
    'media' => [
        'title' => 'Media',
        'description' => 'Editorial styling, television features, trend analysis commentary, and broadcast consultations on color psychology and visual aesthetics.'
    ],
    'talent' => [
        'title' => 'Talent',
        'description' => 'Celebrity red carpet consulting, public figure wardrobe alignment, pageant delegate styling, and photoshoot creative direction.'
    ]
];

// Testimonials (Partners & About)
$testimonials = [
    [
        'quote' => 'Colourist completely transformed how I see my own wardrobe. Finding my exact seasonal palette brought an effortless confidence that saves me hours every week.',
        'author' => 'Nagita Slavina',
        'role' => 'Public Figure & Founder, RANS'
    ],
    [
        'quote' => 'Understanding undertone versus overtone changed the way I choose makeup formulations forever. A must-do experience for anyone in Indonesia.',
        'author' => 'Tasya Farasya',
        'role' => 'Beauty Influencer & Entrepreneur'
    ],
    [
        'quote' => 'Zerlinda and her team deliver an international-grade analysis in the most luxurious atelier setting at ASHTA. The standard in color consulting.',
        'author' => 'Female Daily Editorial',
        'role' => 'Media Partner'
    ]
];

// Partner Brands
$partners = [
    ['name' => 'Female Daily Network', 'category' => 'Media'],
    ['name' => 'RANS Entertainment', 'category' => 'Production & Talent'],
    ['name' => 'Kompas TV', 'category' => 'Broadcast'],
    ['name' => 'Liputan6', 'category' => 'Media'],
    ['name' => 'ASHTA District 8', 'category' => 'Venue Partner'],
    ['name' => 'Miss Indonesia Org', 'category' => 'Pageant & Talent'],
    ['name' => 'Harper\'s Bazaar ID', 'category' => 'Publication'],
    ['name' => 'Sephora Indonesia', 'category' => 'Beauty Partner']
];

