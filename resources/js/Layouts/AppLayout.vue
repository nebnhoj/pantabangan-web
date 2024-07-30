<template>
  <div class="min-h-screen flex flex-col">
    <div class="bg-red-500 text-white text-center">Site Under Development</div>
    <div class="navbar bg-base-100 shadow-md top-0 left-0 sticky ">

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
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-5 w-5 stroke-current">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
      </label>
      <ul
        tabindex="0"
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
// TypeScript code can go here (if needed)
</script>

<style scoped>
/* Add any scoped styles here */
</style>
