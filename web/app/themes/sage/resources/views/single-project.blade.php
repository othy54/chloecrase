@extends('layouts.app')

@section('content')
    @php
        $projects = new WP_Query([
            'post_type' => 'project',
            'numberposts' => 5,
            'post__not_in' => [get_the_ID()],
        ]);
    @endphp
    {{-- SECTION HERO --}}

    <section class="h-69.25 lg:h-136.25 relative mt-10 flex w-full items-end lg:mt-8">
        @image(get_post_thumbnail_id(), 'full', ['class' => 'absolute object-cover h-full w-full inset-0'])
        <div class="overlay"></div>
        <div class="row relative mb-5 w-full">
            <div class="container w-full">
                <div class="flex w-full justify-between">
                    @foreach (wp_get_post_terms(get_the_ID(), 'project_category') as $term)
                        <div class="font-satoshi text-[0.875rem] font-medium uppercase text-white">
                            {{ $term->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION CONTENU --}}

    <article class="pt-16 lg:pt-32">
        <div class="row">
            <div class="container">
                <div class="grid grid-cols-6 gap-x-6 lg:grid-cols-12">
                    <div class="col-span-4 lg:col-span-3">
                        <h1 class="text-[2.05rem] font-medium leading-none lg:text-[4rem]">
                            @title
                        </h1>
                    </div>
                    <div class="col-span-6 max-lg:mt-10 lg:col-start-7">
                        <div class="tracking-[-0.05em] [&_p]:mb-6">
                            @content
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-20 lg:mt-36">
            <div class="container">
                <div class="grid gap-x-2 gap-y-2 lg:grid-cols-12 lg:gap-x-6 lg:gap-y-6">
                    @if (get_field('project__galleries'))
                        @foreach (get_field('project__galleries') as $gallery)
                            @php
                                $cols = [
                                    1 => 'col-span-12',
                                    2 => 'col-span-6 [&_img]:aspect-886/975',
                                    3 => 'col-span-6 max-lg:last:col-span-12 lg:col-span-4 [&_img]:aspect-584/643',
                                ];
                            @endphp

                            <div class="col-span-12 grid grid-cols-subgrid max-lg:gap-y-2">
                                @foreach ($gallery['project__gallery'] as $image)
                                    <div class="{{ $cols[count($gallery['project__gallery'])] }}">
                                        @if ($image['type'] === 'video')
                                            <video class="h-full w-full object-cover" autoplay loop playsinline muted
                                                src="{{ $image['url'] }}"></video>
                                        @else
                                            @image($image['ID'], 'full', ['class' => 'object-cover'])
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-38 pb-26 lg:pb-32">
            <div class="container">
                <div class="grid grid-cols-6 items-end gap-x-6 lg:grid-cols-12">
                    <div class="lg:pt-47.75 relative col-span-6 pt-20">
                        <div
                            class="text-blue font-callAustin pr-3.25 z-2 absolute right-0 top-0 w-max text-[6rem] leading-none lg:text-[16rem]">
                            Les projets
                        </div>
                    </div>
                    <div class="relative col-span-6">
                        <div class="font-satoshi button-link col-span-6 ml-auto mr-0 text-right font-medium max-lg:hidden">
                            <a href="/#projects">
                                <div>
                                    Explorer les projets
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-span-6 lg:col-span-12">
                        <div class="flex snap-x snap-mandatory gap-x-5 overflow-x-auto">
                            @foreach ($projects->posts as $project)
                                <div class="shrink-0 snap-start">
                                    <a href="@permalink($project->ID)">
                                        @image(get_post_thumbnail_id($project->ID), 'full', ['class' => 'w-74.25 lg:w-108.25 aspect-square object-cover', 'style' => 'view-transition-name: thumb-' . $project->ID])
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="relative col-span-6 mt-14">
                        <div class="font-satoshi button-link col-span-6 mx-auto text-right font-medium lg:hidden">
                            <a href="/#projects">
                                <div>
                                    Explorer les projets
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
