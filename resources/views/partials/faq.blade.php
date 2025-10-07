@php
    $faqs = [
        [
            'id' => '1',
            'question' => 'Do I need to bring my car to you?',
            'answer' => 'No! Our service is fully mobile. We come directly to your home, office, or any convenient location—saving you time and effort.'
        ],
        [
            'id' => '2',
            'question' => 'How long does a typical car wash or detailing service take?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur.'
        ],
        [
            'id' => '3',
            'question' => 'What kind of products do you use?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur.'
        ],
        [
            'id' => '4',
            'question' => 'Do you clean both the interior and exterior?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur.'
        ],
        [
            'id' => '4',
            'question' => 'How often should I get my car detailed?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
        ],
    ]
@endphp

<section class="py-8 md:py-[50px]">
    <div class="container">
        <x-section-heading pretitle="FAQS" title="Get the answers you need to start with us"
            description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ipsum lorem, tempor ut ex aliquam, fringilla lacinia quam. Sed mattis ante at massa aliquet consectetur."
            width="max-w-[660px]">
            <x-slot name="icon">

                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.99984 0.416748C9.22159 0.416748 11.8332 3.02833 11.8332 6.25008C11.8332 9.47183 9.22159 12.0834 5.99984 12.0834C2.77809 12.0834 0.166504 9.47183 0.166504 6.25008C0.166504 3.02833 2.77809 0.416748 5.99984 0.416748ZM5.99984 8.58341C5.84513 8.58341 5.69675 8.64487 5.58736 8.75427C5.47796 8.86366 5.4165 9.01204 5.4165 9.16675C5.4165 9.32146 5.47796 9.46983 5.58736 9.57923C5.69675 9.68862 5.84513 9.75008 5.99984 9.75008C6.15455 9.75008 6.30292 9.68862 6.41232 9.57923C6.52171 9.46983 6.58317 9.32146 6.58317 9.16675C6.58317 9.01204 6.52171 8.86366 6.41232 8.75427C6.30292 8.64487 6.15455 8.58341 5.99984 8.58341ZM5.99984 3.04175C5.43901 3.04175 4.90116 3.26453 4.5046 3.6611C4.10804 4.05766 3.88525 4.59551 3.88525 5.15633C3.88525 5.31104 3.94671 5.45941 4.05611 5.56881C4.1655 5.67821 4.31388 5.73966 4.46859 5.73966C4.6233 5.73966 4.77167 5.67821 4.88107 5.56881C4.99046 5.45941 5.05192 5.31104 5.05192 5.15633C5.05211 4.98427 5.09914 4.8155 5.18794 4.66813C5.27675 4.52076 5.404 4.40034 5.55604 4.31978C5.70808 4.23923 5.87918 4.20157 6.05099 4.21086C6.2228 4.22014 6.38884 4.27602 6.53132 4.37249C6.67379 4.46896 6.78732 4.6024 6.85973 4.75848C6.93214 4.91456 6.9607 5.08741 6.94235 5.25849C6.924 5.42958 6.85942 5.59244 6.75556 5.72961C6.65169 5.86679 6.51245 5.9731 6.35275 6.03716C5.95842 6.19466 5.4165 6.59833 5.4165 7.27091V7.41675C5.4165 7.57146 5.47796 7.71983 5.58736 7.82923C5.69675 7.93862 5.84513 8.00008 5.99984 8.00008C6.15455 8.00008 6.30292 7.93862 6.41232 7.82923C6.52171 7.71983 6.58317 7.57146 6.58317 7.41675C6.58317 7.27441 6.61234 7.20325 6.73542 7.14258L6.78617 7.11925C7.24164 6.93602 7.6192 6.60005 7.8541 6.16895C8.089 5.73785 8.16662 5.23845 8.07366 4.75639C7.98069 4.27432 7.72293 3.83961 7.34456 3.52677C6.96619 3.21394 6.49078 3.04246 5.99984 3.04175Z"
                        fill="#124846" />
                </svg>

            </x-slot>
        </x-section-heading>
        <div class="faq max-w-[996px] mx-auto space-y-4 role=" list">
            @foreach ($faqs as $faq)
                @php
                    $qid = 'faq-' . $faq['id'];
                    $hid = 'faq-header-' . $faq['id'];
                @endphp

                <div class="p-6 md:py-[37px] md:px-[31px] border border-[#D1D7DF] rounded-[10px]" role="listitem">
                    <div id="{{ $hid }}" class="acc-header flex gap-4 md:gap-6.5 items-center cursor-pointer" role="button"
                        tabindex="0" aria-controls="{{ $qid }}" aria-expanded="false">
                        <div class="icon w-[30px] h-[30px] border border-[var(--color-brand)] rounded-full flex items-center justify-center flex-shrink-0 transition-transform duration-300"
                            aria-hidden="true">
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.00011 11.3408V6.24986M6.00011 6.24986V1.15894M6.00011 6.24986H11.091M6.00011 6.24986H0.90918"
                                    stroke="#3ACBC6" stroke-width="1.47368" stroke-linecap="round" />
                            </svg>
                        </div>

                        <div class="text-[18px] text-[var(--color-heading)] font-semibold">
                            {{ $faq['question'] }}
                        </div>
                    </div>

                    <div id="{{ $qid }}"
                        class="acc-content text-base text-[var(--color-text)] pt-4 pr-4 pl-[46px] md:pl-[58px] w-full max-w-[666px] overflow-hidden font-sf"
                        aria-hidden="true" style="display:none">
                        {!! nl2br(e($faq['answer'])) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .acc-content {
        display: none;
        overflow: hidden;
    }

    /* default hidden */
    .faq>div.acc-open>.acc-header>.icon {
        transform: rotate(45deg) !important;
        transition: transform 0.3s ease;
    }
</style>

<!-- jQuery (single include) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Accordion behavior -->
<script>
    $(function () {
        // initially hide all
        $(".acc-content").hide();

        function openItem($wrapper, $content) {
            $wrapper.addClass("acc-open");
            $wrapper.find(".acc-header").attr("aria-expanded", "true");
            $content.attr("aria-hidden", "false").stop(true, true).slideDown(400); // smooth open
        }

        function closeItem($wrapper, $content) {
            $wrapper.removeClass("acc-open");
            $wrapper.find(".acc-header").attr("aria-expanded", "false");
            $content.attr("aria-hidden", "true").stop(true, true).slideUp(400); // smooth close
        }

        // open first item by default
        const $first = $(".faq > div").first();
        $first.addClass("acc-open"); // only this div
        $first.find(".acc-content").first().show().attr("aria-hidden", "false");
        $first.find(".acc-header").attr("aria-expanded", "true");

        // click handler
        $(".acc-header").on("click", function () {
            const $header = $(this);
            const $wrapper = $header.parent();
            const $content = $wrapper.find(".acc-content");

            // close others
            $(".faq > div").not($wrapper).each(function () {
                const $other = $(this);
                const $otherContent = $other.find(".acc-content");
                if ($otherContent.is(":visible")) {
                    closeItem($other, $otherContent);
                }
            });

            // toggle current
            if ($content.is(":visible")) {
                closeItem($wrapper, $content);
            } else {
                openItem($wrapper, $content);
            }
        });

        // keyboard accessibility
        $(".acc-header").on("keydown", function (e) {
            if (e.key === "Enter" || e.key === " " || e.key === "Spacebar") {
                e.preventDefault();
                $(this).trigger("click");
            }
        });
    });


</script>