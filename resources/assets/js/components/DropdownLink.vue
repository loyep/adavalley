<template>
    <div>
        <div @click="open = !open" role="button" class="inline-block select-none">
            <span class="appearance-none flex items-center inline-block text-black hover:bg-grey-lighter py-2 px-4 rounded">
                <span class="mr-1">
                    <slot name="link">Dropdown</slot>
                </span>

                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </span>
        </div>

        <div class="absolute pin-l mt-px" v-show="open">
            <div class="bg-white shadow rounded border overflow-hidden min-width:full">
                <slot name="dropdown">
                    <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-blue whitespace-no-wrap">Some link</a>
                    <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-blue whitespace-no-wrap">Another action</a>
                    <a href="#" class="no-underline block px-4 py-3 border-b text-grey-darkest bg-white hover:text-white hover:bg-blue whitespace-no-wrap">Something else here</a>
                </slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return { 
                open: false 
            }
        }
    }
</script>