<template>

    <Head>
        <title>{{ $props.title ?? 'Pantabangan' }}</title>
        <meta name="description" :content="$props.metaDescription ?? 'Welcome to Pantabangan'">
        <meta name="keywords"
            content="Pantabangan, Nueva Ecija, Pantabangan Dam, tourist attractions, history, culture, anta, nueva ecija">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="canonical" href="https://www.pantabangan.com/">
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Discover Pantabangan: A Scenic Getaway in Nueva Ecija" />
        <meta property="og:description" content="Explore Pantabangan, a first-class municipality in Nueva Ecija. Known for the majestic Pantabangan Dam and Lake, it offers stunning landscapes, rich history, and a wealth of recreational activities." />
        <meta property="og:image"
            content="https://www.pantabangan.com/images/dam.png" />
        <meta property="og:url" content="https://pantabangan.com" />
        <meta property="og:site_name" content="Pantabangan" />
        <meta property="og:locale" content="en_PH" />

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Pantabangan: Discover the Beauty and History">
        <meta name="twitter:description"
            content="Explore the rich history and scenic attractions of Pantabangan, including the famous Pantabangan Dam.">
        <meta name="twitter:image"
            content="https://www.pantabangan.com/images/dam.png">
        <meta name="robots" content="index, follow">
        <meta name="google-adsense-account" content="ca-pub-2063494299935345">
    </Head>
    <div class="min-h-screen flex flex-col">
        <div class="navbar bg-base-100 shadow-md top-0 left-0 sticky z-[100]">

            <div class="flex-1">
                <a href="/" class="btn btn-ghost text-xl normal-case">Pantabangan</a>

            </div>
            <div class="flex-none">
                <div class="hidden md:flex">
                    <ul class="menu menu-horizontal p-0">
                        <li><a href="/" class="hover:text-primary">Home</a></li>
                        <li><a href="/about" class="hover:text-primary">About</a></li>
                        <li><a href="/attractions" class="hover:text-primary">Attractions</a></li>
                        <li><a href="/blogs" class="hover:text-primary">Blogs</a></li>
                        <li><a href="/news" class="hover:text-primary">News</a></li>
                    </ul>
                </div>
                <div class="dropdown dropdown-end md:hidden">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">

                        <button class="btn btn-square btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block h-5 w-5 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </label>
                    <ul tabindex="0"
                        class="flex flex-wrap mt-3 p-2 shadow menu  dropdown-content bg-base-100 rounded-box w-screen z-[1] menu-horizontal p-0">
                        <li><a href="/" class="hover:text-primary">Home</a></li>
                        <li><a href="/about" class="hover:text-primary">About</a></li>
                        <li><a href="/attractions" class="hover:text-primary">Attractions</a></li>
                        <li><a href="/blogs" class="hover:text-primary">Blogs</a></li>
                        <li><a href="/news" class="hover:text-primary">News</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <main class="flex-1  container w-full">
            <slot></slot>
        </main>

        <footer class="bg-green-600 text-white p-4 text-center">
            <p>&copy;2024 Pantabangan.com. All rights reserved.</p>
        </footer>
    </div>
</template>

<script lang="ts" setup>
defineProps({
    title: String,
    metaDescription: String,
})
</script>
