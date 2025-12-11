@php
    // Get WhatsApp number from settings
    $contactPhone = \App\Models\Setting::get('contact_phone');
    $whatsappNumber = $contactPhone ? preg_replace('/[^0-9+]/', '', $contactPhone) : null;

    $plans = [
        [
            'name' => __('Basic Treatment'),
            'price_single' => '€55',
            'price_monthly' => '€74,45',
            'frequency' => __('1x per month'),
            'color' => '#003868',
            'borderColor' => '#0C5798',
            'buttonText' => __('Get started with Basic'),
            'icon' => '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_425_15641)"><path fill-rule="evenodd" clip-rule="evenodd"d="M14.6697 1.93946C14.1018 0.380531 11.8983 0.380531 11.3304 1.93946L8.75361 9.02339L1.66968 11.6002C0.110756 12.168 0.110756 14.3716 1.66968 14.9395L8.75361 17.5162L11.3304 24.6002C11.8983 26.1591 14.1018 26.1591 14.6697 24.6002L17.2465 17.5162L24.3304 14.9395C25.8893 14.3716 25.8893 12.168 24.3304 11.6002L17.2465 9.02339L14.6697 1.93946Z" fill="#003868" /></g><defs><clipPath id="clip0_425_15641"><rect width="25" height="25" fill="white" transform="translate(0.5 0.769775)" /></clipPath></defs></svg>',
            'features' => [
                'extra' => null,
                'exterior' => [
                    __('Thorough wash of the exterior including rims, bumpers, and windows.'),
                    __('Removes dirt, deposits, and insect residues for a fresh appearance.'),
                    __('Door frames cleaned.')
                ],
                'interior' => [
                    __('Vacuuming mats and seats.')
                ]
            ]
        ],
        [
            'name' => __('Premium Treatment'),
            'price_single' => '€84,95',
            'price_monthly' => '€139,45',
            'frequency' => __('2x per month') . ' <br /> <sub>' . __('every other week') . '</sub>',
            'color' => 'var(--color-brand)',
            'borderColor' => '#63FFFA',
            'buttonText' => __('Get started with Premium'),
            'icon' => '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_706_5175)"> <path fill-rule="evenodd" clip-rule="evenodd" d="M14.6697 3.93946C14.1018 2.38053 11.8983 2.38053 11.3304 3.93946L8.75361 11.0234L1.66968 13.6002C0.110756 14.168 0.110756 16.3716 1.66968 16.9395L8.75361 19.5162L11.3304 26.6002C11.8983 28.1591 14.1018 28.1591 14.6697 26.6002L17.2465 19.5162L24.3304 16.9395C25.8893 16.3716 25.8893 14.168 24.3304 13.6002L17.2465 11.0234L14.6697 3.93946Z" fill="#6ADBD9" /></g><g clip-path="url(#clip1_706_5175)"><path d="M18.0905 5.17814L21.079 4.09028L22.1662 1.10243C22.1911 1.03398 22.2365 0.974858 22.2962 0.933081C22.3558 0.891305 22.4269 0.868896 22.4997 0.868896C22.5726 0.868896 22.6437 0.891305 22.7033 0.933081C22.763 0.974858 22.8084 1.03398 22.8333 1.10243L23.9212 4.091L26.9097 5.17814C26.9782 5.20307 27.0373 5.24844 27.0791 5.30812C27.1209 5.36779 27.1433 5.43887 27.1433 5.51171C27.1433 5.58456 27.1209 5.65563 27.0791 5.71531C27.0373 5.77498 26.9782 5.82036 26.9097 5.84528L23.9205 6.93314L22.8333 9.92171C22.8084 9.99016 22.763 10.0493 22.7033 10.0911C22.6437 10.1328 22.5726 10.1552 22.4997 10.1552C22.4269 10.1552 22.3558 10.1328 22.2962 10.0911C22.2365 10.0493 22.1911 9.99016 22.1662 9.92171L21.0783 6.93243L18.0905 5.84528C18.022 5.82036 17.9629 5.77498 17.9211 5.71531C17.8793 5.65563 17.8569 5.58456 17.8569 5.51171C17.8569 5.43887 17.8793 5.36779 17.9211 5.30812C17.9629 5.24844 18.022 5.20307 18.0905 5.17814Z" fill="#6ADBD9" /></g><defs><clipPath id="clip0_706_5175"><rect width="25" height="25" fill="white" transform="translate(0.5 2.76978)" /></clipPath><clipPath id="clip1_706_5175"><rect width="10" height="10" fill="white" transform="translate(17.5 0.511719)" /></clipPath></defs></svg>',
            'features' => [
                'extra' => __('Everything in the Basic Package, plus:'),
                'exterior' => [
                    __('Exterior cleaning'),
                    __('Door frames cleaned.')
                ],
                'interior' => [
                    __('Vacuuming mats and seats.'),
                    __('Cleaning windows (inside)'),
                    __('Dashboard cleaning'),
                    __('Cleaning plastic parts')
                ]
            ]
        ],
        [
            'name' => __('Full Detail Treatment'),
            'price_single' => '€274,45',
            'price_monthly' => '€289,95',
            'frequency' => __('4x per month') . ' <br /> <sub>' . __('weekly') . '</sub>',
            'color' => '#CBA328',
            'borderColor' => '#E6BA30',
            'buttonText' => __('Get started with Full Detail'),
            'icon' => '<svg width="31" height="34" viewBox="0 0 31 34" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_707_5176)"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.6697 5.93946C15.1018 4.38053 12.8983 4.38053 12.3304 5.93946L9.75361 13.0234L2.66968 15.6002C1.11076 16.168 1.11076 18.3716 2.66968 18.9395L9.75361 21.5162L12.3304 28.6002C12.8983 30.1591 15.1018 30.1591 15.6697 28.6002L18.2465 21.5162L25.3304 18.9395C26.8893 18.3716 26.8893 16.168 25.3304 15.6002L18.2465 13.0234L15.6697 5.93946Z" fill="#CBA328" /></g><g clip-path="url(#clip1_707_5176)"><path d="M19.2089 6.11152L22.7952 4.80609L24.0998 1.22067C24.1297 1.13853 24.1842 1.06758 24.2558 1.01745C24.3274 0.96732 24.4127 0.94043 24.5001 0.94043C24.5875 0.94043 24.6728 0.96732 24.7444 1.01745C24.816 1.06758 24.8705 1.13853 24.9004 1.22067L26.2058 4.80695L29.7921 6.11152C29.8742 6.14143 29.9452 6.19589 29.9953 6.26749C30.0454 6.3391 30.0723 6.4244 30.0723 6.51181C30.0723 6.59922 30.0454 6.68452 29.9953 6.75612C29.9452 6.82773 29.8742 6.88218 29.7921 6.91209L26.2049 8.21752L24.9004 11.8038C24.8705 11.8859 24.816 11.9569 24.7444 12.007C24.6728 12.0572 24.5875 12.084 24.5001 12.084C24.4127 12.084 24.3274 12.0572 24.2558 12.007C24.1842 11.9569 24.1297 11.8859 24.0998 11.8038L22.7944 8.21667L19.2089 6.91209C19.1268 6.88218 19.0559 6.82773 19.0057 6.75612C18.9556 6.68452 18.9287 6.59922 18.9287 6.51181C18.9287 6.4244 18.9556 6.3391 19.0057 6.26749C19.0559 6.19589 19.1268 6.14143 19.2089 6.11152Z" fill="#CBA328" /></g> <g clip-path="url(#clip2_707_5176)"><path d="M0.913471 26.2665L3.00547 25.505L3.76647 23.4135C3.78392 23.3656 3.81568 23.3242 3.85745 23.2949C3.89922 23.2657 3.94898 23.25 3.99997 23.25C4.05096 23.25 4.10072 23.2657 4.14249 23.2949C4.18426 23.3242 4.21602 23.3656 4.23347 23.4135L4.99497 25.5055L7.08697 26.2665C7.13488 26.2839 7.17627 26.3157 7.20551 26.3575C7.23476 26.3992 7.25044 26.449 7.25044 26.5C7.25044 26.551 7.23476 26.6007 7.20551 26.6425C7.17627 26.6843 7.13488 26.716 7.08697 26.7335L4.99447 27.495L4.23347 29.587C4.21602 29.6349 4.18426 29.6763 4.14249 29.7055C4.10072 29.7348 4.05096 29.7504 3.99997 29.7504C3.94898 29.7504 3.89922 29.7348 3.85745 29.7055C3.81568 29.6763 3.78392 29.6349 3.76647 29.587L3.00497 27.4945L0.913471 26.7335C0.865558 26.716 0.824173 26.6843 0.794929 26.6425C0.765686 26.6007 0.75 26.551 0.75 26.5C0.75 26.449 0.765686 26.3992 0.794929 26.3575C0.824173 26.3157 0.865558 26.2839 0.913471 26.2665Z"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         fill="#CBA328" /></g><g clip-path="url(#clip3_707_5176)"> <path d="M18.8545 30.7999L20.6476 30.1472L21.2999 28.3545C21.3149 28.3134 21.3421 28.2779 21.3779 28.2529C21.4137 28.2278 21.4563 28.2144 21.5 28.2144C21.5438 28.2144 21.5864 28.2278 21.6222 28.2529C21.658 28.2779 21.6852 28.3134 21.7002 28.3545L22.3529 30.1476L24.146 30.7999C24.1871 30.8149 24.2226 30.8421 24.2477 30.8779C24.2727 30.9137 24.2862 30.9563 24.2862 31C24.2862 31.0438 24.2727 31.0864 24.2477 31.1222C24.2226 31.158 24.1871 31.1852 24.146 31.2002L22.3525 31.8529L21.7002 33.646C21.6852 33.6871 21.658 33.7226 21.6222 33.7477C21.5864 33.7727 21.5438 33.7862 21.5 33.7862C21.4563 33.7862 21.4137 33.7727 21.3779 33.7477C21.3421 33.7226 21.3149 33.6871 21.2999 33.646L20.6472 31.8525L18.8545 31.2002C18.8134 31.1852 18.7779 31.158 18.7529 31.1222C18.7278 31.0864 18.7144 31.0438 18.7144 31C18.7144 30.9563 18.7278 30.9137 18.7529 30.8779C18.7779 30.8421 18.8134 30.8149 18.8545 30.7999Z" fill="#CBA328" /></g> <defs><clipPath id="clip0_707_5176"><rect width="25" height="25" fill="white" transform="translate(1.5 4.76978)" /></clipPath><clipPath id="clip1_707_5176"> <rect width="12" height="12" fill="white" transform="translate(18.5 0.511719)" /></clipPath><clipPath id="clip2_707_5176"><rect width="7" height="7" fill="white" transform="translate(0.5 23)" /></clipPath><clipPath id="clip3_707_5176"><rect width="6" height="6" fill="white" transform="translate(18.5 28)" /></clipPath></defs></svg>',
            'features' => [
                'extra' => __('Everything in the Premium Package, plus:'),
                'exterior' => [
                    __('Exterior cleaning'),
                    __('Door frames cleaned.')
                ],
                'interior' => [
                    __('Vacuuming mats and seats.'),
                    __('Cleaning windows (inside)'),
                    __('Dashboard cleaning'),
                    __('Cleaning plastic parts')
                ]
            ]
        ]
    ];

    $extraOptions = [
        [
            'title' => __('Undercarriage cleaning – €20'),
            'description' => __('Removes dirt and deposits from the underside of the car')
        ],
        [
            'title' => __('Paint sealing (2–3 months protection) – €50'),
            'description' => __('Protective paint layer against dirt and UV')
        ],
        [
            'title' => __('Engine bay cleaning – €20'),
            'description' => __('Cleaning and care of the engine compartment')
        ],
        [
            'title' => __('Hybrid Ceramic Coating (5–6 months) – €80'),
            'description' => __('Premium coating for long-lasting shine and protection')
        ],
        [
            'title' => __('Leather or fabric upholstery cleaning – €60'),
            'description' => __('Deep cleaning of seats and upholstery')
        ],
    ];

