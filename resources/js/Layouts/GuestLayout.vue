<template>
    <div>
        <banner />

        <div class="min-h-screen bg-gray-100">
            <nav class="shadow bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <inertia-link :href="route('top')">
                                    <application-mark class="block h-9 w-auto" />
                                </inertia-link>
                            </div>

                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">

                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="max-w-3xl mx-auto px-4 sm:px-6 xl:max-w-5xl xl:px-0">
                <slot></slot>
            </main>

            <!-- Modal Portal -->
            <portal-target name="modal" multiple>
            </portal-target>
        </div>
    </div>
</template>

<script>
    import ApplicationMark from '@/Jetstream/ApplicationMark'
    import Banner from '@/Jetstream/Banner'
    import Dropdown from '@/Jetstream/Dropdown'
    import DropdownLink from '@/Jetstream/DropdownLink'
    import NavLink from '@/Jetstream/NavLink'
    import ResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            ApplicationMark,
            Banner,
            Dropdown,
            DropdownLink,
            NavLink,
            ResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {

        }
    }
</script>
