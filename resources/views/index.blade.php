@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="hero-bg-image flex flex-col items-center justify-center text-center p-20 ">
        <h1 class="text-gray-100 text-5xl uppercase font-bold pb-5">Welcome to my Blog</h1>
        <a href="{{ route('post.index') }}" class="bg-gray-100 text-gray-700 py-3 px-5 rounded-lg font-bold uppercase text-lg">Start Reading</a>
    </section>


    {{-- Card Section --}} <!-- component -->
    <div class="text-gray-900 pt-12 pr-0 pb-14 pl-0 bg-white">
        <div class="w-full pt-4 pr-5 pb-6 pl-5 mt-0 mr-auto mb-0 ml-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">
            <div class="flex flex-col items-center sm:px-5 md:flex-row">
                <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
                    <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-10 lg:pr-16 md:space-y-5">
                        <div class="bg-green-500 flex items-center leading-none rounded-full text-gray-50 pt-1.5 pr-3 pb-1.5 pl-2 uppercase inline-block">
                            <p class="inline">
                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </p>
                            <p class="inline text-xs font-medium">New</p>
                        </div>
                        <a class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl">Exploring Web Development Trends</a>
                        <div class="pt-2 pr-0 pb-0 pl-0">

                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 ">
                    <div class="block">
                        <img src="https://media.licdn.com/dms/image/D4E12AQF2nlfXoZK2Yw/article-cover_image-shrink_600_2000/0/1675704281846?e=2147483647&v=beta&t=Rs9ejfu9oorJGUiudx8OkCEx0JKdFPsa_WIx0qmtS4Y" class="object-cover w-full  mb-2 overflow-hidden rounded-lg shadow-sm  h-80 btn-"/>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 sm:px-5 gap-x-8 gap-y-16">
                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <img src="https://png.pngtree.com/thumb_back/fh260/background/20230706/pngtree-creating-3d-renderings-for-mobile-apps-software-and-web-development-image_3826852.jpg" class="object-cover h-5/6 w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-"/>
                    <p class="bg-green-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase inline-block">Mobile Apps</p>
                    <a class="text-lg font-bold sm:text-xl md:text-2xl">The Rise of Mobile Applications in 2024</a>
                    <p class="text-sm text-black">Mobile applications have transformed the way we interact with technology. Discover the latest trends and insights on mobile app development.</p>
                    <div class="pt-2 pr-0 pb-0 pl-0">

                    </div>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <img src="https://t4.ftcdn.net/jpg/03/08/69/75/360_F_308697506_9dsBYHXm9FwuW0qcEqimAEXUvzTwfzwe.jpg" class="object-cover h-52 w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-"/>
                    <p class="bg-green-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase inline-block">Software Development</p>
                    <a class="text-lg font-bold sm:text-xl md:text-2xl">Innovations in Software Development</a>
                    <p class="text-sm text-black">Learn about the latest tools and methodologies shaping software development, including Agile and DevOps practices.</p>
                </div>

                <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                    <img src="https://st.depositphotos.com/57404040/61008/i/450/depositphotos_610081562-stock-photo-platform-engineering-concept-practice-designing.jpg" class="object-cover w-full mb-2 h-52 overflow-hidden rounded-lg shadow-sm max-h-56 btn-"/>
                    <p class="bg-green-500 flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase inline-block">DevOps</p>
                    <a class="text-lg font-bold sm:text-xl md:text-2xl">DevOps Culture: Bridging the Gap</a>
                    <p class="text-sm text-black">Understand how DevOps practices are bridging the gap between development and operations teams for better collaboration.</p>
                    <div class="pt-2 pr-0 pb-0 pl-0">

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
