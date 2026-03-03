@extends('layouts.app')

@section('content')
    @php
        $project_front = get_field('home__project_front')[0];
        $projects = new WP_Query([
            'post_type' => 'project',
            'numberposts' => -1,
            'post__not_in' => [$project_front->ID],
        ]);
        $image_project_front = get_field('project__hero_homepage_image', $project_front->ID);

    @endphp

    {{-- SECTION HERO --}}

    <section class="pt-11.75 lg:pt-20">
        <div class="row">
            <div class="container">
                <h1
                    class="font-satoshi [&_strong]:text-blue [&_strong]:font-callAustin text-center text-[2rem] font-medium leading-[120%] tracking-[-0.05em] lg:text-[4rem] [&_strong]:font-normal">
                    @field('home__title')
                </h1>
                <div class="lg:mt-21.25 mt-11">
                    <div class="flex justify-between">
                        <div>
                            {{ get_the_terms($project_front->ID, 'project_category')[0]->name }}
                        </div>
                        <div>
                            @field('project__year', $project_front->ID)
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-6">
            <div class="relative">
                @image(get_post_thumbnail_id($project_front->ID), 'full', ['class' => 'aspect-390/402 lg:aspect-1920/749 object-cover'])
                <div class="overlay"></div>
                <div class="encart lg:bottom-23.75 absolute bottom-4 right-4 bg-black/30 px-4 py-3.5 backdrop-blur-xl max-lg:left-4 lg:right-16 lg:py-6"
                    data-parallax-encart>
                    <div class="gap-x-4.75 flex items-center lg:gap-x-10">
                        <div>
                            @image($image_project_front, 'full', ['class' => 'aspect-118/109 lg:aspect-182/116 object-cover max-w-29.5 lg:max-w-45.5'])
                        </div>
                        <div>
                            <div class="space-x-3 space-y-1">
                                @for ($i = 0; $i < 2; $i++)
                                    <span
                                        class="backdrop-blur-xs rounded bg-white/10 px-2 py-1 text-[0.625rem] uppercase text-white lg:text-xs">
                                        {{ get_the_terms($project_front->ID, 'project_category')[$i]->name }}
                                    </span>
                                @endfor
                            </div>
                            <div
                                class="max-w-58.75 mt-4 text-[1.5rem] leading-6 text-white lg:text-[2.25rem] lg:leading-10">
                                @field('project__hero_homepage_title', $project_front->ID)
                            </div>
                        </div>
                        <div>
                            <a href="@permalink($project_front->ID)">
                                <svg class="w-11 lg:w-14" width="100%" height="100%" viewBox="0 0 56 56" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="55" height="55" rx="27.5" stroke="white" />
                                    <g clip-path="url(#clip0_15_214)">
                                        <path d="M28 15V41" stroke="white" stroke-miterlimit="10" />
                                        <path d="M41 28H15" stroke="white" stroke-miterlimit="10" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_15_214">
                                            <rect width="26" height="26" fill="white"
                                                transform="translate(15 15)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION PREMIER CONTENU --}}

    <section class="pt-17 lg:pt-40">
        <div class="row">
            <div class="container">
                <div class="grid grid-cols-6 gap-x-6 lg:grid-cols-12">
                    <div class="col-span-full lg:col-span-2">
                        <div class="font-satoshi text-xs font-medium uppercase max-lg:text-center lg:text-sm">
                            @field('home__first_content_left_title')
                        </div>
                    </div>
                    <div class="col-span-full lg:col-span-5">
                        <div
                            class="bold-to-austin leading-7.25 lg:leading-12 text-[1.5rem] tracking-[-0.05em] max-lg:mt-12 lg:text-[2.25rem] [&_strong]:tracking-normal">
                            @field('home__first_content_first_text')
                        </div>
                        <div class="mt-30 font-light leading-6 tracking-[-0.05em] max-lg:mt-12 lg:text-2xl lg:leading-10">
                            @field('home__first_content_second_text')
                        </div>
                    </div>
                    <div class="col-span-4 col-end-7 self-end max-lg:mt-14 lg:col-span-3 lg:col-end-13">
                        @image('home__first_content_image', 'full', ['class' => 'aspect-236/147 lg:aspect-433/271 object-cover w-full'])
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION LES PROJETS --}}

    <section id="projects" class="pt-37.5 lg:pt-51 bg-linear-180 to-[#DADADA]/56 pb-32.25 from-white/0">
        <div class="row">
            <div class="container">
                <div class="grid grid-cols-6 gap-x-6 lg:grid-cols-12">
                    <div class="relative col-span-6">
                        <div
                            class="text-blue font-callAustin pr-3.25 absolute right-0 w-max text-[6rem] leading-none lg:text-[16rem]">
                            Les projets
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-45 relative">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6">
                    @foreach ($projects->posts as $project)
                        <div
                            class="project-wrapper not-last:pb-10 not-first:pt-10 lg:not-last:pb-14 lg:not-first:pt-14 not-last:border-b-white not-last:border-b col-span-12 grid lg:grid-cols-[5fr_1fr_6fr]">
                            @php
                                $terms = wp_get_post_terms($project->ID, 'project_category');
                            @endphp
                            <div class="max-lg:order-2">
                                <a href="@permalink($project->ID)">
                                    @image(get_post_thumbnail_id($project->ID), 'full', ['class' => 'aspect-358/340 lg:aspect-735/164 object-cover project-image max-lg:mt-5'])
                                </a>
                            </div>
                            <div></div>
                            <div class="flex flex-col justify-between max-lg:order-1">
                                <div class="categories-wrapper max-lg:hidden">
                                    <div class="flex min-h-0 justify-between">
                                        @foreach ($terms as $term)
                                            <div class="font-satoshi text-[0.875rem] font-medium uppercase">
                                                {{ $term->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="grid-cols-6 gap-x-6 self-end max-lg:w-full lg:grid">
                                    <div class="text-[1.25rem] leading-10 lg:col-span-6 lg:text-[2.25rem]">
                                        <div class="flex w-full items-center justify-between">
                                            <div class="font-satoshi text-[2rem] italic tracking-[-0.05em] lg:hidden">
                                                {{ sprintf('%02d', $loop->iteration) }}
                                            </div>
                                            <div>
                                                @title($project->ID)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-13 excerpt col-span-3 line-clamp-3 max-lg:hidden">
                                        {{ get_the_excerpt($project->ID) }}
                                    </div>
                                    <div class="font-satoshi button col-span-6 font-medium max-lg:hidden">
                                        <a href="@permalink($project->ID)" class="min-h-0 overflow-clip">
                                            <div class="">
                                                Découvrir le projet
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION LA OU CA COMMENCE --}}

    <section class="pt-28 lg:pt-36">
        <div class="row">
            <div class="where-begin pt-44.5 pb-30 lg:pb-62 container relative">
                <div class="max-w-221.25 relative mx-auto">
                    <div class="text-blue font-satoshi text-center text-[0.75rem] uppercase lg:text-[0.875rem]">
                        @field('home__where_begin_title')
                    </div>
                    <div
                        class="leading-7.25 lg:leading-12 mt-14 text-center text-[1.5rem] font-light tracking-[-0.05em] lg:text-[2.25rem] [&_strong]:font-normal">
                        @field('home__where_begin')
                    </div>
                    <svg class="w-35.5 lg:w-59.5 absolute bottom-0 left-1/2 translate-y-full" width="100%"
                        viewBox="0 0 238 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_15_234)">
                            <path
                                d="M0.0896186 32L0 31.107L205.743 1.31703L31.6025 9.34466L31.5607 8.44872L214.852 0L214.935 0.889967L9.97455 30.5695L237.952 18.2891L238 19.1851L0.0896186 32Z"
                                fill="#0011FF" />
                        </g>
                        <defs>
                            <clipPath id="clip0_15_234">
                                <rect width="238" height="32" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="aspect-127/142 w-31.75 absolute left-1/2 top-0 translate-x-full max-lg:hidden">
                    <div class="float-sway size-full">
                        @image('home__where_begin_image_1', 'full', ['class' => 'aspect-127/142 w-full h-full object-cover', 'width' => '127', 'height' => '142'])
                    </div>
                </div>
                <div
                    class="aspect-129/138 lg:aspect-295/317 w-32.25 lg:w-73.75 lg:translate-x-6.5 lg:translate-y-69.25 -rotate-11 absolute left-7 top-0 lg:left-0">
                    <div class="float-sway size-full">
                        @image('home__where_begin_image_3', 'full', ['class' => 'aspect-129/138 lg:aspect-295/317 w-full h-full object-cover', 'width' => '295', 'height' => '317'])
                    </div>
                </div>
                <div
                    class="aspect-127/142 w-20.5 lg:w-31.75 lg:translate-x-33.75 lg:translate-y-42.25 top-12.75 absolute left-1/2 -translate-x-1/2 lg:left-0 lg:top-0">
                    <div class="float-sway size-full">
                        @image('home__where_begin_image_2', 'full', ['class' => 'aspect-127/142 w-full h-full object-cover', 'width' => '127', 'height' => '142'])
                    </div>
                </div>
                <div
                    class="aspect-196/218 w-21.5 lg:w-49 lg:translate-x-55.25 lg:-translate-y-25 rotate-11 max-lg:right-5.75 absolute max-lg:top-4 lg:bottom-0 lg:left-0">
                    <div class="float-sway size-full">
                        @image('home__where_begin_image_4', 'full', ['class' => 'aspect-196/218 w-full h-full object-cover', 'width' => '196', 'height' => '218'])
                    </div>
                </div>
                <div class="aspect-280/311 w-70 top-48.75 absolute right-5 max-lg:hidden">
                    <div class="float-sway size-full">
                        @image('home__where_begin_image_5', 'full', ['class' => 'aspect-280/311 w-full h-full object-cover', 'width' => '280', 'height' => '311'])
                    </div>
                </div>
                <div class="aspect-127/142 w-31.75 bottom-39 right-19.25 absolute max-lg:hidden">
                    <div class="float-sway size-full">
                        @image('home__where_begin_image_6', 'full', ['class' => 'aspect-127/142 w-full h-full object-cover', 'width' => '127', 'height' => '142'])
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION PARCOURS --}}

    <section id="about" class="lg:pt-18 mt-33.25 lg:mt-18 pb-36">
        <div class="row">
            <div class="container">
                <div class="grid grid-cols-6 gap-x-6 lg:grid-cols-12">
                    <div class="col-span-1 max-lg:hidden">
                        <div class="font-satoshi text-[0.875rem] font-medium uppercase">
                            À propos
                        </div>
                    </div>
                    <div class="relative col-span-4 col-start-2 lg:col-start-5">
                        @image('home__about_image', 'full', ['class' => 'aspect-579/609 w-full object-cover'])
                        <div
                            class="max-w-114.5 font-satoshi text-blue lg:top-22 translate-x-15.25 lg:translate-x-81.75 absolute right-0 text-[2rem] font-medium leading-none tracking-[-0.05em] max-lg:bottom-0 max-lg:translate-y-14 lg:text-[4rem]">
                            @field('home__about_text_blue')
                        </div>
                        <div
                            class="font-callAustin leading-16 lg:translate-y-5.5 lg:-translate-x-51.25 -translate-x-15 absolute -translate-y-1/2 text-[4rem] tracking-[-0.05em] text-white mix-blend-difference max-lg:top-0 max-lg:whitespace-nowrap lg:bottom-0 lg:w-max lg:text-[6rem] [&_strong]:font-normal">
                            @field('home__about_text_iam')
                        </div>
                        <img class="lg:bottom-10.5 w-18.25 lg:w-36.5 -translate-x-9.25 absolute bottom-0 left-0 max-lg:translate-y-[130%] lg:translate-x-[calc(-100%-10rem)]"
                            src="{{ Vite::asset('resources/images/flower-power.svg') }}" alt="" loading="lazy">
                    </div>
                    <div class="col-span-1 max-lg:hidden lg:col-end-13">
                        <div class="font-satoshi text-[0.875rem] font-medium uppercase">
                            since 98
                        </div>
                    </div>
                    <div class="mt-38 col-span-6 lg:col-span-3 lg:col-start-4">
                        <div class="leading-7.5 font-light tracking-[-0.05em] [&_strong]:font-medium">
                            @field('home__about_first_text')
                        </div>
                    </div>
                    <div class="col-span-6 mt-6 lg:col-span-4 lg:col-start-6 lg:mt-20">
                        <div class="leading-7.5 font-light tracking-[-0.05em] [&_strong]:font-medium">
                            @field('home__about_second_text')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