@endphp



<section class="bg-gray-900 py-20 sm:py-32 relative" id="pricing">
    <div class="container">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-[60px]">
            <div class="max-w-[664px]">
                <div
                    class="py-2 px-4 inline-flex items-center gap-2 mb-4 bg-transparent rounded-[60px] text-[var(--color-brand)] border border-[var(--color-brand)]">

                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.4375 3.97656C2.4375 3.42955 2.6548 2.90495 3.04159 2.51815C3.42839 2.13136 3.95299 1.91406 4.5 1.91406H12C12.547 1.91406 13.0716 2.13136 13.4584 2.51815C13.8452 2.90495 14.0625 3.42955 14.0625 3.97656V8.10156C14.0625 8.25075 14.0032 8.39382 13.8977 8.49931C13.7923 8.6048 13.6492 8.66406 13.5 8.66406C13.3508 8.66406 13.2077 8.6048 13.1023 8.49931C12.9968 8.39382 12.9375 8.25075 12.9375 8.10156V3.97656C12.9375 3.45906 12.5175 3.03906 12 3.03906H4.5C3.9825 3.03906 3.5625 3.45906 3.5625 3.97656V14.4766C3.5625 14.9941 3.9825 15.4141 4.5 15.4141H10.125C10.2742 15.4141 10.4173 15.4733 10.5227 15.5788C10.6282 15.6843 10.6875 15.8274 10.6875 15.9766C10.6875 16.1257 10.6282 16.2688 10.5227 16.3743C10.4173 16.4798 10.2742 16.5391 10.125 16.5391H4.5C3.95299 16.5391 3.42839 16.3218 3.04159 15.935C2.6548 15.5482 2.4375 15.0236 2.4375 14.4766V3.97656Z"
                            fill="#6ADBD9" />
                        <path
                            d="M13.5 10.1641C13.6492 10.1641 13.7923 10.2233 13.8977 10.3288C14.0032 10.4343 14.0625 10.5774 14.0625 10.7266V11.0401C14.8327 11.0686 15.5625 11.6363 15.5625 12.4763C15.5625 12.6255 15.5032 12.7686 15.3977 12.8741C15.2923 12.9796 15.1492 13.0388 15 13.0388C14.8508 13.0388 14.7077 12.9796 14.6023 12.8741C14.4968 12.7686 14.4375 12.6255 14.4375 12.4763C14.4375 12.3698 14.316 12.1643 14.0017 12.1643H12.8722C12.7826 12.1619 12.6951 12.1917 12.6255 12.2483C12.5745 12.2933 12.5625 12.3361 12.5625 12.3638C12.5614 12.4015 12.5659 12.4392 12.576 12.4756C12.5859 12.4829 12.5965 12.4894 12.6075 12.4951C12.6375 12.5101 12.6825 12.5281 12.7522 12.5491L14.5657 13.0748C14.7727 13.1363 15.0382 13.2383 15.2467 13.4596C15.4717 13.6996 15.5625 14.0071 15.5625 14.3393C15.5625 15.1396 14.8455 15.6638 14.1277 15.6638H14.0625V15.9766C14.0625 16.1257 14.0032 16.2688 13.8977 16.3743C13.7923 16.4798 13.6492 16.5391 13.5 16.5391C13.3508 16.5391 13.2077 16.4798 13.1023 16.3743C12.9968 16.2688 12.9375 16.1257 12.9375 15.9766V15.6631C12.1672 15.6346 11.4375 15.0668 11.4375 14.2268C11.4375 14.0776 11.4968 13.9346 11.6023 13.8291C11.7077 13.7236 11.8508 13.6643 12 13.6643C12.1492 13.6643 12.2923 13.7236 12.3977 13.8291C12.5032 13.9346 12.5625 14.0776 12.5625 14.2268C12.5625 14.3333 12.684 14.5388 12.9982 14.5388H14.1277C14.2174 14.5412 14.3049 14.5114 14.3745 14.4548C14.4255 14.4098 14.4375 14.3671 14.4375 14.3393C14.4386 14.3016 14.4341 14.2639 14.424 14.2276C14.4141 14.2202 14.4035 14.2137 14.3925 14.2081C14.3625 14.1931 14.3175 14.1751 14.2477 14.1541L12.4342 13.6283C12.2272 13.5668 11.9617 13.4648 11.7532 13.2436C11.5282 13.0036 11.4375 12.6961 11.4375 12.3638C11.4375 11.5636 12.1545 11.0393 12.8722 11.0393H12.9375V10.7266C12.9375 10.5774 12.9968 10.4343 13.1023 10.3288C13.2077 10.2233 13.3508 10.1641 13.5 10.1641ZM4.6875 8.47656C4.6875 8.32738 4.74676 8.1843 4.85225 8.07882C4.95774 7.97333 5.10082 7.91406 5.25 7.91406H5.625C5.77418 7.91406 5.91726 7.97333 6.02275 8.07882C6.12824 8.1843 6.1875 8.32738 6.1875 8.47656C6.1875 8.62575 6.12824 8.76882 6.02275 8.87431C5.91726 8.9798 5.77418 9.03906 5.625 9.03906H5.25C5.10082 9.03906 4.95774 8.9798 4.85225 8.87431C4.74676 8.76882 4.6875 8.62575 4.6875 8.47656ZM6.9375 8.47656C6.9375 8.32738 6.99676 8.1843 7.10225 8.07882C7.20774 7.97333 7.35082 7.91406 7.5 7.91406H11.25C11.3992 7.91406 11.5423 7.97333 11.6477 8.07882C11.7532 8.1843 11.8125 8.32738 11.8125 8.47656C11.8125 8.62575 11.7532 8.76882 11.6477 8.87431C11.5423 8.9798 11.3992 9.03906 11.25 9.03906H7.5C7.35082 9.03906 7.20774 8.9798 7.10225 8.87431C6.99676 8.76882 6.9375 8.62575 6.9375 8.47656ZM4.6875 10.7266C4.6875 10.5774 4.74676 10.4343 4.85225 10.3288C4.95774 10.2233 5.10082 10.1641 5.25 10.1641H5.625C5.77418 10.1641 5.91726 10.2233 6.02275 10.3288C6.12824 10.4343 6.1875 10.5774 6.1875 10.7266C6.1875 10.8757 6.12824 11.0188 6.02275 11.1243C5.91726 11.2298 5.77418 11.2891 5.625 11.2891H5.25C5.10082 11.2891 4.95774 11.2298 4.85225 11.1243C4.74676 11.0188 4.6875 10.8757 4.6875 10.7266ZM6.9375 10.7266C6.9375 10.5774 6.99676 10.4343 7.10225 10.3288C7.20774 10.2233 7.35082 10.1641 7.5 10.1641H10.125C10.2742 10.1641 10.4173 10.2233 10.5227 10.3288C10.6282 10.4343 10.6875 10.5774 10.6875 10.7266C10.6875 10.8757 10.6282 11.0188 10.5227 11.1243C10.4173 11.2298 10.2742 11.2891 10.125 11.2891H7.5C7.35082 11.2891 7.20774 11.2298 7.10225 11.1243C6.99676 11.0188 6.9375 10.8757 6.9375 10.7266ZM4.6875 12.9766C4.6875 12.8274 4.74676 12.6843 4.85225 12.5788C4.95774 12.4733 5.10082 12.4141 5.25 12.4141H5.625C5.77418 12.4141 5.91726 12.4733 6.02275 12.5788C6.12824 12.6843 6.1875 12.8274 6.1875 12.9766C6.1875 13.1257 6.12824 13.2688 6.02275 13.3743C5.91726 13.4798 5.77418 13.5391 5.625 13.5391H5.25C5.10082 13.5391 4.95774 13.4798 4.85225 13.3743C4.74676 13.2688 4.6875 13.1257 4.6875 12.9766ZM6.9375 12.9766C6.9375 12.8274 6.99676 12.6843 7.10225 12.5788C7.20774 12.4733 7.35082 12.4141 7.5 12.4141H9C9.14918 12.4141 9.29226 12.4733 9.39775 12.5788C9.50324 12.6843 9.5625 12.8274 9.5625 12.9766C9.5625 13.1257 9.50324 13.2688 9.39775 13.3743C9.29226 13.4798 9.14918 13.5391 9 13.5391H7.5C7.35082 13.5391 7.20774 13.4798 7.10225 13.3743C6.99676 13.2688 6.9375 13.1257 6.9375 12.9766ZM4.5 5.10156C4.5 4.75206 4.5 4.57731 4.557 4.43931C4.63328 4.25591 4.7792 4.11026 4.96275 4.03431C5.10075 3.97656 5.2755 3.97656 5.625 3.97656H10.875C11.2245 3.97656 11.3992 3.97656 11.5372 4.03356C11.7207 4.10984 11.8663 4.25577 11.9422 4.43931C12 4.57731 12 4.75206 12 5.10156C12 5.45106 12 5.62581 11.943 5.76381C11.8667 5.94722 11.7208 6.09287 11.5372 6.16881C11.3992 6.22656 11.2245 6.22656 10.875 6.22656H5.625C5.2755 6.22656 5.10075 6.22656 4.96275 6.16956C4.77935 6.09328 4.63369 5.94736 4.55775 5.76381C4.5 5.62581 4.5 5.45106 4.5 5.10156Z"
                            fill="#6ADBD9" />
                    </svg>

                    <h3 class="text-[11px] font-semibold uppercase font-poppins">{{ __('SUPER PLANS & subscriptions') }}
                    </h3>
                </div>
                <h2 class="text-[34px] font-extrabold leading-[1.2] tracking-[0.02px] text-white mb-4">
                    {{ __('Our Pricelist, Exceptional value') }}
                </h2>
                <p class="text-[16px] text-white leading-[1.5]">
                    {{ __('We believe premium car care should come with clear and honest pricing.') }} <br />
                    {{ __('No hidden fees') }}
                </p>
            </div>
            <div class="max-w-[413px] p-5 rounded-[12px] bg-[#2b2b2b]">
                <div class="text-[20px] font-semibold text-white tracking-[0.05px] mb-6 leading-[1.5]">
                    {{ __('Not sure which plan fits best?') }}
                    {{ __('Let’s talk!') }}
                </div>
                <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank"
                    class="bg-[var(--color-brand)] text-white text-base font-semibold py-2 px-4 rounded-[60px] transition-all duration-300 ease-in-out inline-flex items-center gap-2 min-w-[164px] h-[45px] tracking-[-0.08px]">

                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.1431 6.8826L3.12435 6.8287C2.70256 5.62035 2.34326 3.96912 2.34326 2.97714C2.34326 2.54754 2.69475 2.19604 3.12435 2.19604H5.46763C5.88195 2.19604 6.27929 2.36063 6.57226 2.6536C6.86523 2.94656 7.02981 3.34391 7.02981 3.75823V5.32041C7.02981 5.73473 6.86523 6.13208 6.57226 6.42504C6.27929 6.71801 5.88195 6.8826 5.46763 6.8826H4.81386C5.44449 8.43617 6.38028 9.84749 7.56587 11.0331C8.75147 12.2187 10.1628 13.1545 11.7164 13.7851V13.1313C11.7164 12.717 11.881 12.3197 12.1739 12.0267C12.4669 11.7337 12.8642 11.5692 13.2786 11.5692H14.8407C15.2551 11.5692 15.6524 11.7337 15.9454 12.0267C16.2383 12.3197 16.4029 12.717 16.4029 13.1313V15.4746C16.4029 15.8261 15.9733 16.2557 15.6218 16.2557C14.2744 16.2557 12.9349 15.8995 11.7164 15.4746C7.72186 14.0437 4.55531 10.8771 3.1431 6.8826Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.1431 6.8826L3.12435 6.8287C2.70256 5.62035 2.34326 3.96912 2.34326 2.97714C2.34326 2.54754 2.69475 2.19604 3.12435 2.19604H5.46763C5.88195 2.19604 6.27929 2.36063 6.57226 2.6536C6.86523 2.94656 7.02981 3.34391 7.02981 3.75823V5.32041C7.02981 5.73473 6.86523 6.13208 6.57226 6.42504C6.27929 6.71801 5.88195 6.8826 5.46763 6.8826H4.81386C5.44449 8.43617 6.38028 9.84749 7.56587 11.0331C8.75147 12.2187 10.1628 13.1545 11.7164 13.7851V13.1313C11.7164 12.717 11.881 12.3197 12.1739 12.0267C12.4669 11.7337 12.8642 11.5692 13.2786 11.5692H14.8407C15.2551 11.5692 15.6524 11.7337 15.9454 12.0267C16.2383 12.3197 16.4029 12.717 16.4029 13.1313V15.4746C16.4029 15.8261 15.9733 16.2557 15.6218 16.2557C14.2744 16.2557 12.9349 15.8995 11.7164 15.4746C7.72186 14.0437 4.55531 10.8771 3.1431 6.8826Z"
                            fill="white" />
                    </svg>

                    <span>{{ $whatsappNumber }}</span>
                </a>
            </div>
        </div>
        <div class="flex items-center flex-wrap gap-6">
            <div class="flex items-center border border-[#5E5E5E] rounded-[60px] p-1.5">
                <button data-type="single"
                    class="pricing-opt bg-white text-[#454852] text-base font-bold rounded-[60px] p-2.5 text-center uppercase inline-block cursor-pointer min-w-[164px] ">
                    {{ __('Single') }}
                </button>
                <button data-type="monthly"
                    class="pricing-opt text-[#8D8D8D] text-base font-bold rounded-[60px] p-2.5 text-center uppercase inline-block cursor-pointer min-w-[164px]">
                    {{ __('Monthly') }}
                </button>
            </div>

            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-2 w-full sm:w-auto">

                <svg width="75" height="51" viewBox="0 0 75 51" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="rotate-90 md:rotate-none">
                    <path
                        d="M8.02222 41.4088C8.3385 41.2083 8.41978 40.84 8.24493 40.5642C7.63328 39.5992 6.6079 38.0621 5.74197 36.7817C5.30935 36.1421 4.91768 35.5677 4.63851 35.1634C4.49874 34.9609 4.38734 34.8027 4.31422 34.7C4.27701 34.6477 4.25271 34.6131 4.23935 34.5955C4.24199 34.5986 4.24572 34.6026 4.24982 34.6069C4.2534 34.6106 4.26932 34.6278 4.29324 34.6462C4.30356 34.6542 4.3343 34.6779 4.37946 34.6974C4.40281 34.7075 4.55904 34.775 4.73238 34.682C4.74859 34.6733 4.76342 34.663 4.77726 34.6532C4.66975 34.4992 4.5926 34.3949 4.55835 34.3502L4.19606 34.5422C3.87411 34.0236 3.66439 33.6657 3.54727 33.4056C3.43157 33.1486 3.36104 32.8922 3.46083 32.6285L3.47111 32.6013L3.48527 32.5757C3.63169 32.3104 3.87122 32.0994 4.2945 31.7969C4.72491 31.4893 5.40768 31.0462 6.50458 30.3306L6.50774 30.3281C9.33824 28.5205 11.4535 27.1268 14.2518 24.8946C14.5558 24.6372 14.5465 24.2493 14.3802 24.0689L14.3743 24.063L14.3689 24.0558C14.1115 23.751 13.723 23.7591 13.5424 23.9256L13.5297 23.9378L13.5152 23.9485L12.5029 24.7235C10.2088 26.464 8.34316 27.7656 5.88171 29.2659L5.8826 29.2655C4.51329 30.1061 3.75204 30.5797 3.27534 30.9438C2.82372 31.2887 2.65079 31.5168 2.46217 31.8732L2.45175 31.8929L2.35373 32.0677C2.14935 32.4701 2.10113 32.8368 2.18421 33.2493C2.28425 33.7458 2.58051 34.3352 3.11576 35.14C3.12485 35.1517 3.13494 35.1669 3.14471 35.1805C3.1658 35.2097 3.19696 35.2534 3.23566 35.3087C3.31361 35.4201 3.42791 35.5848 3.56885 35.7895C3.85115 36.1996 4.24381 36.7733 4.6753 37.4098C5.53718 38.681 6.55962 40.2093 7.17852 41.1857C7.37888 41.5018 7.74641 41.5833 8.02222 41.4088ZM3.03055 35.7095C3.1155 35.6245 3.1889 35.4544 3.19529 35.388C3.19419 35.3534 3.18643 35.2991 3.18177 35.2794C3.1733 35.2474 3.16296 35.2234 3.16026 35.2174L2.80879 35.412C2.84282 35.4589 2.91553 35.5638 3.01986 35.7143C3.0234 35.7126 3.02716 35.7113 3.03055 35.7095Z"
                        fill="#6ADBD9" stroke="#6ADBD9" stroke-width="0.8125" />
                    <path
                        d="M45.1053 33.7188C54.5885 29.5922 62.0254 21.262 68.2212 7.83068C68.3616 7.44942 68.2004 7.09906 67.9278 6.99571C67.5435 6.85015 67.1893 7.01185 67.0851 7.28623L67.0735 7.31286L66.506 8.52153C60.5994 20.8634 53.5811 28.6646 44.5699 32.5794C35.2815 36.6146 23.9536 36.4861 9.70248 33.0867C9.31185 33.0232 8.9821 33.2552 8.90418 33.5211C8.84906 33.9113 9.08774 34.2385 9.35566 34.3074L9.35517 34.3087C23.9903 37.8035 35.6116 37.85 45.1053 33.7188Z"
                        fill="#6ADBD9" stroke="#6ADBD9" stroke-width="0.8125" />
                </svg>
                <div class="text-[18px] text-[var(--color-brand)] tracking-[0.8px] font-cursive">{{ __('Save') }}
                    <span class="text-[22px] text-white">{{ __('25%') }}</span> {{ __('on') }} <br />
                    {{ __('Monthly Subscriptions') }}
                </div>
            </div>
        </div>
        <div class="pricing-table mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($plans as $plan)
                    <div class="pricing-card flex flex-col justify-between p-[30px] rounded-[20px] text-white"
                        style="background-color: {{ $plan['color'] }}" data-plan-name="{{ $plan['name'] }}"
                        data-plan-price-single="{{ $plan['price_single'] }}"
                        data-plan-price-monthly="{{ $plan['price_monthly'] }}">
                        {{-- Header --}}
                        <div class="pricing-card-header flex flex-col gap-4 pb-6 border-b"
                            style="border-color: {{ $plan['borderColor'] }}">
                            <div class="w-[44px] h-[44px] bg-white rounded-[16px] flex justify-center items-center">
                                {!! $plan['icon'] !!}
                            </div>
                            <h3 class="text-[22px] font-semibold">{{ $plan['name'] }}</h3>
                            <div class="flex items-baseline gap-1">
                                <span class="price text-[36px] font-extrabold" data-single="{{ $plan['price_single'] }}"
                                    data-monthly="{{ $plan['price_monthly'] }}">
                                    {{ $plan['price_single']}}
                                </span>
                                /<span class="text-[24px] font-medium leading-3">{!! $plan['frequency'] !!}

                                </span>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="pricing-card-body flex-1">
                            <div class="pricing-card-features py-4 space-y-4 border-b"
                                style="border-color: {{ $plan['borderColor'] }}">
                                @if ($plan['features']['extra'])
                                    <div class="text-white text-lg font-bold pb-4 mb-4 border-b"
                                        style="border-color: {{ $plan['borderColor'] }}">
                                        {{ $plan['features']['extra'] }}
                                    </div>
                                @endif

                                <div class="text-white text-lg font-bold mb-4">{{ __('Exterior Dealing') }}</div>
                                @foreach ($plan['features']['exterior'] as $feature)
                                    <div class="flex gap-3">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0">
                                            <rect x="0.5" y="1.05347" width="19" height="19" rx="6.16667" stroke="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.6237 7.0549L8.05424 15.6243L3.37646 10.9466L4.9487 9.37433L8.05424 12.4799L15.0514 5.48267L16.6237 7.0549Z"
                                                fill="white" />
                                        </svg>
                                        <span class="text-[15px] font-medium">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="pricing-card-features py-4 space-y-4">
                                <div class="text-white text-lg font-bold mb-4">{{ __('Interior') }}</div>
                                @foreach ($plan['features']['interior'] as $feature)
                                    <div class="flex gap-3">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0">
                                            <rect x="0.5" y="1.05347" width="19" height="19" rx="6.16667" stroke="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.6237 7.0549L8.05424 15.6243L3.37646 10.9466L4.9487 9.37433L8.05424 12.4799L15.0514 5.48267L16.6237 7.0549Z"
                                                fill="white" />
                                        </svg>
                                        <span class="text-[15px] font-medium">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="pricing-card-footer mt-4">
                            <button
                                class="pricing-plan-btn text-[#230C0F] text-base font-bold rounded-[60px] px-5 py-3.5 text-center flex items-center justify-center gap-3 cursor-pointer w-full bg-white"
                                data-plan-name="{{ $plan['name'] }}" data-plan-price-single="{{ $plan['price_single'] }}"
                                data-plan-price-monthly="{{ $plan['price_monthly'] }}">
                                <span>{{ $plan['buttonText'] }}</span>
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.5 11.0535L6.5 6.05347L1.5 1.05347" stroke="#230C0F" stroke-width="1.6"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="extra-options border-15 border-[#272727] rounded-[20px] mt-6 p-[20px] md:p-[30px]">
            <div class="flex flex-wrap">
                <div
                    class="flex flex-col gap-3 md:pr-[45px] border-b md:border-b-0 md:border-r border-[#424242] w-full md:w-[200px] flex-shrink-0 pb-4 md:pb-0 mb-5 md:mb-0">
                    <svg width="44" height="45" viewBox="0 0 44 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="0.553467" width="44" height="44" rx="16" fill="#6ADBD9" />
                        <path
                            d="M20.125 20.6785V8.49097H23.875V20.6785H36.0625V24.4285H23.875V36.616H20.125V24.4285H7.9375V20.6785H20.125Z"
                            fill="white" />
                    </svg>
                    <div class="text-[22px] text-white font-medium">{{ __('Extra options') }}</div>
                </div>
                <div class="flex flex-wrap md:pl-[45px] gap-x-[30px] gap-y-4 w-full md:w-[calc(100%-200px)]">
                    @foreach ($extraOptions as $option)
                        <div class="flex gap-3 w-full md:w-[calc(50%-15px)] text-white">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="flex-shrink-0">
                                <rect x="0.5" y="1.05347" width="19" height="19" rx="6.16667" stroke="var(--color-brand)" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M16.6237 7.0549L8.05424 15.6243L3.37646 10.9466L4.9487 9.37433L8.05424 12.4799L15.0514 5.48267L16.6237 7.0549Z"
                                    fill="var(--color-brand)" />
                            </svg>
                            <div class="flex flex-col gap-1">
                                <div class="text-[16px] font-bold text-white">{{ $option['title'] }}</div>
                                <span
                                    class="text-[14px] font-medium text-white font-sans">{{ $option['description'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

{{-- Booking Form Modal --}}
<div class="modal px-5" id="pricingModal">
    <div class="modal-content relative h-[calc(100vh-50px)] w-full max-w-[751px]">
        <form id="pricingBookingForm" class="h-full" method="POST"
            action="{{ route('booking.store', ['locale' => app()->getLocale()]) }}">
            @csrf

            <!-- Close Button -->
            <div class="close-modal-2 bg-white w-[28px] h-[28px] rounded-full flex items-center justify-center absolute top-[-14px] right-[-14px] cursor-pointer"
                onClick="closeModal()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#EA6216"
                        d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z" />
                    <path fill="#EA6216"
                        d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l-.001-.001-3.855 3.855-3.855-3.855A1.091 1.091 0 0 0 6.6 8.145l-.001-.001 3.855 3.855-3.855 3.855a1.091 1.091 0 1 0 1.541 1.542l.001-.001 3.855-3.855 3.855 3.855a1.091 1.091 0 1 0 1.542-1.541l-.001-.001z" />
                </svg>
            </div>

            <div class="h-full flex flex-col justify-between overflow-y-auto pr-5 md:pr-[30px]">

                <!-- Success/Error Message -->
                <div id="formMessage" class="hidden mb-4 p-4 rounded-lg"></div>

                <!-- Header -->
                <div class="flex items-center gap-4 px-5 py-5 border border-[#C8CEDD] rounded-[16px]">
                    <div
                        class="w-[50px] h-[50px] rounded-[16px] bg-[#E7F1FF] flex items-center justify-center flex-shrink-0">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.37473 0.8125C7.62337 0.8125 7.86182 0.911272 8.03764 1.08709C8.21345 1.2629 8.31223 1.50136 8.31223 1.75V2.06625C8.74139 2.06292 9.20764 2.06167 9.71098 2.0625H16.2885C16.7918 2.0625 17.2581 2.06375 17.6872 2.06625V1.75C17.6872 1.50136 17.786 1.2629 17.9618 1.08709C18.1376 0.911272 18.3761 0.8125 18.6247 0.8125C18.8734 0.8125 19.1118 0.911272 19.2876 1.08709C19.4635 1.2629 19.5622 1.50136 19.5622 1.75V2.12625C19.5772 2.12625 19.5918 2.1275 19.606 2.13C20.4935 2.1975 21.2422 2.34125 21.926 2.67C23.0316 3.1961 23.9428 4.05791 24.5297 5.1325C24.8885 5.7975 25.0422 6.52375 25.116 7.37375C25.1872 8.20125 25.1872 9.22625 25.1872 10.5112V16.7375C25.1872 18.0238 25.1872 19.05 25.116 19.8762C25.041 20.7262 24.8885 21.4525 24.5297 22.1162C23.943 23.1913 23.0318 24.0536 21.926 24.58C21.2422 24.9088 20.4935 25.0525 19.606 25.12C18.736 25.1875 17.656 25.1875 16.2885 25.1875H9.71223C8.34473 25.1875 7.26473 25.1875 6.39473 25.12C5.50723 25.0512 4.75848 24.9088 4.07473 24.58C2.96911 24.0539 2.05787 23.1921 1.47098 22.1175C1.11223 21.4525 0.958477 20.7262 0.884727 19.8762C0.813477 19.0487 0.813477 18.0238 0.813477 16.7388V10.5125C0.813477 9.22625 0.813477 8.2 0.884727 7.37375C0.959727 6.52375 1.11223 5.7975 1.47098 5.13375C2.05766 4.0587 2.96892 3.19643 4.07473 2.67C4.75848 2.34125 5.50723 2.1975 6.39473 2.13L6.43723 2.125V1.75C6.43723 1.50136 6.536 1.2629 6.71181 1.08709C6.88763 0.911272 7.12609 0.8125 7.37473 0.8125ZM6.43723 4.0075C5.71598 4.07 5.25473 4.1825 4.88723 4.36C4.13774 4.71428 3.51919 5.29609 3.11973 6.0225C2.97723 6.2875 2.87473 6.605 2.80723 7.0625H23.1935C23.1247 6.605 23.0222 6.2875 22.8797 6.02375C22.4808 5.29706 21.8627 4.71483 21.1135 4.36C20.7447 4.1825 20.2835 4.07 19.5622 4.0075V4.25C19.5622 4.49864 19.4635 4.7371 19.2876 4.91291C19.1118 5.08873 18.8734 5.1875 18.6247 5.1875C18.3761 5.1875 18.1376 5.08873 17.9618 4.91291C17.786 4.7371 17.6872 4.49864 17.6872 4.25V3.94125C17.2614 3.93792 16.7822 3.93667 16.2497 3.9375H9.74973C9.21723 3.9375 8.73806 3.93875 8.31223 3.94125V4.25C8.31223 4.49864 8.21345 4.7371 8.03764 4.91291C7.86182 5.08873 7.62337 5.1875 7.37473 5.1875C7.12609 5.1875 6.88763 5.08873 6.71181 4.91291C6.536 4.7371 6.43723 4.49864 6.43723 4.25V4.0075Z"
                                fill="var(--color-brand)" />
                        </svg>

                    </div>
                    <div class="space-y-2">
                        <h4 class="text-[24px] font-bold text-[var(--color-heading)] leading-[1.4]">
                            {{ __('Book your service') }}
                        </h4>
                        <p class="text-[16px] font-medium text-[var(--color-text)] leading-[1.4] font-sans">
                            {{ __('For your') }}
                            {{ __('service, share your details,') }}
                            {{ __('and we\'ll take care of the rest.') }}
                        </p>
                    </div>
                </div>

                <!-- Form Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('First Name') }}</label>
                        <input type="text" name="first_name" id="first_name" required
                            class="block w-full rounded-lg border border-gray-300 h-12 focus:outline-none focus:ring-[var(--color-brand)] focus:border-[var(--color-brand)] px-4"
                            placeholder="{{ __('Enter first name') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Last Name') }}</label>
                        <input type="text" name="last_name" id="last_name" required
                            class="block w-full rounded-lg border border-gray-300 h-12 focus:outline-none focus:ring-[var(--color-brand)] focus:border-[var(--color-brand)] px-4"
                            placeholder="{{ __('Enter last name') }}">
                    </div>


                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Address') }}</label>
                        <textarea name="address" id="address" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            rows="3" placeholder="{{ __('Your address') }}"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Number of Cars') }}</label>
                        <input type="number" name="number_of_cars" id="number_of_cars" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="{{ __('Enter number of cars') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Licence Plate') }}</label>
                        <input type="text" name="licence_plate" id="licence_plate" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="{{ __('Enter licence plate') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('WhatsApp Number') }}</label>
                        <input type="text" name="whatsapp" id="whatsapp" required
                            class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]"
                            placeholder="{{ __('Enter WhatsApp number') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Package Choice') }}</label>
                        <select id="packageSelect" name="package" required
                            class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]">
                            <option value="">{{ __('Select a package') }}</option>
                            <option value="Basic Treatment - €79,95">{{ __('Basic Treatment - €79,95') }}</option>
                            <option value="Basic Treatment Monthly - €74,45">
                                {{ __('Basic Treatment Monthly - €74,45') }}
                            </option>
                            <option value="Premium Treatment - €149,95">{{ __('Premium Treatment - €149,95') }}</option>
                            <option value="Premium Treatment Monthly - €144,45">
                                {{ __('Premium Treatment Monthly - €144,45') }}
                            </option>
                            <option value="Full Detail Treatment - €289,95">{{ __('Full Detail Treatment - €289,95') }}
                            </option>
                            <option value="Full Detail Treatment Monthly - €249,45">
                                {{ __('Full Detail Treatment Monthly -') }}
                                €249,45
                            </option>
                        </select>
                        <input type="hidden" name="package_name" id="package_name">
                        <input type="hidden" name="package_price" id="package_price">
                    </div>

                    <div>
                        <label
                            class="block text-base font-medium text-[var(--color-text)] mb-2">{{ __('Preferred Date') }}</label>
                        <input type="date" name="preferred_date" id="preferred_date" required
                            class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)]">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button"
                        class="inline-flex justify-center px-4 py-3 text-base font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)] cursor-pointer"
                        onclick="closeModal()">{{ __('Cancel') }}</button>

                    <button type="submit" id="bookNowBtn"
                        class="inline-flex justify-center px-4 py-3 text-base font-medium text-white bg-[var(--color-brand)] border border-transparent rounded-md shadow-sm hover:bg-[var(--color-brand)] focus:outline-none focus:ring-[var(--color-brand)] focus:ring-offset-2 focus:border-[var(--color-brand)] cursor-pointer">
                        <span class="btn-text">{{ __('Book Now') }}</span>
                        <span class="btn-spinner hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>



