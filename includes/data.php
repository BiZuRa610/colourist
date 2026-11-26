<?php
/**
 * Colourist — Central Data Configuration
 * Asia & Indonesia's No. 1 Color Expert
 * Studio: ASHTA District 8, SCBD, Jakarta & Kuala Lumpur
 */

if (!defined('APP_INIT')) {
    define('APP_INIT', true);
}

// Global Site Information
$site = [
    'name' => 'Colourist',
    'title_default' => 'Colourist — Asia & Indonesia\'s No.1 Color Expert',
    'tagline' => 'Asia & Indonesia\'s No.1 Color Expert',
    'hero_headline' => 'Helping people feel confident through best colors.',
    'description' => 'Asia & Indonesia\'s No. 1 Color Expert located at ASHTA District 8, SCBD, Jakarta. Private color analysis, styling, makeup masterclasses, and bespoke lipstick formulation.',
    'url' => 'https://colourist.id',
    'whatsapp' => '6285121807590', // Standard international format without '+'
    'whatsapp_display' => '+62 851-2180-7590',
    'email' => 'inquiry@colourist.id',
    'instagram' => 'https://instagram.com/colourist_official',
    'tiktok' => 'https://tiktok.com/@colourist_official',
    'studio_address' => 'ASHTA District 8, Level 1, SCBD Lot 28, Jl. Jend. Sudirman Kav 52-53, Jakarta Selatan 12190',
    'studio_location_short' => 'ASHTA District 8, SCBD, Jakarta',
    'operating_hours' => 'Mon - Fri: 10 - 8pm | Sat - Sun: 10 - 6pm',
    'formspree_id' => 'XXXX', // Ganti dengan Formspree Form ID Anda (contoh: 'xpznvqwz')
    'admin_password_hash' => '$2y$10$w0s6h2H9w5yH1z2N0k1A7u4x9O7M.gX3M0yT8zK3W5F7D0gG4J2rO', // 'colourist2026'
    'admin_default_pass' => 'colourist2026'
];