<script>
    function openModal(planName = null, priceSingle = null, priceMonthly = null) {
        const modal = document.querySelector('#pricingModal');
        const packageSelect = document.querySelector('#packageSelect');
        console.log({ packageSelect })
        // If plan information is provided, pre-select the package
        if (planName && packageSelect) {
            console.log({ planName, packageSelect })
            // Get current pricing mode (single or monthly)
            const isPricingMonthly = document.querySelector('.pricing-opt.bg-white')?.dataset.type === 'monthly';
            const price = isPricingMonthly ? priceMonthly : priceSingle;
            const packageValue = `${planName} - ${price}`;

            // Try to find and select the matching option
            const options = packageSelect.querySelectorAll('option');
            let optionFound = false;

            options.forEach(option => {
                if (option.value.includes(planName)) {
                    if (isPricingMonthly && option.value.toLowerCase().includes('monthly')) {
                        packageSelect.value = option.value;
                        optionFound = true;
                    } else if (!isPricingMonthly && !option.value.toLowerCase().includes('monthly')) {
                        packageSelect.value = option.value;
                        optionFound = true;
                    }
                }
            });
        }

        modal.classList.add('show');
        document.body.classList.add('modal-open');
    }

    function closeModal() {
        const modal = document.querySelector('#pricingModal');
        modal.classList.remove('show');
        document.body.classList.remove('modal-open');
    }

    // Close modal when clicking outside of it
    document.addEventListener('DOMContentLoaded', function () {
        // Handle pricing plan button clicks
        const pricingPlanButtons = document.querySelectorAll('.pricing-plan-btn');
        pricingPlanButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const planName = this.dataset.planName;
                const priceSingle = this.dataset.planPriceSingle;
                const priceMonthly = this.dataset.planPriceMonthly;
                openModal(planName, priceSingle, priceMonthly);
            });
        });

        // Close modal handlers
        document.querySelector('.modal')?.addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });

        document.querySelector('.close-modal-2')?.addEventListener('click', function (e) {
            e.preventDefault();
            closeModal();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.pricing-opt');

        function updatePrices(type) {
            const allPrices = document.querySelectorAll('.price');
            allPrices.forEach(priceEl => {
                const newPrice = priceEl.dataset[type];
                if (newPrice) {
                    priceEl.textContent = newPrice;
                }
            });
        }

        function setActive(button) {
            buttons.forEach(btn => {
                btn.classList.remove('bg-white', 'text-[#454852]');
                btn.classList.add('text-[#8D8D8D]');
            });

            button.classList.add('bg-white', 'text-[#454852]');
            button.classList.remove('text-[#8D8D8D]');
        }

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                setActive(this);
                const selectedType = this.dataset.type;
                updatePrices(selectedType);
            });
        });

        // ✅ Detect which button is already active (via class in HTML)
        const defaultBtn = [...buttons].find(btn => btn.classList.contains('bg-white'));

        if (defaultBtn) {
            // Only call updatePrices — don't re-style
            const selectedType = defaultBtn.dataset.type;
            updatePrices(selectedType);
        }

        // Handle package select change to extract name and price
        const packageSelect = document.querySelector('#packageSelect');
        if (packageSelect) {
            packageSelect.addEventListener('change', function () {
                const selectedValue = this.value;
                if (selectedValue) {
                    // Split "Package Name - €Price"
                    const parts = selectedValue.split(' - ');
                    if (parts.length === 2) {
                        document.querySelector('#package_name').value = parts[0].trim();
                        document.querySelector('#package_price').value = parts[1].trim();
                    }
                }
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const modal = document.getElementById('pricingModal');
        const bookingForm = document.getElementById('pricingBookingForm');
        if (bookingForm) {
            bookingForm.addEventListener('submit', function (e) {
                e.preventDefault();
                console.log('bookingForm submission started.');

                const form = this;
                const formData = new FormData(form);
                const submitBtn = form.querySelector('#bookNowBtn');
                const btnText = submitBtn.querySelector('.btn-text');
                const spinner = submitBtn.querySelector('.btn-spinner');

                // Disable button and show spinner
                if (submitBtn) {
                    submitBtn.disabled = true;
                }
                if (btnText) {
                    btnText.classList.add('hidden');
                }
                if (spinner) {
                    spinner.classList.remove('hidden');
                }

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Response data:', data);
                        const formMessage = form.querySelector('#formMessage');
                        if (data.success) {
                            form.reset();
                            // if (formMessage) {
                            //     formMessage.innerHTML = `<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">${data.message}</div>`;
                            //     formMessage.classList.remove('hidden');
                            // }
                            // setTimeout(() => {
                            //     closeModal();
                            // }, 4000);

                            modal.classList.remove('show');
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: `${data.message}`,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                customClass: {
                                    popup: 'animate-fade-in'
                                }
                            });
                        } else {
                            // if (formMessage) {
                            //     formMessage.innerHTML = `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">${data.message}</div>`;
                            //     formMessage.classList.remove('hidden');
                            // }
                            modal.classList.remove('show');
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: `${data.message}`,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                customClass: {
                                    popup: 'animate-fade-in'
                                }
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error during form submission:', error);
                        // const formMessage = form.querySelector('#formMessage');
                        // if (formMessage) {
                        //     formMessage.innerHTML = `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">An unexpected error occurred. Please try again.</div>`;
                        //     formMessage.classList.remove('hidden');
                        // }

                        modal.classList.remove('show');
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An unexpected error occurred. Please try again',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            customClass: {
                                popup: 'animate-fade-in'
                            }
                        });
                    })
                    .finally(() => {
                        console.log('Form submission finished.');
                        // Re-enable button and hide spinner
                        if (submitBtn) {
                            submitBtn.disabled = false;
                        }
                        if (btnText) {
                            btnText.classList.remove('hidden');
                        }
                        if (spinner) {
                            spinner.classList.add('hidden');
                        }
                    });
            });
        }
    });
</script>