// Media Slots Configuration
$media = [
    // Brand & Seals
    'brand.logo' => 'assets/media/logo.png',
    'brand.logo_black' => 'assets/media/logos/logo_colourist.png',
    'brand.logo_white' => 'assets/media/logos/logo_colourist_white.png',
    'journey.seal' => 'assets/media/journey/journey_seal_gold.png',
    'journey.seal_empty' => 'assets/media/journey/journey_seal_empty.svg',

    // Journey Icons
    'journey.icon_color' => 'assets/media/journey/journey_icon_color.png',
    'journey.icon_styling' => 'assets/media/journey/journey_icon_styling.png',
    'journey.icon_makeup' => 'assets/media/journey/journey_icon_makeup.png',
    'journey.icon_lipstick' => 'assets/media/journey/journey_icon_lipstick.png',

    // Home
    'hero.home' => 'assets/media/hero_full.mp4',
    'hero.home_poster' => 'assets/media/hero_full_poster.jpg',
    'home.leader_bg' => 'assets/media/leader_bg.jpg',
    'home.leader_video' => 'assets/media/leader_banner_video.mp4',
    'home.cta_bg' => 'assets/media/cta_bg.jpg',
    'home.transformations_collage' => 'assets/media/transformations_collage.jpg',

    // Services (Cards & Detail)
    'service.color-analysis' => 'assets/media/service_color_analysis.mp4',
    'service.color-analysis_poster' => 'assets/media/service_color_analysis_poster.jpg',
    'service.signature-experience' => 'assets/media/service_signature_experience.mp4',
    'service.signature-experience_poster' => 'assets/media/service_signature_experience_poster.jpg',
    'service.private-styling' => 'assets/media/service_private_styling.mp4',
    'service.private-styling_poster' => 'assets/media/service_private_styling_poster.jpg',
    'service.makeup-masterclass' => 'assets/media/service_makeup_masterclass.mp4',
    'service.makeup-masterclass_poster' => 'assets/media/service_makeup_masterclass_poster.jpg',
    'service.custom-lipstick' => 'assets/media/service_custom_lipstick.mp4',
    'service.custom-lipstick_poster' => 'assets/media/service_custom_lipstick_poster.jpg',

    // Transformation Stories (Photos, Hero, OG)
    'story.she-spent-12-years' => 'assets/media/transformation/transformation.jpg',
    'story.she-spent-12-years.image' => 'assets/media/transformation/transformation.jpg',
    'story.she-spent-12-years.hero' => 'assets/media/transformation/transformation.jpg',
    'story.she-spent-12-years.og' => 'assets/media/transformation/transformation.jpg',

    'story.six-years-in-black' => 'assets/media/transformation/transformation (2).jpg',
    'story.six-years-in-black.image' => 'assets/media/transformation/transformation (2).jpg',
    'story.six-years-in-black.hero' => 'assets/media/transformation/transformation (2).jpg',
    'story.six-years-in-black.og' => 'assets/media/transformation/transformation (2).jpg',

    'story.finding-confidence' => 'assets/media/transformation/transformation (3).jpg',
    'story.finding-confidence.image' => 'assets/media/transformation/transformation (3).jpg',
    'story.finding-confidence.hero' => 'assets/media/transformation/transformation (3).jpg',
    'story.finding-confidence.og' => 'assets/media/transformation/transformation (3).jpg',

    'story.rediscovering-herself' => 'assets/media/transformation/transformation (4).jpg',
    'story.rediscovering-herself.image' => 'assets/media/transformation/transformation (4).jpg',
    'story.rediscovering-herself.hero' => 'assets/media/transformation/transformation (4).jpg',
    'story.rediscovering-herself.og' => 'assets/media/transformation/transformation (4).jpg',

    // Transformations (Legacy Videos)
    'transformation.1' => 'assets/media/trans_1.mp4',
    'transformation.2' => 'assets/media/trans_2.mp4',
    'transformation.3' => 'assets/media/trans_3.mp4',
    'transformation.4' => 'assets/media/1029.mp4',
    'why.image' => 'assets/media/why_faces.png',

    // About
    'about.hero' => 'assets/media/colourist_official.jpg',
    'about.story' => 'assets/media/76c60e282c78588fbb41bba6c9e69e4c.jpg',
    'about.studio.1' => 'assets/media/ashta_studio_tour.jpg',
    'about.studio.2' => 'assets/media/a078afb1-5988-4495-9f79-e99accf47c6f.png',
    'about.studio.3' => 'assets/media/de1bc2dba489e4a3206531c28e7d1d0e.jpg',
    'about.studio.4' => 'assets/media/1c528e59-624d-4e95-bd54-f92ff7a03c77.png',

    // Workshop
    'workshop.hero' => 'assets/media/workshop/workshop_hero_collage.jpg',
    'workshop.video' => 'assets/media/workshop_video.mp4',
    'workshop.video_poster' => 'assets/media/workshop/workshop_video_poster.jpg',
    'workshop.group' => 'assets/media/workshop/workshop_group.jpg',
    'workshop.cta_bg' => 'assets/media/workshop/workshop_cta_bg.jpg',

    // Collaboration & Partners
    'collab.hero' => 'assets/media/colourist_official.jpg',
    'partners.celebs.1' => 'assets/media/partners_celeb_1.jpg',
    'partners.celebs.2' => 'assets/media/partners_celeb_2.jpg',
    'partners.celebs.3' => 'assets/media/partners_celeb_3.jpg',
    'partners.celebs.4' => 'assets/media/partners_celeb_4.jpg',
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

// Navigation Menu (order: What is it?, Experiences ›, Transformation, Workshop, Collaboration, Partners, Book Now)
$nav_menu = [
    [
        'label' => 'What is it?',
        'url' => 'about',
    ],
    [
        'label' => 'Experiences',
        'url' => 'experiences',
        'has_sub' => true,
        'children' => [
            [
                'label' => 'Personal Color Analysis',
                'url' => 'experiences#personal-color-analysis',
                'slug' => 'personal-color-analysis'
            ],
            [
                'label' => 'Signature Experience',
                'url' => 'experiences#signature-experience',
                'slug' => 'signature-experience'
            ],
            [
                'label' => 'Private Styling',
                'url' => 'experiences#private-styling',
                'slug' => 'private-styling'
            ],
            [
                'label' => 'Makeup Masterclass',
                'url' => 'experiences#makeup-masterclass',
                'slug' => 'makeup-masterclass'
            ],
            [
                'label' => 'Custom Lipstick',
                'url' => 'experiences#custom-lipstick',
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
        'icon' => 'assets/media/journey/journey_icon_color.png',
        'seal' => 'assets/media/journey/journey_seal_gold.png',
        'is_gold' => true,
        'alt' => 'Personal Color Analysis'
    ],
    [
        'slug' => 'private-styling',
        'title_line1' => 'PRIVATE',
        'title_line2' => 'STYLING',
        'sublabel' => '',
        'icon' => 'assets/media/journey/journey_icon_styling.png',
        'seal' => 'assets/media/journey/journey_seal_empty.svg',
        'is_gold' => false,
        'alt' => 'Private Styling'
    ],
    [
        'slug' => 'makeup-masterclass',
        'title_line1' => 'MAKEUP',
        'title_line2' => 'MASTERCLASS',
        'sublabel' => '',
        'icon' => 'assets/media/journey/journey_icon_makeup.png',
        'seal' => 'assets/media/journey/journey_seal_empty.svg',
        'is_gold' => false,
        'alt' => 'Makeup Masterclass'
    ],
    [
        'slug' => 'custom-lipstick',
        'title_line1' => 'CUSTOM',
        'title_line2' => 'LIPSTICK',
        'sublabel' => '(LIP BAR EXPERIENCE)',
        'icon' => 'assets/media/journey/journey_icon_lipstick.png',
        'seal' => 'assets/media/journey/journey_seal_empty.svg',
        'is_gold' => false,
        'alt' => 'Custom Lipstick'
    ]
];

// Services Data (5 services)
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
        'description' => '60 minutes that change the way you see colour — and the way you shop, dress and present yourself.',
        'full_text' => 'Through our proprietary 12-season color drape methodology under standardized 5500K daylight lighting, we determine your skin\'s undertone, value, and chroma. You will receive a bespoke seasonal color swatch, personalized makeup shade recommendations, and styling guidelines that highlight your natural beauty.',
        'what_to_expect' => [
            'Professional 12-season color draping under calibrated 5500K daylight to determine your exact undertone, value, and chroma.',
            'A bespoke seasonal color swatch booklet with fabric samples you can take shopping — never second-guess a shade again.',
            'Personalized makeup shade recommendations and styling guidelines tailored to your unique palette.'
        ]
    ],
    'signature-experience' => [
        'slug' => 'signature-experience',
        'title' => 'Signature Experience',
        'short_title' => 'Signature Experience',
        'eyebrow' => '90 minutes',
        'duration' => '90 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 4.200.000',
        'price_num' => 4200000,
        'media_slot' => 'service.signature-experience',
        'aspect' => '4/5',
        'description' => '90 minutes to stop guessing, start feeling confident, and finally understand what color & style works for you',
        'full_text' => 'Our flagship holistic consultation combining our comprehensive Personal Color Analysis with Private Styling Architecture. Understand both your optimal seasonal palette and the silhouette, fabric weight, and accessory proportions engineered for your facial geometry and body architecture.',
        'what_to_expect' => [
            'Complete Personal Color Analysis with precision 12-season draping under standardized 5500K daylight.',
            'Bespoke silhouette, necklines, eyewear, and facial geometry assessment for everyday and formal styling.',
            'Personalized seasonal fabric swatch booklet and comprehensive digital styling dossier.'
        ]
    ],
    'private-styling' => [
        'slug' => 'private-styling',
        'title' => 'Private Styling',
        'short_title' => 'Private Styling',
        'eyebrow' => '60 minutes',
        'duration' => '60 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 3.800.000',
        'price_num' => 3800000,
        'media_slot' => 'service.private-styling',
        'aspect' => '4/5',
        'description' => '60 minutes to turn your personal style into something more intentional, effortless and distinctly you.',
        'full_text' => 'In this private 60-minute session, discover the colours that bring out your natural beauty, the silhouettes that flatter your body, and the details that complement your face — from glasses and accessories to hairstyles and patterns. Stop spending on pieces that never quite feel right, and start making choices that truly work for you.',
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
        'eyebrow' => '60 minutes',
        'duration' => '60 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 3.000.000',
        'price_num' => 3000000,
        'media_slot' => 'service.makeup-masterclass',
        'aspect' => '4/5',
        'description' => '60 minutes to stop copying makeup trends and discover what truly brings out your beauty.',
        'full_text' => 'An intensive hands-on masterclass designed to elevate your personal beauty routine. Master colour theory for makeup, bespoke foundation matching, eyeshadow techniques for your unique eye shape, and flawless daily application tailored to your personal seasonal palette.',
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
        'eyebrow' => '60 minutes',
        'duration' => '60 minutes',
        'location' => 'ASHTA District 8, SCBD, Jakarta',
        'price' => 'IDR 1.200.000',
        'price_num' => 1200000,
        'media_slot' => 'service.custom-lipstick',
        'aspect' => '4/5',
        'description' => '60 minutes to turn your perfect lip colour into a signature shade made exclusively for you.',
        'full_text' => 'Create your signature shade from scratch with our master colorists. From undertone calibration to custom scent, texture, and finish — craft a one-of-a-kind lip formula that complements your natural complexion and skin tone flawlessly.',
        'what_to_expect' => [
            'Live pigment blending at our formulation bar — watch your signature shade come to life in real time.',
            'Choose your finish (satin, matte, velvet, or glossy) and infuse with organic nourishing botanical oils.',
            'Take home your bespoke lipstick in a personalised engraved case — a truly one-of-a-kind keepsake.'
        ]
    ]
];

// 5 Transformation Stories
$stories = [
    'she-spent-12-years' => [
        'slug' => 'she-spent-12-years',
        'title' => 'She Spent 12 Years Feeling Insecure. When Did She Start Feeling Confident?',
        'quote' => '12 years of feeling insecure about my appearance, I never imagined that discovering the right colours could help me see myself differently.',
        'category' => 'real-clients',
        'category_label' => 'Real Clients',
        'subtitle' => 'Insecurity may change the way you see yourself. But so does confidence.',
        'media_slot' => 'story.she-spent-12-years',
        'image_slot' => 'story.she-spent-12-years.image',
        'hero_slot' => 'story.she-spent-12-years.hero',
        'og_slot' => 'story.she-spent-12-years.og',
        'has_content' => true,
        'content' => [
            [
                'heading' => 'Twelve Years of Feeling Insecure',
                'paragraphs' => [
                    'For twelve years, she struggled with insecurity. What started as self-doubt slowly grew into a constant feeling of not being enough.',
                    'Like many women, she often compared herself to others, worried that she wasn\'t pretty enough, successful enough, or confident enough. She overthought every little detail — her appearance, her choices, even the way she carried herself.',
                    'But how do you feel beautiful when you\'re constantly doubting yourself?'
                ]
            ],
            [
                'heading' => 'Beauty Is More Than Perfection',
                'paragraphs' => [
                    'That\'s why she came to Colourist — not just to find her best colours, but to rediscover the confidence she had lost along the way.',
                    'Through professional Personal Colour Analysis, she learned that beauty isn\'t about being perfect, but about finding the colours that make her look and feel like the best version of herself.',
                    'From discovering her most flattering shades to exploring colours that complement her natural features, she experienced a shift. She no longer felt the need to hide or follow what others considered beautiful. Instead, she began embracing what made her unique.',
                    'More importantly, she learned that she didn\'t have to become someone else to feel beautiful.',
                    'Instead of endlessly comparing herself to others, she started appreciating her own beauty and expressing her individuality with confidence.'
                ]
            ],
            [
                'heading' => 'THE TRANSFORMATION — She Chose Confidence',
                'paragraphs' => [
                    'Her journey with Colourist was not just about finding the right colours. It was about finding herself again.',
                    'She rediscovered her confidence, learned to appreciate her reflection, and became more comfortable expressing who she truly was.',
                    'Because women deserve to feel beautiful without having to meet someone else\'s standards.',
                    'You don\'t have to become someone else to feel beautiful. Sometimes, you just need to rediscover what makes you uniquely you.',
                    'At Colourist, everything starts with understanding your colours'
                ]
            ]
        ]
    ],
    'six-years-in-black' => [
        'slug' => 'six-years-in-black',
        'title' => 'Six Years in Black.',
        'quote' => 'After six years of struggling with acne, I thought wearing black was the only way to feel comfortable in my own skin',
        'category' => 'real-clients',
        'category_label' => 'Real Clients',
        'subtitle' => 'A Colourist Client Story',
        'media_slot' => 'story.six-years-in-black',
        'image_slot' => 'story.six-years-in-black.image',
        'hero_slot' => 'story.six-years-in-black.hero',
        'og_slot' => 'story.six-years-in-black.og',
        'has_content' => true,
        'content' => [
            [
                'heading' => 'The story behind the color',
                'paragraphs' => [
                    'For six years, black was the only color she felt comfortable wearing.',
                    'Not because it was her favorite color. Not because it reflected her personality.',
                    'But because she was struggling with acne.',
                    'She was afraid that wearing other colors would make the redness in her skin more noticeable. So she gradually built her wardrobe around black. Black tops, black dresses, black outfits. It became her safe choice.',
                    'Over time, she stopped experimenting with color. She stopped considering what she might look beautiful in. She had found a way to dress without drawing attention to the part of herself she felt most conscious about.',
                    'When she came to Colourist, we discovered something unexpected.',
                    'She was a Spring.',
                    'Her natural coloring was beautifully complemented by warm, light and clear colors: the delicate shades of spring flowers, fresh peach, soft coral, butter yellow, light aqua and fresh greens.',
                    'Colors that were almost the complete opposite of the black she had spent six years wearing.'
                ]
            ],
            [
                'heading' => 'What color theory revealed',
                'paragraphs' => [
                    'Black is an extremely dark, highly contrasting color. When worn close to the face, it can create a strong value contrast against the complexion.',
                    'For someone whose natural coloring is light, warm and clear, this contrast can become visually overpowering. It can draw attention to the difference between the garment and the skin, rather than allowing the natural features to harmonize.',
                    'There is another important consideration: simultaneous contrast.',
                    'The colors surrounding our skin influence how we visually perceive its complexion. A very dark, stark color can make variations in skin tone, shadows and redness appear more pronounced by comparison.',
                    'For her, Spring colors created a different visual effect.'
                ],
                'bullets' => [
                    'Lightness: Colors with more white in them create a gentler transition between the clothing and her complexion.',
                    'Warmth: Peach, warm coral and golden tones harmonize with her warm undertone.',
                    'Clarity: Fresh, clear colors complement the brightness of Spring coloring instead of overwhelming it with excessive darkness.',
                    'Color harmony: Rather than creating a stark contrast, the right colors allow the face to become the focal point.'
                ],
                'after_bullets' => [
                    'Importantly, clothing doesn\'t treat acne or physically remove redness. What it can change is how the complexion is visually perceived.'
                ]
            ],
            [
                'heading' => 'More than finding her colors',
                'paragraphs' => [
                    'The most beautiful part of this transformation wasn\'t simply seeing her in the right colors.',
                    'It was watching her become comfortable wearing colors she had avoided for six years.',
                    'She no longer needed to make black her uniform. She could explore, experiment and express herself through color.',
                    'She came to Colourist thinking she needed to find colors that would help her hide.',
                    'Instead, she discovered colors that helped her feel seen.',
                    'She didn\'t just find her colors. She found a little more of herself.',
                    'Because sometimes, the right color doesn\'t change who you are.',
                    'It reminds you of who you have been all along.'
                ]
            ]
        ]
    ],
    'finding-confidence' => [
        'slug' => 'finding-confidence',
        'title' => 'Finding confidence beyond the workplace',
        'quote' => 'I was tired of being underestimated at work. I wanted the way I presented myself to reflect my capabilities and the confidence I knew I had.',
        'category' => 'real-clients',
        'category_label' => 'Real Clients',
        'subtitle' => 'A Colourist Client Story',
        'media_slot' => 'story.finding-confidence',
        'image_slot' => 'story.finding-confidence.image',
        'hero_slot' => 'story.finding-confidence.hero',
        'og_slot' => 'story.finding-confidence.og',
        'has_content' => true,
        'content' => [
            [
                'heading' => 'The story behind the transformation',
                'paragraphs' => [
                    'She worked hard, took responsibility and always tried to prove her capabilities.',
                    'Yet, in her corporate environment, she often felt underestimated. Her ideas were overlooked, and she sometimes felt that her hard work wasn\'t enough to earn the recognition she deserved.',
                    'It affected her confidence.',
                    'She wanted to feel more assured when entering meetings, expressing her opinions and presenting herself professionally.',
                    'She knew what she was capable of. She just wanted her appearance to reflect that confidence, too.',
                    'That\'s what brought her to Colourist.'
                ]
            ],
            [
                'heading' => 'What colour theory revealed',
                'paragraphs' => [
                    'Through professional Personal Colour Analysis, we examined her natural colouring through comparative colour draping.',
                    'We discovered that she was a True Autumn, complemented by warm temperature, medium-to-deep depth, and muted clarity',
                    'We identified colours that harmonised with her complexion, brought definition to her features and created a more balanced appearance.',
                    'For her professional wardrobe, we focused on finding shades that made her look polished and confident without losing her individuality.',
                    'Because professional doesn\'t have to mean wearing the same colours as everyone else.'
                ]
            ],
            [
                'heading' => 'More than a change in appearance',
                'paragraphs' => [
                    'With her personalised colour palette, she discovered new ways to dress for work.',
                    'Colours she had never considered became part of her wardrobe, helping her feel more confident and intentional about her appearance.',
                    'The transformation wasn\'t about becoming someone else.',
                    'It was about seeing herself differently and feeling more confident in the way she presented herself.',
                    'Her capabilities had always been there. Now, she had another way to express them'
                ]
            ],
            [
                'heading' => 'The person behind the transformation',
                'paragraphs' => [
                    'Behind this story is a woman building her career in the corporate world.',
                    'Like many women, she wanted to be recognised not only for the work she did, but also for the confidence she carried.',
                    'Her journey reminds us that sometimes, transformation begins with something as simple as discovering the colours that make us feel more like ourselves.',
                    'At Colourist, we believe the right colours can do more than complement your appearance. They can help you express your confidence, individuality and personal presence.',
                    '*You don\'t need to become someone else to be taken seriously. You just need to feel confident being yourself.'
                ]
            ]
        ]
    ],
    'rediscovering-herself' => [
        'slug' => 'rediscovering-herself',
        'title' => 'Rediscovering Herself After Motherhood',
        'quote' => 'After becoming a mother, so much of my attention went to my baby. Somewhere along the way, I stopped prioritising myself. I wanted to feel beautiful and confident again, not just as a mother, but as a woman.',
        'category' => 'real-clients',
        'category_label' => 'Real Clients',
        'subtitle' => 'A Colourist Client Story',
        'media_slot' => 'story.rediscovering-herself',
        'image_slot' => 'story.rediscovering-herself.image',
        'hero_slot' => 'story.rediscovering-herself.hero',
        'og_slot' => 'story.rediscovering-herself.og',
        'has_content' => true,
        'content' => [
            [
                'heading' => 'The story behind the transformation',
                'paragraphs' => [
                    'After becoming a mother, so much of her attention went to her baby.',
                    'Like many new mothers, her world revolved around her child — feeding schedules, sleepless nights, and making sure everything was perfect for her little one.',
                    'Somewhere along the way, she stopped prioritising herself.',
                    'She couldn\'t remember the last time she bought something for herself, or even thought about how she wanted to look. Her wardrobe became purely functional — whatever was comfortable and easy to wash.',
                    'It wasn\'t that she didn\'t care. She just didn\'t have the time or energy to think about herself.',
                    'But there was a quiet feeling she couldn\'t ignore: she missed feeling like herself.',
                    'Not just as a mother, but as a woman.'
                ]
            ],
            [
                'heading' => 'What colour analysis revealed',
                'paragraphs' => [
                    'When she came to Colourist, she wasn\'t looking for a dramatic transformation.',
                    'She simply wanted to feel like herself again.',
                    'Through Personal Colour Analysis, we discovered her seasonal palette — the colours that naturally harmonise with her skin, hair, and eyes.',
                    'Many of the colours she had been wearing didn\'t complement her natural colouring. The muted, washed-out tones she had defaulted to were actually making her look more tired than she was.',
                    'Her true colours were brighter, warmer, and more alive than she expected.',
                    'When she saw the right colours against her face, something shifted. She looked more rested. More vibrant. More like herself.'
                ]
            ],
            [
                'heading' => 'More than finding her colours',
                'paragraphs' => [
                    'The most meaningful part of her transformation wasn\'t about the colours themselves.',
                    'It was the moment she looked in the mirror and recognised the woman she had been before motherhood — still there, still beautiful, just waiting to be seen again.',
                    'She didn\'t need to choose between being a mother and being herself.',
                    'She could be both.',
                    'Because sometimes, rediscovering yourself begins with something as simple as rediscovering your colours.',
                    'At Colourist, we believe every woman deserves to feel beautiful — in every chapter of her life.'
                ]
            ]
        ]
    ]
];

// Partner Brands (Tab 5 - 8 Luxury Brands)
$partner_brands = [
    ['name' => 'Ferragamo', 'logo' => 'assets/media/logos/logo_ferragamo.png'],
    ['name' => 'The Langham Jakarta', 'logo' => 'assets/media/partners/the_langham.svg'],
    ['name' => 'Dior', 'logo' => 'assets/media/partners/dior.svg'],
    ['name' => 'Burberry', 'logo' => 'assets/media/partners/burberry.svg'],
    ['name' => 'Miss World', 'logo' => 'assets/media/partners/miss_world.svg'],
    ['name' => 'Miss Indonesia', 'logo' => 'assets/media/partners/miss_indonesia.svg'],
    ['name' => 'Plaza Indonesia', 'logo' => 'assets/media/logos/logo_plaza_indonesia.png'],
    ['name' => 'Laura Mercier', 'logo' => 'assets/media/partners/laura_mercier.svg']
];

// Celebrities Cards
$celebrity_cards = [
    ['name' => 'Celebrity Client 1', 'slot' => 'partners.celebs.1', 'role' => 'Public Figure'],
    ['name' => 'Celebrity Client 2', 'slot' => 'partners.celebs.2', 'role' => 'Artist & Talent'],
    ['name' => 'Celebrity Client 3', 'slot' => 'partners.celebs.3', 'role' => 'Beauty Icon'],
    ['name' => 'Celebrity Client 4', 'slot' => 'partners.celebs.4', 'role' => 'Fashion Editor'],
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

// Testimonials (About)
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
        'quote' => 'The Colourist team delivers an international-grade analysis in the most luxurious atelier setting at ASHTA. The standard in color consulting.',
        'author' => 'Female Daily Editorial',
        'role' => 'Media Partner'
    ]
];
